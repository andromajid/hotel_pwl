<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WidgetListProject
 *
 * @author tejomurti
 */
class WidgetSlider extends CWidget{
    //put your code here
    
    public function run(){
        
        $results=$this->activeRecord();
        $this->render('slider',array(
            'results'=>$results,
        ));
    }
    
    protected function activeRecord()
    {
        $sql='SELECT * FROM site_gallery WHERE gallery_is_active="1"
              AND gallery_gallery_category_id=7
              ORDER BY RAND() LIMIT 4'; //referensi id slide
        
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
}

?>
