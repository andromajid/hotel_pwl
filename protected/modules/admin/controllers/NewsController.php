<?php

class NewsController extends adminController {

    public $layout = '//layouts/column2';

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        $model = new SiteNews;

        if (isset($_POST['SiteNews'])) {
            $model->attributes = $_POST['SiteNews'];
            $model->news_admin_id = $this->admin_auth->admin_id;
            $model->news_input_datetime = date("Y-m-d H:i:s");
            $model->news_is_active = '1';

            /* penanganan image */
            $image_file = CUploadedFile::getInstance($model, 'news_image');
            // has the user uploaded a new file?
            if ($image_file) {
                if (!is_dir(Yii::getPathOfAlias('webroot') . '/files/images/' . $model->news_image)) {
                    mkdir(Yii::getPathOfAlias('webroot') . '/files/images/' . $model->news_image);
                    chmod(Yii::getPathOfAlias('webroot') . '/files/images/' . $model->news_image, 0777);
                }
                $model->news_image = $image_file->name;
                //$picture_file->SaveAs(Yii::app()->getBasePath().'/images/news' . $picture_name);
                $image_file->SaveAs(Yii::getPathOfAlias('webroot') . '/files/images/' . $image_file->name);
            }
            $model->news_video_url=  str_replace('watch?v=','embed/', $model->news_video_url);

            if ($model->save()) {
                $news_id = Yii::app()->db->getLastInsertID();
                Yii::app()->user->setFlash('success', 'Berita telah berhasil dibuat.');
                $this->redirect(array('list'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['SiteNews'])) {
            $model->attributes = $_POST['SiteNews'];
            /* penanganan image */
            $image_file = CUploadedFile::getInstance($model, 'news_image');
            // has the user uploaded a new file?
            if ($image_file) {
                if (!is_dir(Yii::getPathOfAlias('webroot') . '/files/images/' . $model->news_image)) {
                    mkdir(Yii::getPathOfAlias('webroot') . '/files/images/' . $model->news_image);
                    chmod(Yii::getPathOfAlias('webroot') . '/files/images/' . $model->news_image, 0777);
                }
                $model->news_image = $image_file->name;
                //$picture_file->SaveAs(Yii::app()->getBasePath().'/images/news' . $picture_name);
                $image_file->SaveAs(Yii::getPathOfAlias('webroot') . '/files/images/' . $image_file->name);
            }
            $model->news_video_url=  str_replace('watch?v=','embed/', $model->news_video_url);
            if($model->news_news_category_id!=$this->videoId)
            {
              $model->news_video_url='';  
            }
            if ($model->save())
                $this->redirect(array('update', 'id' => $model->news_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('SiteNews');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionList() {
        $news_gagal = $news_sukses = "";
        if (isset($_POST['active'])) {
            if (is_array($_POST['aktiv'])) {
                foreach ($_POST['aktiv'] as $row) {
                    $feedback = Yii::app()->db->createCommand()->update('site_news', array('news_is_active' => '1'), 'news_id=:news_id', array(':news_id' => $row));
                    if ($feedback) {
                        $news_sukses .= $row . ',';
                    } else {
                        $news_gagal .= $row . ',';
                    }
                }
            }
        }
        if (isset($_POST['cancel'])) {
            if (is_array($_POST['aktiv'])) {
                foreach ($_POST['aktiv'] as $row) {
                    $feedback = Yii::app()->db->createCommand()->update('site_news', array('news_is_active' => '0'), 'news_id=:news_id', array(':news_id' => $row));
                    if ($feedback) {
                        $news_sukses .= $row . ',';
                    } else {
                        $news_gagal .= $row . ',';
                    }
                }
            }
        }
        if (isset($_POST['cancel']) || isset($_POST['active'])) {
            if ($news_gagal != '')
                Yii::app()->user->setFlash('error', 'news ' . $news_gagal . ' gagal di ubah');
            if ($news_sukses != '')
                Yii::app()->user->setFlash('success', 'news ' . $news_sukses . ' berhasil di ubah');
        }
        $model = new SiteNews('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SiteNews']))
            $model->attributes = $_GET['SiteNews'];

        $this->render('list', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = SiteNews::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'site-news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
