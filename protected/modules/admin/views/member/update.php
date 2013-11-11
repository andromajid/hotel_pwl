<?php
/* @var $this MemberController */
/* @var $model MlmMember */

$this->breadcrumbs=array(
	'Mlm Members'=>array('/admin/member/list'),
	$model->member_name=>array('view','id'=>$model->member_network_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Member', 'url'=>array('/admin/member/list')),
);
?>
<?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Update Member '.$model->MlmNetwork->network_mid, 'hideOnEmpty' => TRUE)); ?> 
<h1>Update MlmMember <?php echo $model->MlmNetwork->network_mid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->endWidget();?>