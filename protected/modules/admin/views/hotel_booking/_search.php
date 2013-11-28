<?php
/* @var $this Hotel_bookingController */
/* @var $model HotelBooking */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'hotel_booking_id'); ?>
		<?php echo $form->textField($model,'hotel_booking_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_boking_start_date'); ?>
		<?php echo $form->textField($model,'hotel_boking_start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_boking_end_date'); ?>
		<?php echo $form->textField($model,'hotel_boking_end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_boking_name'); ?>
		<?php echo $form->textField($model,'hotel_boking_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_boking_phone'); ?>
		<?php echo $form->textField($model,'hotel_boking_phone',array('size'=>60,'maxlength'=>63)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_boking_email'); ?>
		<?php echo $form->textField($model,'hotel_boking_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_booking_hotel_room_id'); ?>
		<?php echo $form->textField($model,'hotel_booking_hotel_room_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->