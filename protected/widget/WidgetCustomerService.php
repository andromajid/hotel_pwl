<?php

class WidgetCustomerService extends CWidget {
    
    public function run() {

        $results=$this->actvieRecordSupport();
        $this->render('customer_service',array(
                'results'=>$results,));
    }
    
    private function  actvieRecordSupport()
    {
        $sql='SELECT * FROM site_support';
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

}

?>
