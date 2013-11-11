<?php
/* @var $this MemberController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mlm Members',
);

$this->menu=array(
	array('label'=>'Create MlmMember', 'url'=>array('create')),
	array('label'=>'Manage MlmMember', 'url'=>array('admin')),
);
?>

<h1>Mlm Members</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
