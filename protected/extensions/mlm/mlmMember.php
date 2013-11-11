<?php

class mlmMember {

    public $data_member, $data_member_arr, $message;

    public function __construct(mlmEntity $data_member) {
        $this->data_member = $data_member;
    }

    /**
     * fungsi buat membuat data jaringan
     */
    public function makeDataNetwork() {
        //cek posisi dari upline-nya
        if ($this->data_member->network_position == "R") {
            $check_node_id = dbHelper::getOne("network_right_node_network_id", "mlm_network", "network_id = '{$this->data_member->network_upline_network_id}'");
        } else {
            $check_node_id = dbHelper::getOne("network_left_node_network_id", "mlm_network", "network_id = '{$this->data_member->network_upline_network_id}'");
        }
        //klau bukan nol berarti dah terisi
        if ($check_node_id != "0") {
            $error_text = 'posisi '.$this->data_member->network_position_text.' dari member '.$this->data_member->network_upline_network_mid.' telah ditempati silahkan pilih upline yang lain';
            Yii::app()->user->setFlash('error', $error_text);
            Yii::app()->getController()->refresh();
            die($error_text.' <a href=""javascript:history.back()">klik di sini untuk kembali</a>');
        }

        $this->data_member->network_mid = $this->generateNetworkMID();

        //insert ke sys_network
        $sql_insert = "INSERT INTO mlm_network SET network_mid = '" . stripslashes($this->data_member->network_mid) . "',
                                               network_position = '" . stripslashes($this->data_member->network_position) . "',
                                               network_sponsor_network_id = '" . stripslashes($this->data_member->network_sponsor_network_id) . "',
                                               network_upline_network_id = '" . stripslashes($this->data_member->network_upline_network_id) . "'";
        $feedback = Yii::app()->db->createCommand($sql_insert)->execute();
        if (!$feedback) {
            die("Registrasi error Silahkan registrasi ulang");
        }
        //ambil network_id nya
        $this->data_member->network_id = Yii::app()->db->getLastInsertID();

        //update upline atasnya
        //update upline-nya
        if ($this->data_member->network_position == "R") {
            $sql_update = "network_right_node_network_id = '" . $this->data_member->network_id . "'";
        } else {
            $sql_update = "network_left_node_network_id = '" . $this->data_member->network_id . "'";
        }
        Yii::app()->db->createCommand("UPDATE mlm_network SET " . $sql_update . " WHERE network_id = '" . $this->data_member->network_upline_network_id . "'")->execute();
        return $this;
    }

    /**
     * fungsi buat mengisi data member
     */
    public function insertMember() {
        //masukkkan data member
        Yii::app()->db->createCommand()->insert('mlm_member', $this->data_member_arr);
        //masukkan data password
        Yii::app()->db->createCommand()->insert('mlm_password', array('password_network_id' => $this->data_member->network_id,
                                                                      'password_value' => md5($this->data_member->member_password)));
        //masukkan data ke bonus
        Yii::app()->db->createCommand()->insert('mlm_bonus', array('bonus_network_id' => $this->data_member->network_id));
        //update ke mlm_serial
        Yii::app()->db->createCommand()->update('mlm_serial', array('serial_is_used' => '1',
                                                                    'serial_user_network_id' => $this->data_member->network_id,
                                                                    'serial_use_datetime' => date("Y-m-d H:i:s")), 'serial_id=:serial_id', array(':serial_id' => $this->data_member->serial_id));
        $this->message = '<b>Registrasi Member Berhasil</b><br />
                          Registrasi Member dengan nama : '.$this->data_member->member_name.' berhasil diproses.<br />
                          member id anda adalah : <b>'.$this->data_member->network_mid.'</b> silahkan catat member ID anda karena di gunakan untuk akses ke member area.';
    }
    /**
     * fungsi buat insert data di registrasi depan
     */
    public function setDataMember() {
        $this->data_member_arr = array("member_name" => $this->data_member->member_name,
            'member_nickname' => $this->data_member->member_nickname,
            'member_network_id' => $this->data_member->network_id,
            "member_email" => $this->data_member->member_email,
            "member_mobilephone" => $this->data_member->member_mobilephone,
            "member_join_datetime" => date("Y-m-d H:i:s"),
            "member_serial_id" => $this->data_member->serial_id,
            'member_bank_id' => $this->data_member->member_bank_id,
            'member_bank_account_name' => $this->data_member->member_bank_account_name,
            'member_bank_account_no' => $this->data_member->member_bank_account_no,
            'member_bank_city' => $this->data_member->member_bank_city,
            'member_bank_branch' => $this->data_member->member_bank_branch,
            'member_tax_account_no' => $this->data_member->member_tax_account_no,
            "member_serial_pin" => $this->data_member->serial_pin);
        return $this;
    }
    /**
     * fungsi buat ambil network MID
     */
    public function generateNetworkMID() {
        $sql_select = "SELECT stock_network_mid FROM sys_stock_network_mid ORDER BY stock_id LIMIT 1";
        $data = Yii::app()->db->createCommand($sql_select)->queryRow();
        $network_mid = $data['stock_network_mid'];
        //delete stock network mid
        $sql_delete = "DELETE FROM sys_stock_network_mid WHERE stock_network_mid = '" . $network_mid . "'";
        Yii::app()->db->createCommand($sql_delete)->execute();
        return $network_mid;
    }

}

?>
