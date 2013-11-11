<?php
/* @var $this RewardController */
/* @var $model MlmReward */

$this->breadcrumbs=array(
	'Mlm Rewards'=>array('index'),
	$model->reward_id=>array('view','id'=>$model->reward_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create MlmReward', 'url'=>array('create')),
	array('label'=>'lihat reward', 'url'=>array('view', 'id'=>$model->reward_id)),
	array('label'=>'daftar reward', 'url'=>array('index')),
);
?><?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'update Reward ', 'hideOnEmpty' => TRUE)); ?> 
<div class="alert">
    <strong>Bonus yang bertipe cash akan mendapatkan bonus nominal setiap bulannya dan bisa mendapat banyak reward dalam satu sesi(setahun bisa 2 reward atau lebih)</strong>
</div>
<h1>Update MlmReward <?php echo $model->reward_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model));
$this->endWidget();
?>