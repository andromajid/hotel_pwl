<?php

class mlmSponsor {

    public $data_member;

    public function __construct(mlmEntity $data_member) {
        $this->data_member = $data_member;
    }
    /**
     * untuk mengupdate data sponsor
     */
    public function updateSponsor($date) {
        //ambil data netgrow dari netgrow yang terakhir
        $row_netgrow = Yii::app()->db->createCommand("SELECT * FROM mlm_netgrow WHERE netgrow_network_id = '" . $this->data_member->network_sponsor_network_id . "' 
                                               AND netgrow_date = '" . $date . "'")->queryRow();
        if($row_netgrow) {
            //update data sponsor
            Yii::app()->db->createCommand()->update('mlm_netgrow', array('netgrow_sponsor' => ($row_netgrow['netgrow_sponsor'] + 1)), 
                                                    'netgrow_id=:netgrow_id', array(':netgrow_id' => $row_netgrow['netgrow_id']));
        } else {
            //insert ke data sponsor
            Yii::app()->db->createCommand()->insert('mlm_netgrow', array('netgrow_network_id' => $this->data_member->network_sponsor_network_id,
                                                        'netgrow_date' => $date,
                                                        'netgrow_sponsor' => 1));
        }
        MlmHelper::calculateBonusRealTime('sponsor', 1, $this->data_member->network_sponsor_network_id, $date);
    }

}

?>
