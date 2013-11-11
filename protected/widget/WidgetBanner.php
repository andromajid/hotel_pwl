<?php

class WidgetBanner extends CWidget {
    
    public function run() {

        $results=$this->activeRecord();
        $this->render('banner',array(
            'results'=>$results,
        ));
    }
    
     protected function activeRecord()
    {
        $sql='SELECT * FROM site_gallery WHERE gallery_is_active="1"
              AND gallery_gallery_category_id=9
              ORDER BY RAND() LIMIT 2'; //referensi id slide
        
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

}

?>
