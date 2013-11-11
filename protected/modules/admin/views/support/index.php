<?php
/* @var $this SupportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Site Supports',
);

$this->menu=array(
	array('label'=>'Create SiteSupport', 'url'=>array('create')),
	array('label'=>'Manage SiteSupport', 'url'=>array('admin')),
);
?>

<h1>Site Supports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
