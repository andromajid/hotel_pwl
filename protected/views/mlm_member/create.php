<?php
/* @var $this Mlm_memberController */
/* @var $model mlm_member */

$this->breadcrumbs=array(
	'Mlm Members'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List mlm_member', 'url'=>array('index')),
	array('label'=>'Manage mlm_member', 'url'=>array('admin')),
);
?>

<h1>Create mlm_member</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>