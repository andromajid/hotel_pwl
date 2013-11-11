<?php
/* @var $this SupportController */
/* @var $model SiteSupport */

$this->breadcrumbs=array(
	'Site Supports'=>array('index'),
	$model->support_id,
);

$this->menu=array(
	array('label'=>'List SiteSupport', 'url'=>array('index')),
	array('label'=>'Create SiteSupport', 'url'=>array('create')),
	array('label'=>'Update SiteSupport', 'url'=>array('update', 'id'=>$model->support_id)),
	array('label'=>'Delete SiteSupport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->support_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SiteSupport', 'url'=>array('admin')),
);
?>

<h1>View SiteSupport #<?php echo $model->support_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'support_id',
		'support_name',
		'support_nick',
		'support_phone',
	),
)); ?>
