<?php

class MlmHelper {

    /**
     * Fungsi Static Buat Cek bahwa Sponsor dan upline Sejalur
     */
    public static function check_uplink($upline_mid, $sponsor_mid) {
        $balik = "F";
        $upline_id = dbHelper::getOne('network_id', 'mlm_network', 'network_mid = \'' . $upline_mid . '\'');
        $sponsor_id = dbHelper::getOne('network_id', 'mlm_network', 'network_mid = \'' . $sponsor_mid . '\'');
        do {
            if ($upline_id == $sponsor_id) {
                $balik = 'T';
                break;
            }
            $upline_id = function_lib::get_one("network_upline_network_id", "mlm_network", "network_id = '{$upline_id}'");
            $balik = "F";
            if ($upline_id == FALSE || $upline_id == '0') {
                $balik = "F";
                break;
            }
        } while ($balik == "F");
        return $balik;
    }

    /**
     * function buat cari orang yang paling bawah sebelah kiri
     * @param String $sponsor network_id member Yang ingin Dicek
     * @param String $position Posisi yang ingin di cek
     * @return String
     */
    public static function get_last_node($sponsor, $position = "left") {
        //mengecek posisi sebelah kiri terakhir
        $sponsor_id = $sponsor;
        $i = 0;
        while ($sponsor_id != 0) {
            $i++;
            $L = $sponsor_id;
            $left_node = dbHelper::getOne("network_{$position}_node_network_id", "mlm_network", "network_id='" . $sponsor_id . "'");
            $sponsor_id = $left_node;
        }
        return $L . " " . $i;
    }

    /**
     * Method buat ngekstrak kata apakah ada gennya
     * @param string $kata kata yang ingin dicari
     */
    public static function search_gen($kata) {
        preg_match("/gen/", strval($kata), $matcg);
        if (!empty($matcg)) {
            return 'gen';
        }
        else
            return $kata;
    }

    /**
     * fungsi buat menupdate data bonus secara real time
     * @param String $bonus_name nama bonusnya
     * @param Int $quantity quantitas bonus-nya
     * @param Int $network_id data network_id
     * @param String $date tanggal
     * @return Int $feedback data feedback dari mysql query
     */
    public static function calculateBonusRealTime($bonus_name, $quantity, $network_id, $date = null) {
        $bonus = Yii::app()->params[$bonus_name];
        $total_bonus = intval($bonus * $quantity);
        //cek apakah member itu aktif atau ngga?
        $cek_is_suspended = dbHelper::getOne('member_is_suspended', 'mlm_member', 'member_network_id=' . $network_id);
        if ($cek_is_suspended !== '1') {
            //cek tabel
            $cek_table = Yii::app()->db->createCommand()->select()->from('mlm_bonus_log')->where('bonus_log_network_id=:network_id AND bonus_log_date=:bonus_log_date', array(':network_id' => $network_id, ':bonus_log_date' => $date))->queryRow();
            if ($cek_table) {
                //update data
                $feedback = Yii::app()->db->createCommand("UPDATE mlm_bonus_log SET bonus_log_" . $bonus_name . " = bonus_log_" . $bonus_name . " + " . $total_bonus . "
                                                           WHERE bonus_log_network_id = '" . $network_id . "' AND bonus_log_date = '" . $date . "'")->execute();
            } else {
                $feedback = Yii::app()->db->createCommand("INSERT INTO mlm_bonus_log(bonus_log_" . $bonus_name . ", bonus_log_network_id, bonus_log_date) 
                                                       VALUES(" . $total_bonus . ", " . $network_id . ", '" . $date . "')")->execute();
            }
            //bonus table mlm_bonus
            if ($feedback) {
                return Yii::app()->db->createCommand("UPDATE mlm_bonus SET bonus_" . $bonus_name . "_acc = bonus_" . $bonus_name . "_acc + " . $total_bonus . " WHERE 
                                                  bonus_network_id = '" . $network_id . "'")->execute();
            } else {
                return $feedback;
            }
        }
    }

    /**
     * fungsi buat ambil network_mid
     * @param Int $network_id
     */
    public static function getNetworkMid($network_id) {
        if ($network_id) {
            return dbHelper::getOne('network_mid', 'mlm_network', 'network_id=' . $network_id);
        }
        else
            return false;
    }

    /**
     * fungsi buat ambil data network_id
     * @param String $network_mid
     */
    public static function getNetworkId($network_mid) {
        return dbHelper::getOne('network_id', 'mlm_network', "network_mid='" . $network_mid . "'");
    }

    /**
     * fungsi buat send email ke admin
     * @param mlmEntity $mlm_entity Entitas MLM
     */
    public static function sendMlmEmail(mlmEntity $mlm_entity) {
        $email_mlm = dbHelper::getConfig('mlm_email');
        $title = 'Penambahan Member ' . $mlm_entity->network_mid . '(' . $mlm_entity->member_name . ')';
        $message_email = 'Penambahan Member dengan Data Sebagai berikut<br />';
        $message_email .= 'Upline Member ID : ' . $mlm_entity->network_upline_network_mid . ' <br /> ';
        $message_email .= 'Sponsor Member ID : ' . $mlm_entity->network_sponsor_network_mid . ' <br /> ';
        $message_email .= 'Posisi Member  : ' . $mlm_entity->network_position_text . ' <br /> ';
        $message_email .= 'Member ID : ' . $mlm_entity->network_mid;
        $message_email .= 'Nama Member : ' . $mlm_entity->network_upline_network_mid . ' <br /> ';
        $message_email .= 'Nama Alias Member  : ' . $mlm_entity->member_nickname . ' <br /> ';
        $message_email .= 'Nomer Handphone Member  : ' . $mlm_entity->member_mobilephone . ' <br /> ';
        $message_email .= 'Alamat Email Member  : ' . $mlm_entity->member_email . ' <br /> ';
        $message_email .= 'Nomer Handphone Member  : ' . $mlm_entity->member_mobilephone . ' <br /> ';
        $message_email .= 'NPWP  : ' . $mlm_entity->member_tax_account_no . ' <br /> ';
        $message_email .= 'Bank  : ' . dbHelper::getOne('bank_name', 'ref_bank', 'bank_id=' . $mlm_entity->member_bank_id) . '<br />';
        $message_email .= 'Kota Bank  : ' . $mlm_entity->member_bank_city . ' <br /> ';
        $message_email .= 'Cabang Bank  : ' . $mlm_entity->member_bank_branch . ' <br /> ';
        $message_email .= 'Nomer Rekening  : ' . $mlm_entity->member_bank_account_no . ' <br /> ';
        $message_email .= 'Nama Di Rekening  : ' . $mlm_entity->member_bank_account_name . ' <br /> ';
        $headers = "From: " . $email_mlm . "\r\n";
        $headers .= "Reply-To: " . $email_mlm . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        return @mail($email_mlm, $title, nl2br($message_email), $headers);
    }

}