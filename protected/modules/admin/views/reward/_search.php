<?php
/* @var $this RewardController */
/* @var $model MlmReward */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'reward_id'); ?>
		<?php echo $form->textField($model,'reward_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reward_cond_node_left'); ?>
		<?php echo $form->textField($model,'reward_cond_node_left'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reward_cond_node_right'); ?>
		<?php echo $form->textField($model,'reward_cond_node_right'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reward_bonus'); ?>
		<?php echo $form->textField($model,'reward_bonus',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reward_type'); ?>
		<?php echo $form->textField($model,'reward_type',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reward_nominal'); ?>
		<?php echo $form->textField($model,'reward_nominal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reward_is_active'); ?>
		<?php echo $form->textField($model,'reward_is_active',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->