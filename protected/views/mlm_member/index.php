<?php
/* @var $this Mlm_memberController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mlm Members',
);

$this->menu=array(
	array('label'=>'Create mlm_member', 'url'=>array('create')),
	array('label'=>'Manage mlm_member', 'url'=>array('admin')),
);
?>

<h1>Mlm Members</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
