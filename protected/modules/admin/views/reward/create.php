<?php
/* @var $this RewardController */
/* @var $model MlmReward */

$this->breadcrumbs=array(
	'Mlm Rewards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MlmReward', 'url'=>array('index')),
	array('label'=>'Manage MlmReward', 'url'=>array('admin')),
);
?>

<?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Buat Reward ', 'hideOnEmpty' => TRUE)); ?> 
<div class="alert">
    <strong>Bonus yang bertipe cash akan mendapatkan bonus nominal setiap bulannya dan bisa mendapat banyak reward dalam satu sesi(setahun bisa 2 reward atau lebih)</strong>
</div>
<h4>Create MlmReward</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->endWidget();?>