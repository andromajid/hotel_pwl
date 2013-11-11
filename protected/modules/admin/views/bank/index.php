<?php
/* @var $this BankController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ref Banks',
);

$this->menu=array(
	array('label'=>'Create RefBank', 'url'=>array('create')),
	array('label'=>'Manage RefBank', 'url'=>array('admin')),
);
?>

<h1>Ref Banks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
