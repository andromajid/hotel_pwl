<?php

Yii::import('application.extensions.mlm.MlmHelper');

class JoinForm extends CFormModel {

    //put your code here
    public $upline_username, $member_bank_id, $member_bank_account_name, $member_bank_account_no, $sponsor_username, $position, $upline_id, $sponsor_id, $realposition, $member_mid, $network_id;
    public $activation_id, $activation_pin, $member_tax_account_no;
    public $member_name, $member_username, $member_password, $member_password_repeat, $member_email, $member_mobilephone;
    public $member_bank_city, $member_bank_branch;

    public function rules() {
        return array(
            array('upline_username, sponsor_username, position, activation_id, member_username,activation_pin, member_name, member_password, member_mobilephone, member_email', 'required'),
            array('upline_username, sponsor_username', 'checkUsername'),
            array('upline_username, sponsor_username', 'checkUpline'),
            array('upline_username', 'checkPosition'),
            array('member_email', 'email'),
            array('activation_id', 'checkActivation'),
            array('member_username', 'checkUsernameAvail'),
        );
    }

    public function attributeLabels() {
        return array('member_bank_id' => 'Nama Bank',
            'member_bank_account_name' => 'Nama di Rekening Bank',
            'member_bank_account_no' => 'Nomer Rekening',
            'member_bank_city' => 'Kota Bank',
            'member_bank_branch' => 'Cabang Bank',
            'member_tax_account_no' => 'NPWP');
    }

    /**
     * fungsi buat overide fngsi init CForm model buat di eksekusi pertama
     */
    public function init() {
        $this->upline_id = dbHelper::getOne('network_id', 'mlm_network', 'network_mid = \'' . $this->upline_username . '\'');
        $this->sponsor_id = dbHelper::getOne('network_id', 'mlm_network', 'network_mid = \'' . $this->sponsor_username . '\'');
        $this->realposition = $this->position == 'kiri' ? 'L' : 'R';
    }

    /**
     * callback functuin buat ngecek username tersebut ada di database
     */
    public function checkUsername($attribute, $params) {
        $feedback = dbHelper::getOne('network_mid', 'mlm_network', 'network_mid = \'' . $this->$attribute . '\'');
        if (!$feedback) {
            $this->addError($attribute, 'Member ' . $this->$attribute . ' tidak ditemukan di database');
        }
    }

    /**
     * fungsi buat ngecek apakah sponsor sejalur dengan upline
     */
    public function checkUpline($attribute, $params) {
        $sponsor = $this->sponsor_username;
        $upline = $this->upline_username;
        $return_value = MlmHelper::check_uplink($upline, $sponsor);
        if ($return_value == "F") {
            $message = Yii::t('yii', ' Sponsor : ' . $sponsor . ' tidak sejalur dengan upline : ' . $upline);
            $this->addError($attribute, $message);
        }
    }

    /**
     * fungsi buat mgecek serial aktivasi
     */
    public function checkActivation($attribute, $params) {
        $serial_id = $this->activation_id;
        $serial_pin = $this->activation_pin;
        //ambil serial berdasar IDnya
        $serial = Yii::app()->db->createCommand()->from('mlm_serial')->where("serial_id=:serial_id", array(':serial_id' => $this->activation_id))->queryRow();
        if (!$serial) {
            $message = Yii::t('yii', 'Nomer Aktivasi Tidak Terdapat Dalam Database Kami.');
            $this->addError($attribute, $message);
        } elseif ($serial['serial_is_active'] == '0') {
            $message = Yii::t('yii', 'Nomer Aktivasi ' . $this->activation_id . ' Belum Aktif');
            $this->addError($attribute, $message);
        } elseif ($serial['serial_is_used'] == '1') {
            $message = Yii::t('yii', 'Nomer Aktivasi ' . $this->activation_id . ' Telah Dipakai');
            $this->addError($attribute, $message);
        } elseif ($serial['serial_pin'] !== $this->activation_pin) {
            $message = Yii::t('yii', 'Nomer Aktivasi PIN Yang Anda Masukkan Salah');
            $this->addError($attribute, $message);
        }
    }

    public function checkUsernameAvail($attribute, $params) {
        $member_nickname = strtolower($this->member_username);
        $cek = dbHelper::getOne('member_network_id', 'mlm_member', 'member_nickname = \'' . $member_nickname . '\'');
        preg_match('/^[a-zA-Z0-9_-]*$/', $member_nickname, $match);
        if (empty($match)) {
            $message = Yii::t('yii', 'Member Mengandung Kata Ilegal');
            $this->addError($attribute, $message);
        }
        if ($cek != "") {
            $message = Yii::t('yii', 'Member ' . $member_nickname . " sudah digunakan");
            $this->addError($attribute, $message);
        }
    }

    public function checkPosition($attribute, $params) {
        $upline_id = $this->upline_username;
        $sponsor_id = $this->sponsor_username;
        if ($this->position == "kanan") {
            $check_node_id = dbHelper::getOne("network_right_node_network_id", "mlm_network", "network_mid = '{$upline_id}'");
        } else {
            $check_node_id = dbHelper::getOne("network_left_node_network_id", "mlm_network", "network_mid = '{$upline_id}'");
        }
        //klau bukan nol berarti dah terisi
        if ($check_node_id != "0") {
            $this->addError($attribute, 'Posisi ' . $this->position . " Dari " . $this->sponsor_username . " Sudah Terisi");
        }
    }

}

?>
