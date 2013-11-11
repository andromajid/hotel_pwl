<?php
/* @var $this MemberController */
/* @var $model MlmMember */

$this->breadcrumbs=array(
	'Mlm Members'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MlmMember', 'url'=>array('index')),
	array('label'=>'Manage MlmMember', 'url'=>array('admin')),
);
?>

<h1>Create MlmMember</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>