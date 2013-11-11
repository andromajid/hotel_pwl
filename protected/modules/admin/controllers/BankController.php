<?php

class BankController extends adminController {

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
        $model = new RefBank;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['RefBank'])) {
            $model->attributes = $_POST['RefBank'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->bank_id));
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

        if (isset($_POST['RefBank'])) {
            $model->attributes = $_POST['RefBank'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->bank_id));
        }

        $this->render('update', array(
            'model' => $model,
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

    /**
     * Manages all models.
     */
    public function actionList() {
        $bank_gagal = $bank_sukses = "";
        if (isset($_POST['active'])) {
            if (is_array($_POST['aktiv'])) {
                foreach ($_POST['aktiv'] as $row) {
                    $feedback = Yii::app()->db->createCommand()->update('ref_bank', array('bank_is_active' => '1'), 'bank_id=:bank_id', array(':bank_id' => $row));
                    if ($feedback) {
                        $bank_sukses .= $row . ',';
                    } else {
                        $bank_gagal .= $row . ',';
                    }
                }
            }
        }
        if (isset($_POST['cancel'])) {
            if (is_array($_POST['aktiv'])) {
                foreach ($_POST['aktiv'] as $row) {
                    $feedback = Yii::app()->db->createCommand()->update('ref_bank', array('bank_is_active' => '0'), 'bank_id=:bank_id', array(':bank_id' => $row));
                    if ($feedback) {
                        $bank_sukses .= $row . ',';
                    } else {
                        $bank_gagal .= $row . ',';
                    }
                }
            }
        }
        if (isset($_POST['cancel']) || isset($_POST['active'])) {
            if ($bank_gagal != '')
                Yii::app()->user->setFlash('error', 'bank ' . $bank_gagal . ' gagal di ubah');
            if ($bank_sukses != '')
                Yii::app()->user->setFlash('success', 'bank ' . $bank_sukses . ' berhasil di ubah');
        }
        $model = new RefBank('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['RefBank']))
            $model->attributes = $_GET['RefBank'];

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
        $model = RefBank::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ref-bank-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
