<?php
/* @var $this SupportController */
/* @var $model SiteSupport */

$this->breadcrumbs=array(
	'daftar Support'=>array('index'),
	$model->support_name=>array('view','id'=>$model->support_id),
	'Update',
);

$this->menu=array(
	array('label'=>'daftar Support', 'url'=>array('index')),
	array('label'=>'Create SiteSupport', 'url'=>array('create')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Update Data '.$model->support_name, 'hideOnEmpty' => TRUE));
?>

<h4>Update SiteSupport <?php echo $model->support_name; ?></h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 
$this->endWidget();
?>