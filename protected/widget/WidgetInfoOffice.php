<?php

class WidgetInfoOffice extends CWidget {
    
    public function run() {

        $row=$this->activeRecord();
        $this->render('info_office',array(
            'row'=>$row,
        ));
    }

    protected function activeRecord()
    {
        $sql='SELECT * FROM site_page WHERE page_id=1';
        return Yii::app()->db->createCommand($sql)->queryRow();
    }
}

?>
