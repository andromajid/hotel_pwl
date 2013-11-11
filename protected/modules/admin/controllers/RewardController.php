<?php

class RewardController extends adminController {

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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new MlmReward;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['MlmReward'])) {
            $model->attributes = $_POST['MlmReward'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->reward_id));
        }

        $this->render('create', array(
            'model' => $model,
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

        if (isset($_POST['MlmReward'])) {
            $model->attributes = $_POST['MlmReward'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->reward_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $serial_gagal = $serial_sukses = "";
        if (isset($_POST['active'])) {
            if (is_array($_POST['aktiv'])) {
                foreach ($_POST['aktiv'] as $row) {
                    $feedback = Yii::app()->db->createCommand()->update('mlm_reward', array('reward_is_active' => '1'), 'reward_id=:reward_id', array(':reward_id' => $row));
                    if ($feedback) {
                        $serial_sukses .= $row . ',';
                    } else {
                        $serial_gagal .= $row . ',';
                    }
                }
            }
        }
        if (isset($_POST['cancel'])) {
            if (is_array($_POST['aktiv'])) {
                foreach ($_POST['aktiv'] as $row) {
                    $feedback = Yii::app()->db->createCommand()->update('mlm_reward', array('reward_is_active' => '0'), 'reward_id=:reward_id', array(':reward_id' => $row));
                    if ($feedback) {
                        $serial_sukses .= $row . ',';
                    } else {
                        $serial_gagal .= $row . ',';
                    }
                }
            }
        }
        if (isset($_POST['cancel']) || isset($_POST['active'])) {
            if ($serial_gagal != '')
                Yii::app()->user->setFlash('error', 'serial ' . $serial_gagal . ' gagal di ubah');
            if ($serial_sukses != '')
                Yii::app()->user->setFlash('success', 'serial ' . $serial_sukses . ' berhasil di ubah');
        }
        $model = new MlmReward('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MlmReward']))
            $model->attributes = $_GET['MlmReward'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = MlmReward::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'mlm-reward-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * fungsi buat menampilkan data2 member2 yang mendapatkan reward
     */
    public function actionMemberlist() {
        $serial_gagal = $serial_sukses = "";
        if (isset($_POST['active'])) {
            if (is_array($_POST['aktiv'])) {
                foreach ($_POST['aktiv'] as $row) {
                    $feedback = Yii::app()->db->createCommand()->update('mlm_reward_log', array('reward_log_is_approve' => '1', 'reward_log_approve_datetime' => date("Y-m-d H:i:s")), 'reward_log_id=:reward_id', array(':reward_id' => $row));
                    if ($feedback) {
                        $serial_sukses .= $row . ',';
                    } else {
                        $serial_gagal .= $row . ',';
                    }
                }
            }
        }
        $model = new MlmRewardLog('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MlmRewardLog']))
            $model->attributes = $_GET['MlmRewardLog'];

        $this->render('rewardLog', array(
            'model' => $model,
        ));
    }

}
