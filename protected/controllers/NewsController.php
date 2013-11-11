<?php

class NewsController extends Controller {
    
    public function actionIndex() {
        $news_criteria = new CDbCriteria;
        $news_criteria->condition = "news_is_active = '1'";
        $news_criteria->order = "news_input_datetime DESC";

        $news_pagination = new CPagination(site_news::model()->count($news_criteria));
        $news_pagination->pageSize = Yii::app()->params['newsPerPage'];
        $news_pagination->applyLimit($news_criteria);

        $news_model = site_news::model()->findAll($news_criteria);

        $this->render('index', array('news_model' => $news_model, 'news_pagination' => $news_pagination));
    }

    public function actionDetail() {
        $news_model = site_news::model()->with('rel_news_to_news_category')->findByPk($_GET['id']);

        if ($news_model != null) {
           
            $title=$news_model->news_title;
            $description=$news_model->news_content;
            $this->seo($title, $description, $description);
        }
        else $other_news_model = null;
        
        
        $this->render('detail', array(
            'news_model' => $news_model,
            
            'other_news_model' => $other_news_model,
        ));
    }

    public function actionTag() {
        $news_tag_value = str_replace("-", " ", $_GET['value']);
        $news_tag_criteria = new CDbCriteria;
        $news_tag_criteria->condition = "news_tag_value = '{$news_tag_value}'";
        $news_tag_criteria->group = "news_tag_news_id";
        $news_tag_model = site_news_tag::model()->with('rel_news_tag_to_news')->findAll($news_tag_criteria);

        $news_tag_pagination = new CPagination(count($news_tag_model));
        $news_tag_pagination->pageSize = Yii::app()->params['newsPerPage'];
        $news_tag_pagination->applyLimit($news_tag_criteria);

        $this->render('tag', array(
            'news_tag_value' => $news_tag_value,
            'news_tag_model' => $news_tag_model,
            'news_tag_pagination' => $news_tag_pagination,
        ));
    }
    
    public function actionNews_category()
    {
       $model=new site_news_category;
       $criteria=new CDbCriteria;
      
       $criteria->addCondition('news_category_is_active="1"');
       $dataProvider=array();
       
       
       $count=$model->count($criteria);
       if($count)
       {
           $dataProvider=$model->findAll($criteria);
       }
       $this->render('news_category',array(
           'dataProvider'=>$dataProvider,
       ));
    }
    
    public function actionNews_category_detail($id)
    {
       if(!is_numeric($id))
       {
           throw new CHttpException(404, 'Permintaan tidak valids.'.$id);
       }
       
       $nl=new NewsLib;
       
       $news_cd=$nl->list_news_by_category($id,'',true);

       $category_title=($news_cd['count'])?$news_cd['results'][0]->rel_news_to_news_category->news_category_title:News_helper::category_name($id);
       $category_description=($news_cd['count'])?$news_cd['results'][0]->rel_news_to_news_category->news_category_description:News_helper::category_name($id);
       
       $this->seo($category_title, $category_description, $category_description);
       
       $this->render('news_category_detail',array(
                    'news_cd'=>$news_cd,
                    'category_title'=>$category_title,
                    'category_desc'=>$category_description,
       ));
    }
    
    
    /**
     * archive
     */
    public function actionArchive($type='news',$criteria='general')
    {
        $purify=new CHtmlPurifier;
        $nl=new NewsLib;
        $condition='news_category_is_active="1" AND news_category_type="'.$purify->purify($type).'"';
        $results=$nl->list_category($condition);
        $label_title=($type=='portfolio')?"Project":'Archive';
        $this->seo($label_title, $label_title, $label_title);
        $this->render('archive',array(
            'results'=>$results,
            'nl'=>$nl,
            'label_title'=>$label_title,
            'criteria'=>$purify->purify($criteria),
        ));
    }
    
    public function actionSearch($q='',$ajax='false')
    {
        $news_lib=new NewsLib;
        
        $results=$news_lib->search($q);
        
        $title='Searching for : '.$q;
        $description=  $q;
        $this->seo($title,$description,$description);
        if($ajax=='true')
        {
             $this->renderPartial('search',array(
                'dataProvider'=>$results,
                'news_lib'=>$news_lib,
                'title'=>$title,
                'q'=>$q,
            ));
        }
        else
        {
             $this->render('search',array(
                'dataProvider'=>$results,
                'news_lib'=>$news_lib,
                'title'=>$title,
                'q'=>$q,
        ));
        }
       
    }
    
    private function seo($title='',$description='',$keywords='')
    {
       $this->content_title=$title;
       $this->content_description=function_lib::build_description($description);
       $this->content_keywords=  function_lib::build_keywords($keywords);
    }
    
}
