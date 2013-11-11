<?php
/* @var $this Mlm_memberController */
/* @var $model mlm_member */

$this->breadcrumbs=array(
	'Mlm Members'=>array('index'),
	$model->member_network_id=>array('view','id'=>$model->member_network_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List mlm_member', 'url'=>array('index')),
	array('label'=>'Create mlm_member', 'url'=>array('create')),
	array('label'=>'View mlm_member', 'url'=>array('view', 'id'=>$model->member_network_id)),
	array('label'=>'Manage mlm_member', 'url'=>array('admin')),
);
?>

<h1>Update mlm_member <?php echo $model->member_network_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>