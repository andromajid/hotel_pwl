<?php
/* @var $this Hotel_roomController */
/* @var $model HotelRoom */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'hotel_room_id'); ?>
		<?php echo $form->textField($model,'hotel_room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_room_description'); ?>
		<?php echo $form->textArea($model,'hotel_room_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_room_rate'); ?>
		<?php echo $form->textField($model,'hotel_room_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_room_facility'); ?>
		<?php echo $form->textArea($model,'hotel_room_facility',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->