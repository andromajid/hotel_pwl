<?php
/* @var $this RewardController */
/* @var $model MlmReward */

$this->breadcrumbs=array(
	'Mlm Rewards'=>array('index'),
	$model->reward_id,
);

$this->menu=array(
	array('label'=>'daftar Reward', 'url'=>array('index')),
	array('label'=>'Create reward', 'url'=>array('create')),
	array('label'=>'Update reward', 'url'=>array('update', 'id'=>$model->reward_id)),
);
?>

<h1>View MlmReward #<?php echo $model->reward_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reward_id',
		'reward_cond_node_left',
		'reward_cond_node_right',
		'reward_bonus',
		'reward_type',
		'reward_nominal',
		'reward_is_active',
	),
)); ?>
