<?php

class GalleryController extends adminController {

    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionIndex() {
        if (isset($_GET['refresh'])) {
            $model = new SiteGalleryCategory;

            $count = $model->count();
            //$info_category=(!$count)?'<a href="'.Yii::app()->baseUrl.'/admin/content/gallery_category/create" target="_blank">Buat Kategori</a> - <a href="#" id="refresh">Refresh</a>':'';

            echo '
                <label for="SiteGallery_gallery_gallery_category_id" class="required">Category <span class="required">*</span></label>    
                <select name="SiteGallery[gallery_gallery_category_id]">';
            echo '<option value="">Please select category</option>';
            if ($count) {
                $results = $model->findAll();
                foreach ($results AS $row) {
                    echo '<option value="' . $row->gallery_category_id . '">' . $row->gallery_category_title . '</option>';
                }
            }
            echo '</select><br />';
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new SiteGallery;

        $count_category = SiteGalleryCategory::model()->count();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['SiteGallery'])) {
            $model->attributes = $_POST['SiteGallery'];
            if ($model->validate()) {
                $image = $this->upload_image($model);
                $model->gallery_image = $image;
                $model->gallery_input_datetime = date('Y-m-d H:i:s');
                $model->gallery_admin_id = Yii::app()->getId();
                $model->save();
                $this->redirect(array('view', 'id' => $model->gallery_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'count_category' => $count_category,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $count_category = SiteGalleryCategory::model()->count();
        if (isset($_POST['SiteGallery'])) {
            $model->attributes = $_POST['SiteGallery'];
            if ($model->validate()) {
                $image = $this->upload_image($model);
                //echo $image;exit;
                if ($image) {
                    //  die('ok');
                    $model->gallery_admin_id = Yii::app()->getId();
                    $model->gallery_image = $image;
                    $model->save();
                    $this->redirect(array('view', 'id' => $model->gallery_id));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
            'count_category' => $count_category,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('list'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionList() {
        $model = new SiteGallery('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SiteGallery']))
            $model->attributes = $_GET['SiteGallery'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = SiteGallery::model()->with('rel_gallery_to_category')->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'site-gallery-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private function upload_image($model, $model_name = 'SiteGallery', $field_name = 'gallery_image', $field_name_old = 'gallery_image_old') {

        $image_name = '';
        if (isset($_FILES[$model_name]['name']) AND trim($_FILES[$model_name]['name'][$field_name]) != '') {

            $result_file = UploadFileHelper::upload_file($field_name, '/images/gallery/', $model);

            if (!$result_file['result']) {
                $image_name = $_POST[$field_name_old];
                Yii::app()->user->setFlash('message_error', $result_file['result_string']);
                //$this->redirect(array('create'));

                return 0;
            } else {
                $image_name = $result_file['result_string'];
            }
        } else {

            $image_name = $_POST[$field_name_old];
        }

        return $image_name;
    }

}
