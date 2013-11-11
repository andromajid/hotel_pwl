<?php
/* @var $this AktivasiController */
/* @var $model MlmSerial */

$this->breadcrumbs=array(
	'Mlm Serials'=>array('index'),
	$model->serial_id=>array('view','id'=>$model->serial_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MlmSerial', 'url'=>array('index')),
	array('label'=>'Create MlmSerial', 'url'=>array('create')),
	array('label'=>'View MlmSerial', 'url'=>array('view', 'id'=>$model->serial_id)),
	array('label'=>'Manage MlmSerial', 'url'=>array('admin')),
);
?>

<h1>Update MlmSerial <?php echo $model->serial_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>