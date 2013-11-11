<?php

class mlmNode {

    public $data_member,$bonus_titik, $max_level;

    //put your code here
    public function __construct(mlmEntity $data_member) {
        $this->data_member = $data_member;
    }

    /**
     * Method Buat update ke atas jaringan
     * @param int $network_id network_id-nya
     * @param int $upline_id network_id uplinenya
     * @param String $date Tanggal Kejadian
     * @param int $level level Dia berada
     */
    public function updateNode($network_id, $upline_id, $date, $level) {
        $node = ($this->bonus_titik == TRUE && $level <= $this->max_level) ? 1 : 0;
        $row_network = Yii::app()->db->createCommand("SELECT * FROM mlm_network WHERE network_id = '" . $upline_id . "' LIMIT 1")->queryRow();
        if ($row_network) {
            $upline_id_next = $row_network['network_upline_network_id'];
            $position = ($row_network['network_right_node_network_id'] == $network_id) ? "R" : "L";
            $position_text = ($position == 'L') ? "left" : "right";
            $this->position_text = $position_text;
            //dapetin netgrow hari ini
            $row_netgrow = Yii::app()->db->createCommand("SELECT * FROM mlm_netgrow WHERE netgrow_network_id = '" . $upline_id . "' 
                                               AND netgrow_date = '" . $date . "'")->queryRow();
            if ($row_netgrow) {
                //update
                Yii::app()->db->createCommand("UPDATE mlm_netgrow SET netgrow_node_" . $position_text . "_real = netgrow_node_" . $position_text . "_real + 1 ,
                                                netgrow_node_" . $position_text . " = netgrow_node_" . $position_text . " + ".$node."
                                  WHERE netgrow_network_id = '" . $upline_id . "' AND netgrow_date = '" . $date . "'")->execute();
                Yii::app()->db->createCommand("UPDATE mlm_network SET network_node_" . $position_text . " = network_node_" . $position_text . " + 1 WHERE
                                  network_id = '" . $upline_id . "'")->execute();
            } else {
                //insert
                Yii::app()->db->createCommand("INSERT INTO mlm_netgrow SET netgrow_node_" . $position_text . "_real = 1 ,netgrow_date = '" . $date . "' 
                                  ,netgrow_network_id = '" . $upline_id . "', netgrow_node_" . $position_text . " = ". $node)->execute();
                Yii::app()->db->createCommand("UPDATE mlm_network SET network_node_" . $position_text . " = network_node_" . $position_text . " + 1
                                  WHERE network_id = '" . $upline_id . "'")->execute();
            }
            //masukkan ke mlm_level
            $level_data = Yii::app()->db->createCommand()->from('mlm_level')->where('level_value=:level_value AND level_network_id=:network_id', 
                                                                                array(':level_value' => $level, ':network_id' => $upline_id))->queryRow();
            if($level_data) {
                Yii::app()->db->createCommand()->update('mlm_level', array('level_'.$position_text.'_node' => ($level_data['level_'.$position_text.'_node'] + 1)), 'level_id=:level_id', array(':level_id' => $level_data['level_id']));
            } else {
                Yii::app()->db->createCommand()->insert('mlm_level', array('level_network_id' => $upline_id,
                                                                           'level_value' => $level,
                                                                           'level_'.$position_text.'_node' => 1));
            }
            //masukkan ke bonus real time
            if($node > 0) {
                //cek apakah member berhak mendapatkan bonus titik atau engga
                //$node_level = dbHelper::getOne('level_id', 'mlm_level', 'level_network_id = '.$upline_id.' AND level_value = '.$level.' AND level_is_bonus = \'0\' AND level_right_node > 0 AND level_left_node > 0');
                $node_level = dbHelper::getOne('level_id', 'mlm_level', 'level_network_id = '.$upline_id.' AND level_value = '.$level.' AND level_is_bonus = \'0\' AND (level_right_node > 0 OR level_left_node > 0)');
                if($node_level) {
                    MlmHelper::calculateBonusRealTime('node', $node, $upline_id, $date);
                    //update ke tabel mlm_level agar update level telah mendapatkan bonus titik
                    Yii::app()->db->createCommand()->update('mlm_level', array('level_is_bonus' => '1'), 'level_network_id = '.$upline_id.' AND level_value = '.$level.' AND level_is_bonus = \'0\'');
                }
            }
            $level++;
            $this->updateNode($upline_id, $upline_id_next, $date, $level);
        }
    }
    /**
     * fungsi buat enable bonus titik
     * @param boolean $bonus_titik
     */
    public function enableBonusTitik($bonus_titik) {
        $this->bonus_titik = $bonus_titik;
        return $this;
    }
    /**
     * buat ngeset level maximal
     * @param int $max_level
     */
    public function setMaxLevel($max_level) {
        $this->max_level = $max_level;
        return $this;
    }
}

?>
