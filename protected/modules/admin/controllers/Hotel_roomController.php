<?php

class Hotel_roomController extends adminController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new HotelRoom;
        $file = new HotelRoomImage;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['HotelRoom'])) {
            $model->attributes = $_POST['HotelRoom'];
            if ($model->validate()) {
                //gather the 
                $model->hotel_room_facility = $this->gatherFacility();
                $model->save(false);
                Yii::import('application.helper.FileHelper');
                $file_id = FileHelper::massUpload($_FILES, 'hotel_room_image', $model->hotel_room_id);
                $this->redirect(array('view', 'id' => $model->hotel_room_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'file' => $file,
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

        if (isset($_POST['HotelRoom'])) {
            $model->attributes = $_POST['HotelRoom'];
            if ($model->validate()) {
                //gather the 
                $model->hotel_room_facility = $this->gatherFacility();
                $model->save(false);
                Yii::import('application.helper.FileHelper');
                $file_id = FileHelper::massUpload($_FILES, 'hotel_room_image', $model->hotel_room_id);
                $this->redirect(array('view', 'id' => $model->hotel_room_id));
            }
        }

        $image = new HotelRoomImage;
        //$data_provider = $image->gridList($id);
        $image->unsetAttributes();  // clear any default values
        if (isset($_GET['HotelRoomImage']))
            $model->attributes = $_GET['HotelRoomImage'];
        $this->render('update', array(
            'model' => $model,
            'data_provider' => $image
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionDelete_image($id) {
        $data = HotelRoomImage::model()->find('hotel_room_image_id = :id', array(':id' => $id));
        $data->delete();
        //unlink this fucker
        $path = Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$data->hotel_room_image;
        if(file_exists($path)) {
            unlink($path);
        }
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('HotelRoom');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new HotelRoom('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['HotelRoom']))
            $model->attributes = $_GET['HotelRoom'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionList() {
        $this->actionAdmin();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = HotelRoom::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'hotel-room-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * mengambil semua form dari facility
     */
    private function gatherFacility() {
        $arr_facility = array();
        if (isset($_POST['add_facility'])) {
            foreach ($_POST['add_facility'] as $row) {
                if ($row != '')
                    $arr_facility[] = $row;
            }
        }
        if (count($arr_facility) > 0)
            return json_encode($arr_facility);
        return '';
    }

}
