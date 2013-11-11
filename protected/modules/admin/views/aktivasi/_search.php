<?php
/* @var $this AktivasiController */
/* @var $model MlmSerial */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'serial_id'); ?>
		<?php echo $form->textField($model,'serial_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_mid'); ?>
		<?php echo $form->textField($model,'serial_mid',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_pin'); ?>
		<?php echo $form->textField($model,'serial_pin',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_user_network_id'); ?>
		<?php echo $form->textField($model,'serial_user_network_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_buyer_network_id'); ?>
		<?php echo $form->textField($model,'serial_buyer_network_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_create_datetime'); ?>
		<?php echo $form->textField($model,'serial_create_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_active_datetime'); ?>
		<?php echo $form->textField($model,'serial_active_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_use_datetime'); ?>
		<?php echo $form->textField($model,'serial_use_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_buy_datetime'); ?>
		<?php echo $form->textField($model,'serial_buy_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_active_by_admin_id'); ?>
		<?php echo $form->textField($model,'serial_active_by_admin_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_is_active'); ?>
		<?php echo $form->textField($model,'serial_is_active',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_is_used'); ?>
		<?php echo $form->textField($model,'serial_is_used',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->