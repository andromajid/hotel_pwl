<?php

class WidgetMenuHeader extends CWidget {
    
    public function run() {

        $results=$this->activeRecord();
        $this->render('menu_header',array(
            'results'=>$results,
        ));
    }
    
    protected function activeRecord()
    {
        $sql='SELECT * FROM site_menu
             WHERE menu_location="user"
             AND menu_is_active="1"';
        $queryAll=Yii::app()->db->createCommand($sql)->queryAll();
        return $queryAll;
    }

}

?>
