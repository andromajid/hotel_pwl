<!DOCTYPE html>
<html class="no-js">
    <?php 
        $baseUrl = Yii::app()->theme->baseUrl;
    ?>
    <head>
        
        <script src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/bootbox.js"></script>
        <script src="<?php echo $baseUrl; ?>/assets/scripts.js"></script>
        <title><?php echo isset($this->title) ? $this->title : 'admin home page'; ?></title>
        <!-- Bootstrap -->
        <?php
        $baseUrl = Yii::app()->theme->baseUrl;

        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
        <link href="<?php echo $baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $baseUrl; ?>/assets/template.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?php echo $baseUrl; ?>/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>

    <body>
        <div class="loading">Loading...</div>
        <section id="navigation-main">   
            <!-- Require the navigation -->
            <?php require_once('tpl_navigation.php') ?>
        </section><!-- /#navigation-main -->
        <div class="container-fluid">
            <?php
            if (Yii::app()->user->hasFlash('error')) {
                echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>' . Yii::app()->user->getFlash('error') . '</div>';
            }
            if (Yii::app()->user->hasFlash('success')) {
                echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>' . Yii::app()->user->getFlash('success') . '</div>';
            }
            ?>
            <div class="row-fluid">
                <?php echo $content; ?>
            </div>
            <hr>
            <footer>
                <p>&copy; Andro Majid 2013</p>
            </footer>
        </div>
        <!--/.fluid-container-->
    </body>

</html>