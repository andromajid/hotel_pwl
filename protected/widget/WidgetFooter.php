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
class WidgetFooter extends CWidget{
    //put your code here
    
    public function run(){
        
        $results=$this->activeRecord();
        $this->render('footer',array(
            'results'=>$results,
        ));
    }
    
     protected function activeRecord()
    {
        $sql='SELECT * FROM site_gallery WHERE gallery_is_active="1"
              AND gallery_gallery_category_id=10
              ORDER BY RAND() LIMIT 6'; //referensi id slide
        
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
}

?>
