<?php
$controller = Yii::app()->getController();

$default_controller = Yii::app()->defaultController;

$isHome = $controller->getId() === $default_controller && $controller->getAction()->getId() === 'index';
$baseUrl = Yii::app()->theme->baseUrl;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo isset($this->title) ? $this->title : 'Hotel Pemrograman Web Lanjut'; ?></title>
        <?php
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $baseUrl; ?>/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="<?php echo $baseUrl; ?>/css/modern-business.css" rel="stylesheet">
        <link href="<?php echo $baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                    <a class="navbar-brand" href="index.html"><?php echo dbHelper::getConfig('website_title'); ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Room<b class="caret"></b></a>
                            <?php $this->widget('application.widget.widgetRoomMenu'); ?>
                        </li>
                        <li><a href="<?php echo $this->createUrl('/book'); ?>">Book Now</a></li>
                        <li><a href="<?php echo $this->createUrl('/page/show', array('id' => 8)); ?>">Meeting Facilites</a></li>
                        <li><a href="<?php echo $this->createUrl('/page/show', array('id' => 9)); ?>">Catering</a></li>
                        <li><a href="<?php echo $this->createUrl('/page/show', array('id' => 10)); ?>">restaurant</a></li>
                        <li><a href="<?php echo $this->createUrl('/page/show', array('id' => 11)); ?>">Laundry</a></li>
                        <li><a href="<?php echo $this->createUrl('/album/category'); ?>">Gallery</a></li>
                        <li><a href="<?php echo $this->createUrl('/site/contact'); ?>">Contact Us</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>

        <!--slide-->
        <?php
        if ($isHome)
            $this->widget('application.widget.widget_slide.widget_slide');
        ?>
        <!--end slide-->
        <div class="section">
            <?php if (Yii::app()->user->hasFlash('message')): ?>
                <div class="container">
                    <div class="alert alert-success"><?php echo Yii::app()->user->getFLash('message'); ?></div>
                </div>
            <?php endif; ?>
            <?php if (Yii::app()->user->hasFlash('error')): ?>
                <div class="container">
                    <div class="alert alert-danger"><?php echo Yii::app()->user->getFLash('error'); ?></div>
                </div>
            <?php endif; ?>
            <div class="container">
                <?php echo $content; ?>
            </div><!-- /.container -->

        </div><!-- /.section -->

        <div class="container">

            <hr>

            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; andromajid.com</p>
                    </div>
                </div>
            </footer>

        </div><!-- /.container -->

        <!-- Bootstrap core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->\
        <script src="<?php echo $baseUrl; ?>/js/bootstrap.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/modern-business.js"></script>
    </body>
</html>
