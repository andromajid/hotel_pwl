<?php

class JoinController extends Controller {
/*
public function run() {
        (int) $total = Yii::app()->db->createCommand()->select('COUNT(*)')->from('sys_stock_network_mid')->queryScalar();
        if ($total < 500) {
            $max_id = Yii::app()->db->createCommand("SELECT MAX(stock_network_mid) FROM sys_stock_network_mid")->queryScalar();
            for ($x = 1; $x <= 500; $x++) {
                $max_id = ++$max_id;
                Yii::app()->db->createCommand()->insert('sys_stock_network_mid', array('stock_network_mid' => $max_id));
            }
        }
    }*/

    //put your code here
    public function actionIndex() {
        Yii::import('application.extensions.mlm.*');
        $form_model = new JoinForm;
        if ($_POST['submit']) {
            $this->getNetworkAuto($_POST['sponsor_auto'], $form_model);
            //$this->refresh();
        }
        if (isset($_POST['JoinForm'])) {
            $form_model->setAttributes($_POST['JoinForm'], false);
            if ($form_model->validate()) {
                $mlm_entity = new mlmEntity();
                //masukkan data2 dari modle formnya...
                $mlm_entity->member_name = stripslashes($form_model->member_name);
                $mlm_entity->member_mobilephone = stripslashes($form_model->member_mobilephone);
                $mlm_entity->serial_id = stripslashes($form_model->activation_id);
                $mlm_entity->serial_pin = stripslashes($form_model->activation_pin);
                $mlm_entity->network_position_text = stripslashes($form_model->position);
                $mlm_entity->network_sponsor_network_mid = stripslashes($form_model->sponsor_username);
                $mlm_entity->network_sponsor_network_id = stripslashes(dbHelper::getOne('network_id', 'mlm_network', 'network_mid = \'' . $mlm_entity->network_sponsor_network_mid . '\''));
                $mlm_entity->network_upline_network_mid = stripslashes($form_model->upline_username);
                $mlm_entity->network_upline_network_id = stripslashes(dbHelper::getOne('network_id', 'mlm_network', 'network_mid = \'' . $mlm_entity->network_upline_network_mid . '\''));
                $mlm_entity->member_password = stripslashes($form_model->member_password);
                $mlm_entity->member_email = stripslashes($form_model->member_email);
                $mlm_entity->network_position = $mlm_entity->network_position_text == 'kiri' ? 'L' : 'R';
                $mlm_entity->member_nickname = $form_model->member_username;
                $mlm_entity->member_bank_id = $form_model->member_bank_id;
                $mlm_entity->member_bank_account_name = $form_model->member_bank_account_name;
                $mlm_entity->member_bank_account_no = $form_model->member_bank_account_no;
                $mlm_entity->member_bank_city = $form_model->member_bank_city;
                $mlm_entity->member_bank_branch = $form_model->member_bank_branch;
                $mlm_entity->member_tax_account_no = $form_model->member_tax_account_no;
                //masukkanmlm_member 
                $mlm_member = new mlmMember($mlm_entity);
                $mlm_member->makeDataNetwork()->setDataMember()->insertMember();
                //masukkan bonus node-nya
                $mlm_node = new mlmNode($mlm_entity);
                $mlm_node->enableBonusTitik(TRUE)->setMaxLevel(10)->updateNode($mlm_entity->network_id, $mlm_entity->network_upline_network_id, date("Y-m-d"), 1);
                //bonus pasangan
                $mlm_match = new mlmMatch($mlm_entity);
                $mlm_match->updateMatch(date('Y-m-d'));
                //bonus sposnosr 
                $mlm_sponsor = new mlmSponsor($mlm_entity);
                $mlm_sponsor->updateSponsor(date('Y-m-d'));
                Yii::app()->user->setFlash('success', $mlm_member->message);
                $form_model->unsetAttributes();
                //kirim email ke admin
                MlmHelper::sendMlmEmail($mlm_entity);
            }
        }
        $this->render('index', array('form_model' => $form_model));
    }

    /**
     * buat cari member automatis
     * @param String $sponsor_mid 
     * @param JoinForm $form_model
     * @return boolean
     */
    private function getNetworkAuto($sponsor_mid, $form_model) {
        $sponsor_network_id = dbHelper::getOne('network_id', 'mlm_network', 'network_mid = \'' . $sponsor_mid . '\'');
        if ($sponsor_network_id) {
            $node_left = explode(" ", MlmHelper::get_last_node($sponsor_network_id, 'left'));
            $node_right = explode(" ", MlmHelper::get_last_node($sponsor_network_id, 'right'));
            if ($node_left[1] > $node_right[1]) {
                $form_model->sponsor_username = $sponsor_mid;
                $form_model->upline_username = MlmHelper::getNetworkMid($node_right[0]);
                //$form_model->position = 'kiri';
            } else {
                $form_model->sponsor_username = $sponsor_mid;
                $form_model->upline_username = MlmHelper::getNetworkMid($node_left[0]);
                //$form_model->position = 'kanan';
            }
            //cek posisi dari upline
            $data_member = Yii::app()->db->createCommand()->select()->from('mlm_network')->where('network_mid=:network_mid', array(':network_mid' => $form_model->upline_username))->queryRow();
            if ($data_member) {
                if ($data_member['network_right_node_network_id'] == '0') {
                    $form_model->position = 'kanan';
                    return true;
                } elseif ($data_member['network_left_node_network_id'] == '0') {
                    $form_model->position = 'kiri';
                    return true;
                } else {
                    Yii::app()->user->setFlash('error', 'terjadi kesalahan database');
                    return false;
                }
            } else {
                Yii::app()->user->setFlash('error', 'untraceable error');
                return false;
            }
            return true;
        } else {
            Yii::app()->user->setFlash('error', 'Member ID sponsor tidak dikenali');
            return false;
        }
    }

}

?>
