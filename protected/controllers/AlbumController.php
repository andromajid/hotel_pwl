<?php

class AlbumController extends Controller
{
	
    public function actionCategory()
    {
        $gl=new GalleryLib;
        $list_category=$gl->list_category('gallery_category_is_active');
        $title='Gallery';
        $description='Kumpulan gambar-gambar.';
        $this->seo($title, $description, $description);
        $this->render('category',array(
            'list_category'=>$list_category,
        ));
    }
    
    public function actionCategory_detail($id)
    {
        if(!is_numeric($id))
        {
            throw new CHttpException(404,'Permintaan tidak dapat dipenuhi.');
        }
        
        $gl=new GalleryLib;
        $detail=$gl->list_gallery_by_category($id,'',10,'gallery_id DESC');
        
        $detail_category=$this->loadModelCategory($id);
        $category_title=($detail_category!=null)?$detail_category->gallery_category_title:'Unknown Title';
        $category_description=($detail_category!=null)?$detail_category->gallery_category_description:'Unknown Description';
        $this->seo($category_title, $category_description, $category_description);
        
        $this->render('detail_category',array(
            'detail'=>$detail,
            'category_title'=>$category_title,
        ));
    }
    
    public function actionDetail($id)
    {
        if(!is_numeric($id))
        {
            throw new CHttpException(404,'Permintaan tidak dapat dipenuhi.');
        }
        
        $gl=new GalleryLib;
        $detail=$gl->list_gallery('1','AND gallery_id='.  intval($id));
//        echo '<pre>';
//        print_r($detail);
//        echo '</pre>';
        if($detail['count'])
        {
            $result=$detail['results'];
            $title=$result[0]->gallery_title;
            $description=  html_entity_decode($result[0]->gallery_content);
            $image=  html_entity_decode($result[0]->gallery_image);
            
            $this->seo($title,$description,$description);
            $this->render('detail',array(
                'detail'=>$detail,
                'gallery_title'=>$title,
                'gallery_description'=>$description,
                'gallery_image'=>$image,

                ));
        }
        else
        {
            throw new CHttpException(403,'Permintaan tidak dapat dilakukan.');
        }
        
    }
    
    private function loadModelCategory($id)
    {
        $model=SiteGalleryCategory::model()->findByPk($id);
        
        
        return $model;
    }
    
     private function seo($title='',$description='',$keywords='')
    {
       $this->content_title=$title;
       $this->content_description=function_lib::build_description($description);
       $this->content_keywords=  function_lib::build_keywords($keywords);
    }
}
