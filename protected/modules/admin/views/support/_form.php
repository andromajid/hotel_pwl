<?php
/* @var $this SupportController */
/* @var $model SiteSupport */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'site-support-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'support_name'); ?>
		<?php echo $form->textField($model,'support_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'support_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'support_nick'); ?>
		<?php echo $form->textField($model,'support_nick',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'support_nick'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'support_phone'); ?>
		<?php echo $form->textField($model,'support_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'support_phone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->