<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$_CONFIG=array();
$_CONFIG['app']['base_url']             = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Hotel PWL',
    // preloading 'log' component
    'preload' => array('log'),
    'language' => 'id',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helper.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'arkananta',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1',),
        ),
        'admin' => array(),
        'member' => array(
        //'login'
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
          'image' => array(
            'class' => 'ext.imageapi.CImage',
            'presets' => array(
                'footer' => array( //untuk slider ricky group
                    'cacheIn' => 'webroot.images_cache.footer',
                    'actions' => array(
                        'scaleAndCrop' => array('width' => 956, 'height' => 87),
                    ),
                ),
                'slider' => array( //untuk slider ricky group
                    'cacheIn' => 'webroot.images_cache.slider',
                    'actions' => array(
                        'scaleAndCrop' => array('width' => 900, 'height' => 300),
                    ),
                ),
                'thumbs' => array(
                    'cacheIn' => 'webroot.images_cache.thumbs',
                    'actions' => array(
                        'scaleAndCrop' => array('width' => 224, 'height' => 130),
                    ),
                ),
                
            ),
        ),
        
        
        'widgetFactory' => array(
            'widgets' => array(
                'CGridView' => array(
                    'htmlOptions' => array('cellspacing' => '0', 'cellpadding' => '0'),
                    'itemsCssClass' => 'table table-striped table-hover table-bordered table-condensed',
                    'pagerCssClass' => 'pager-class'
                ),
            ),
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                //'login' => 'site/login',
                'login' => 'site/login',
                
                
               //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                
               // '<controller:\w+>/<action:\w+>/*' => '<controller>/<action>',
               //'<module:\w+>/<controller:\w+>/<action:\w+>/*' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                 '<controller:\w+>/<id:\d+>' => '<controller>/view',
               //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            ),
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=hotel_pwl',
            'emulatePrepare' => true,
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
//				array(
//					'class'=>'CWebLogRoute',
//					'levels'=>'error, warning',
//				),
                // uncomment the following to show log messages on web pages

                array(
                    'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'enabled' => YII_DEBUG,
                // Access is restricted by default to the localhost
                // 'ipFilters'=>array('127.0.0.1'),
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'config'=>array(
            'dir'=>array(
            'news'=>$_CONFIG['app']['base_url'].'/files/images/',
            ),
        ),
        
    ),
        'theme' => 'modern-business',
);
