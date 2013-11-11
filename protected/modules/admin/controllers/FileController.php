<?php
class FileController extends adminController {
    public $layout = '//layouts/column1';
    //put your code here
    public function actions() {
        return array(
            'connector' => array(
                'class' => 'ext.elfinder.ElFinderConnectorAction',
                'settings' => array(
//                    'driver'        => 'LocalFileSystem',
//                    'path' => Yii::getPathOfAlias('webroot') . '/uploads/',
//                    'URL' => Yii::app()->baseUrl . '/uploads/',
//                    //'rootAlias' => 'Home',
//                    'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
//                    //'mimeDetect' => 'none'
                    'roots' => array(
                        array(
                            'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
                            'path' => Yii::getPathOfAlias('webroot') . '/files/', // path to files (REQUIRED)
                            'URL' => Yii::app()->baseUrl . '/files/', // URL to files (REQUIRED)
                            'mimeDetect' => 'internal',
                        )
                    )
                )
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }
    public function actionFrame() {
        $this->layout = '//layouts/frame';
        $this->render('frame');
    }
}

?>
