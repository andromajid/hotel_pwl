<?php

class AktivasiController extends adminController {

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public $layout = '//layouts/column2';

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionGenerate() {
        if (isset($_POST['kirim'])) {
            if (is_numeric($_POST['jumlah_aktivasi'])) {
                $last_serial_id = Yii::app()->db->createCommand()
                        ->select('serial_id')
                        ->from('mlm_serial')
                        ->order('serial_id DESC')
                        ->queryScalar();
                Yii::import('application.extensions.excel');
                $excel_file = 'Serial ' . Yii::app()->name . ' ' . date("Y.m.d-H.i.s") . '.xls';
                $serial_create_datetime = date("Y-m-d H:i:s");
                $excel = new excel(YiiBase::getPathOfAlias('webroot') . '/files/excel/serial/' . $excel_file);
                $arr_line = array($_POST['jumlah_aktivasi'] . ' serial');
                $excel->writeLine($arr_line);
                for ($x = 1; $x <= $_POST['jumlah_aktivasi']; $x++) {
                    $serial_pin = $this->generate_pin(6);
                    $rs_insert = Yii::app()->db->createCommand()->insert('mlm_serial', array(
                        'serial_id' => number_format(++$last_serial_id, 0, '', ''),
                        'serial_pin' => $this->generate_pin(6),
                        'serial_create_datetime' => $serial_create_datetime,
                        'serial_is_active' => '0',
                        'serial_is_used' => '0',
                            ));
                    $arr_line = array($last_serial_id, $serial_pin);
                    $excel->writeLine($arr_line);
                }
                $excel->close();
                Yii::app()->user->setFlash('success', 'serial aktivasi berhasil dibuat. Silakan <a href="' . Yii::app()->baseUrl . "/files/excel/serial/" . $excel_file . '">Download File Excel</a> untuk mengetahui hasil serial aktivasi.');
                $this->redirect(array('list'));
            } else
                Yii::app()->user->setFlash('error', 'inputan harus berupa angka');
        }
        $this->render('serial_generate');
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

        if (isset($_POST['MlmSerial'])) {
            $model->attributes = $_POST['MlmSerial'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->serial_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionList() {
        $serial_gagal = $serial_sukses = "";
        if (isset($_POST['active'])) {
            if (is_array($_POST['aktiv'])) {
                foreach ($_POST['aktiv'] as $row) {
                    $feedback = Yii::app()->db->createCommand()->update('mlm_serial', array('serial_is_active' => '1','serial_active_datetime'=>date('Y-m-d H:i:s')), 'serial_id=:serial_id', array(':serial_id' => $row));
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
                    $chek_pakai = dbHelper::getOne('serial_is_used', 'mlm_serial', 'serial_id=' . $row);
                    if ($chek_pakai) {
                        $serial_gagal .= $row . ',';
                    } else {
                        $feedback = Yii::app()->db->createCommand()->update('mlm_serial', array('serial_is_active' => '0'), 'serial_id=:serial_id', array(':serial_id' => $row));
                        if ($feedback) {
                            $serial_sukses .= $row . ',';
                        } else {
                            $serial_gagal .= $row . ',';
                        }
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
        $model = new MlmSerial('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MlmSerial']))
            $model->attributes = $_GET['MlmSerial'];

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
        $model = MlmSerial::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * buat ngelist file excel buat download
     */
    public function actionFile_list() {
        $root = YiiBase::getPathOfAlias('webroot') . '/files/excel/serial/';
        $data_arr = glob($root . "*.xls");
        //$data_arr = CFileHelper::findFiles($root, array('fileTypes' => array('xls')));
        $this->render('file_list', array('data_arr' => $data_arr));
    }

    /**
     * action buat melihat data serial pin dari searching data serial
     */
    public function actionSearch_serial_pin() {
        $data_serial = MlmSerial::model()->searchSerialPin($_GET['serial_start'], $_GET['serial_end']);
        $this->render('search_serial', array('data_serial' => $data_serial));
    }
    
    public function actionView_pin($id) {
       $this->render('view_pin', array(
            'model' => $this->loadModel($id),
        ));
    }
    
    private function generate_pin($char_length) {
        $pin = '';
        $pin_str = "1234567809";

        for ($i = 0; $i < strlen($pin_str); $i++) {
            $pin_chars[$i] = $pin_str[$i];
        }

        // randomize the chars
        srand((float) microtime() * 1000000);
        shuffle($pin_chars);

        for ($i = 0; $i < 20; $i++) {
            $char_num = rand(1, count($pin_chars));
            $pin .= $pin_chars[$char_num - 1];
        }
        $pin = substr($pin, 0, $char_length);

        return $pin;
    }

}
