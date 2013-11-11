<?php

class MemberController extends adminController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        //ambil data diri semua
        $id = MlmHelper::getNetworkId($id);
        //  $data_member = MlmMember::model()->getMemberInfo($id);
        $this->renderPartial('modal', array('model' => MlmMember::model()->findByPk($id),));
//		$this->render('view',array(
//			'model'=>$this->loadModel($id),
//		));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionPassword($id) {
        $model_password = new MlmPassword('change_password');
        $model_password = $model_password->find('password_network_id=:id', array(':id' => $id));
        $model_member = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['MlmPassword'])) {
            //$model_password->attributes = $_POST['MlmPassword'];
            $model_password->password_value = $_POST['MlmPassword']['password_value'];
            $model_password->password_repeat = $_POST['MlmPassword']['password_repeat'];
            if ($model_password->validate()) {
                $model_password->password_value = md5($model_password->password_value);
                Yii::app()->db->createCommand()->update('mlm_password', array('password_value' => $model_password->password_value), 'password_network_id=:network_id', array(':network_id' => $model_password->password_network_id));
                Yii::app()->user->setFlash('success', 'data berhasil diganti');
                $this->redirect(array('password', 'id' => $id));
            }
        }

        $this->render('password', array(
            'model_password' => $model_password,
            'model_member' => $model_member
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

        if (isset($_POST['MlmMember'])) {
            
            UploadFileHelper::UploadThumbPic($model);

            $model->attributes = $_POST['MlmMember'];
            $model->member_image = (isset($_FILES['MlmMember']['name']['member_image']) AND trim($_FILES['MlmMember']['name']['member_image']) != '')?$_FILES['MlmMember']['name']['member_image']:$_POST['old_image'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'data berhasil di ganti');
            }
            //$this->redirect(array('view', 'id' => $model->member_network_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionList() {
        $this->layout = '//layouts/column1';
        $model = new MlmMember('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MlmMember']))
            $model->attributes = $_GET['MlmMember'];

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
        $model = MlmMember::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'mlm-member-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Buat Login ke Voffice
     */
    public function actionLogin($id) {
        $sql = 'SELECT mlm_network.*,mlm_member.* FROM mlm_network
              LEFT JOIN mlm_member ON network_id=member_network_id
              LEFT JOIN mlm_password ON network_id=password_network_id
              WHERE network_id="' . $id . '"';

        $queryAll = Yii::app()->db->createCommand($sql)->queryRow();
        $_SESSION['member']=$queryAll;
        $this->redirect(Yii::app()->baseUrl.'/member/profile');
    }
    /**
     * action buat suspend member
     */
    public function actionSuspendmember() {
        $network_id = $_GET['id'];
        $data_update = $_GET['data'];
        $sql = "UPDATE mlm_member SET member_is_suspended='".$data_update."' WHERE member_network_id=".$network_id;
//        $feedback = Yii::app()->db->createCommand()->update('mlm_member', array('member_is_suspended' => $data_update,), 
//                    array('member_network_id=:network_id', array(':network_id' => $network_id)));
        $feedback = Yii::app()->db->createCommand($sql)->execute();
        $member_suspended = Yii::app()->db->createCommand()->from('mlm_member_suspended')->where('member_suspended_network_id=:network_id', array(':network_id' => $network_id))
                            ->order('member_suspended_id DESC')->limit(1)->queryRow();
        if($data_update == '0') {
            Yii::app()->db->createCommand()->update('mlm_member_suspended', array('member_suspended_end_datetime' => date("Y-m-d H:i:s")), 'member_suspended_id=:suspended_id',   
                                                     array(':suspended_id' => $member_suspended['member_suspended_id']));
       } else {
           Yii::app()->db->createCommand()->insert('mlm_member_suspended', array('member_suspended_network_id' => $network_id,
                                                                               'member_suspended_start_datetime' => date('Y-m-d H:i:s')));
       }
        if($feedback) {
           echo CJavaScript::jsonEncode(array('success' => true,
                                    'message' => 'Member berhasil di non aktivkan'));
        } else {
            echo CJavaScript::jsonEncode(array('success' => false,
                                    'message' => 'Member gagal di non aktivkan'));
        }
        Yii::app()->end();
    }
}
