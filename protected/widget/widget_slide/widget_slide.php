<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of widget_slide
 *
 * @author andro
 */
class widget_slide extends CWidget {
    //put your code here
    public function run() {
        $data = $this->getData();
        $this->render('view_widget_slide', array('data' => $data));
    }
    
    private function getData($kategory_name = 'slide') {
        $data = Yii::app()->db->createCommand()->from('site_gallery')->rightJoin('site_gallery_category', 'gallery_gallery_category_id=gallery_category_id')
                          ->select('gallery_image,gallery_title')->where('gallery_category_title LIKE \'%'.$kategory_name.'%\' AND gallery_is_active = \'1\'')->queryAll();
        if(isset($data)) {
            return $data;
        }
        return array();
    }
}
