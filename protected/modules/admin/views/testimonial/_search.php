<?php
/* @var $this Site_testimonialController */
/* @var $model SiteTestimonial */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'testimonial_id'); ?>
		<?php echo $form->textField($model,'testimonial_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'testimonial_name'); ?>
		<?php echo $form->textField($model,'testimonial_name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'testimonial_content'); ?>
		<?php echo $form->textArea($model,'testimonial_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'testimonial_is_active'); ?>
		<?php echo $form->textField($model,'testimonial_is_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'testimonial_date'); ?>
		<?php echo $form->textField($model,'testimonial_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'testimonial_datetime'); ?>
		<?php echo $form->textField($model,'testimonial_datetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->