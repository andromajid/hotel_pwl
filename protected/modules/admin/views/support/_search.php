<?php
/* @var $this SupportController */
/* @var $model SiteSupport */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'support_id'); ?>
		<?php echo $form->textField($model,'support_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'support_name'); ?>
		<?php echo $form->textField($model,'support_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'support_nick'); ?>
		<?php echo $form->textField($model,'support_nick',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'support_phone'); ?>
		<?php echo $form->textField($model,'support_phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->