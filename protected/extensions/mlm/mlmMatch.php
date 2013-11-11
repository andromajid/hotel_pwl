<?php

class mlmMatch {

    public $data_member;

    //put your code here
    public function __construct(mlmEntity $data_member) {
        $this->data_member = $data_member;
    }

    /**
     * method buat update data pasangan
     * pasangan hanya yang beradi satu level di bawahnya
     * @param String $date
     */
    public function updateMatch($date) {
        //ambil data uplinenya
        $upline = Yii::app()->db->createCommand()->select()->from('mlm_network')->where('network_id=:network_id', 
                                    array(':network_id' => $this->data_member->network_upline_network_id))->queryRow();
        if($upline) {
            if($upline['network_node_left'] > '0' && $upline['network_node_right'] > '0') {
                //ceka apakah pernah mendapatkan bonus pasangan atau belum
                $cek = dbHelper::getOne('netgrow_id', 'mlm_netgrow', 'netgrow_network_id = \''.$this->data_member->network_upline_network_id.'\' AND netgrow_match > 0');
                if(!$cek) {
                    $cek_netgrow_today = dbHelper::getOne('netgrow_id', 'mlm_netgrow', 'netgrow_network_id = \''.$this->data_member->network_upline_network_id.'\' AND netgrow_date = \''.$date.'\'');
                    if($cek_netgrow_today) {
                        Yii::app()->db->createCommand()->update('mlm_netgrow', array('netgrow_match' => 1), 'netgrow_id=:netgrow_id', array(':netgrow_id' => $cek_netgrow_today));
                    } else {
                        Yii::app()->db->createCommand()->insert('mlm_netgrow', array('netgrow_network_id' => $this->data_member->network_upline_network_id,
                                                                    'netgrow_date' => $date,
                                                                    'netgrow_match' => 1));
                    }
                }
                //masukkan ke bonus realtime
                MlmHelper::calculateBonusRealTime('match', 1, $this->data_member->network_upline_network_id, $date);
            }
        }
    }
}

?>
