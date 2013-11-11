<?php

class ConfigController extends adminController {

    public function actionWebsite() {
        if ($_POST['update']) {
            dbHelper::setConfig('website_title', $_POST['website_title']);
            dbHelper::setConfig('website_keyword', $_POST['website_keyword']);
            dbHelper::setConfig('website_description', $_POST['website_description']);
             dbHelper::setConfig('mlm_price', intval($_POST['mlm_price']));
             dbHelper::setConfig('mlm_email', $_POST['mlm_email']);
            Yii::app()->user->setFlash('success', 'konfigurasi berhasil diubah');
        }
        $this->render('website');
    }

}