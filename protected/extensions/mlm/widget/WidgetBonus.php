<?php

class WidgetBonus extends CWidget {

    //put your code here
    public $network_id, $data_bonus;
    public $bonus_arr = array('sponsor' => 'Bonus Sponsor', 'node' => 'Bonus Titik', 'match' => 'Bonus Pasangan');

    public function init() {
        $data = Yii::app()->db->createCommand()->select()->from('mlm_bonus')->where('bonus_network_id=:network_id', array(':network_id' => $this->network_id))
                          ->queryRow();
        $this->data_bonus = $data;
        
    }

    public function run() {
        $this->render('ViewBonus', array('data_bonus' => $this->data_bonus));
    }

}

?>
