<?php
/* @var $this AktivasiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mlm Serials',
);

$this->menu=array(
	array('label'=>'Create MlmSerial', 'url'=>array('create')),
	array('label'=>'Manage MlmSerial', 'url'=>array('admin')),
);
?>

<h1>Mlm Serials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
