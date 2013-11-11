<?php
$baseUrl = Yii::app()->theme->baseUrl; 
$uri_1=function_lib::uri_segment(1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo !$this->content_title?Yii::app()->name:$this->content_title;?></title>
<META NAME="description" CONTENT="<?php echo $this->content_description; ?>" /> 
<META NAME="keywords" CONTENT="<?php echo $this->content_keywords; ?>" /> 
<link href="<?php echo $baseUrl.'/views/layouts/';?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $baseUrl.'/views/layouts/';?>includes/ticker-style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo $baseUrl.'/views/layouts/';?>includes/jquery.min.js"></script> 	
	<script src="<?php echo $baseUrl.'/views/layouts/';?>includes/jquery.ticker.js" type="text/javascript"></script>
	<script src="<?php echo $baseUrl.'/views/layouts/';?>includes/site.js" type="text/javascript"></script>
<style type="text/css">
 
 img, div, input { behavior: url("<?php echo $baseUrl.'/views/layouts/';?>iepngfix.htc") }
 
 </style>
</head>

<body>
<div id="header">
	<div class="logo"><a href="#"><img src="<?php echo $baseUrl.'/views/layouts/';?>images/logo.png" /></a></div>
    <?php $this->widget('application.widget.WidgetLogin'); ?>

    <div class="clear"></div>
        <?php $this->widget('application.widget.WidgetMenuHeader'); ?>

    <div class="social">
    <a href="#"><img src="<?php echo $baseUrl.'/views/layouts/';?>images/fb.png" /></a>
    <a href="#"><img src="<?php echo $baseUrl.'/views/layouts/';?>images/tw.png" /></a>
    </div>
</div>
<div id="content">
<?php
if($uri_1=='')
{
    
    
?>    
<?php $this->widget('application.widget.WidgetSlider'); ?>

<div id="slider-right">

<?php $this->widget('application.widget.WidgetBannerCs'); ?>
<?php $this->widget('application.widget.WidgetCustomerService'); ?>

</div>
<div class="clear"></div>
<?php
}
?>
<?php $this->widget('application.widget.WidgetNewsTicker'); ?>


<?php
if($uri_1=='')
{
?>
<div id="sideleft">
        <?php $this->widget('application.widget.WidgetTestimonial'); ?>
        <?php $this->widget('application.widget.WidgetVideo'); ?>
        <?php $this->widget('application.widget.WidgetGallery'); ?>

	
    
    <div class="clear"></div>
</div>
<div id="center">
	
    <?php $this->widget('application.widget.WidgetProduct'); ?>
    <?php $this->widget('application.widget.WidgetReward'); ?>
    <?php $this->widget('application.widget.WidgetPromo'); ?>
    <?php $this->widget('application.widget.WidgetBanner'); ?>

<div class="clear"></div>
</div>
<?php
}
else
{
    ?>
    <div class="single_left">
    <?php
    if (Yii::app()->user->hasFlash('error')) {
        echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>' . Yii::app()->user->getFlash('error') . '</div>';
    }
    if (Yii::app()->user->hasFlash('success')) {
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>' . Yii::app()->user->getFlash('success') . '</div>';
    }
    ?>
    <?php echo $content;?>
    </div>
<?php    
}
?>
<div id="sidebar">
	
   
    
    <?php $this->widget('application.widget.WidgetInfoOffice'); ?>
    <?php $this->widget('application.widget.WidgetInfoBank'); ?>
    <?php $this->widget('application.widget.WidgetNewMember'); ?>
    <?php $this->widget('application.widget.WidgetLatestArticle'); ?>

    
    <div class="clear"></div>
</div>
<div class="clear"></div>
</div>

<div id="box-footer">
    <div id="menu-bottom">
              <?php $this->widget('application.widget.WidgetMenuHeader'); ?>

            </div>
    <div id="contact">
        <p>Jl. Gamelan Lor 15 Yogyakarta 55131</p>
        <p>Telp/Fax: 0274-370969 email: cfl@centreforlead.org</p><br />
        <img src="<?php echo $baseUrl.'/views/layouts/';?>images/mk.png" border="0" />
    </div>
        <?php $this->widget('application.widget.WidgetFooter'); ?>

</div>
</div>
<link rel="stylesheet" href="<?php echo $baseUrl.'/views/layouts/';?>js/orbit-1.2.3.css" />
		
		<script type="text/javascript" src="<?php echo $baseUrl.'/views/layouts/';?>js/jquery.orbit-1.2.3.js"></script>	
		
	<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit();
			});
		</script>
</body>
</html>
