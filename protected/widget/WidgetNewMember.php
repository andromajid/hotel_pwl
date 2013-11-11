<?php

class WidgetNewMember extends CWidget {
    
    public function run() {

        $results=$this->activeRecord();
        $this->render('new_member',array(
            'results'=>$results,
        ));
    }

    protected function activeRecord()
    {
        $sql='SELECT member_network_id, member_name, member_city_id, member_address
              FROM mlm_member
              ORDER BY member_join_datetime DESC
              LIMIT 10';
        $queryAll=Yii::app()->db->createCommand($sql)->queryAll();
        return $queryAll;
    }
}

?>
