<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WidgetBonusToday
 *
 * @author arkananta
 */
class WidgetBonusToday extends CWidget {

    //put your code here
    public $network_id, $data_bonus_log, $date;
    public $bonus_arr = array('sponsor' => 'Bonus Sponsor', 'node' => 'Bonus Titik', 'match' => 'Bonus Pasangan');

    public function run() {
        $this->render('ViewBonusToday', array('data_bonus_log' => $this->data_bonus_log));
    }

    public function init() {
        $this->date = isset($this->date)?$this->date:date('Y-m-d');
//        $data = Yii:app()->db->createCommand()->select()->from('mlm_bonus_log')->where('bonus_log_network_id=:network_id AND 
//                                                                                                        bonus_log_date=\':date\'', 
//                                                                                                        array(':network_id' => $this->network_id,
//                                                                                                              ':date' => $this->date));
        $this->data_bonus_log = Yii::app()->db->createCommand()->select()->from('mlm_bonus_log')->where('bonus_log_network_id=:network_id AND bonus_log_date=:date',
                                                                                                        array(':network_id' => $this->network_id,
                                                                                                              ':date' => $this->date))->queryRow();
    }

}

?>
