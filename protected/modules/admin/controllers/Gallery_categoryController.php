<?php

class Gallery_categoryController extends adminController
{
	
    
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	
        /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $message='';
		$model=new SiteGalleryCategory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SiteGalleryCategory']))
		{
			$model->attributes=$_POST['SiteGalleryCategory'];
			if($model->validate())
                        {
                            $image=$this->upload_image($model);
                            if($image['status']==200)
                            {
                                
                                $model->gallery_category_image=$image['message'];
                                $model->save();
                                $this->redirect(array('view','id'=>$model->gallery_category_id));
                            }
                            $message=$image['message'];
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
			'message'=>$message,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
                $message='';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SiteGalleryCategory']))
		{
			$model->attributes=$_POST['SiteGalleryCategory'];
			if($model->validate())
                        {
                            $image=$this->upload_image($model);
                            if($image['status']==200)
                            {
                                $model->gallery_category_image=$image['message'];
                                $model->save();
                                $this->redirect(array('view','id'=>$model->gallery_category_id));

                            }
                            $message=$image['message'];
                        }
		}

		$this->render('update',array(
			'model'=>$model,
			'message'=>$message,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('list'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

//	/**
//	 * Lists all models.
//	 */
//	public function actionIndex()
//	{
//		$dataProvider=new CActiveDataProvider('SiteGalleryCategory');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
//	}

	/**
	 * Manages all models.
	 */
	public function actionList()
	{
		$model= new SiteGalleryCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SiteGalleryCategory']))
			$model->attributes=$_GET['SiteGalleryCategory'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=SiteGalleryCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='site-gallery-category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
    private function upload_image($model,$model_name='SiteGalleryCategory',$field_name='gallery_category_image',$field_name_old='gallery_category_image_old')
    {
        $status=200;
        $image_name='';
        if(isset($_FILES[$model_name]['name']) AND trim($_FILES[$model_name]['name'][$field_name])!='')
        {
            
                        $result_file=  UploadFileHelper::upload_file($field_name, '/images/gallery/', $model);
                    
                        if(!$result_file['result'])
                        {
                            $status=500;
                            $image_name=$_POST[$field_name_old];
                            Yii::app()->user->setFlash('message_error',$result_file['result_string']);

                            return array('status'=>200,'message'=>$image_name);        
                        }
                        else
                        {
                            $status=200;
                            $image_name=$result_file['result_string'];
                        }
                    }
        else
        {
            $image_name=$_POST[$field_name_old];
        }
                    
        return array('status'=>200,'message'=>$image_name);        
    }
}
