<?php

class WidgetInfoBank extends CWidget {
    
    public function run() {

        
        $row=$this->activeRecord();
        $this->render('info_bank',array(
            'row'=>$row,
        ));
    }

     protected function activeRecord()
    {
        $sql='SELECT * FROM site_page WHERE page_id=2';
        return Yii::app()->db->createCommand($sql)->queryRow();
    }
}

?>
