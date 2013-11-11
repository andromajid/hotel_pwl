<?php

class WidgetTestimonial extends CWidget {
    
    public function run() {

        $results=$this->activeRecord();
        $this->render('testimonial',array(
            'results'=>$results,
        ));
    }
    
    protected function activeRecord()
    {
        $sql='SELECT * FROM site_testimonial
              WHERE testimonial_is_active=1 
              ORDER BY testimonial_date DESC
              LIMIT 4';
        
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

}

?>
