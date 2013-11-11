<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestimonialController
 *
 * @author tejomurti
 */
class TestimonialController extends Controller{
    //put your code here
    
    public function actionIndex()
    {
        $results=$this->activeRecord();
        $this->seo('Testimonial','Testimonial');
        $this->render('index',array(
            'results'=>$results['results'],
            'pagination'=>$results['pagination'],
        ));
    }
    
    protected function activeRecord()
    {
        
            $criteria=new CDbCriteria;
            $criteria->limit=10;
            $criteria->order='testimonial_date DESC';
            $count=SiteTestimonial::model()->count($criteria);
            $pagination = new CPagination($count);
            $pagination->pageSize =  $criteria->limit;
            $pagination->applyLimit($criteria);   
            
            $findAll=  SiteTestimonial::model()->findAll($criteria);
             return array('results'=>$findAll,'pagination'=>$pagination);
 
    }
    
    private function seo($title='',$description='',$keywords='')
    {
       $this->content_title=$title;
       $this->content_description=function_lib::build_description($description);
       $this->content_keywords=  function_lib::build_keywords($keywords);
    }
}

?>
