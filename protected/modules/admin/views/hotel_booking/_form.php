<?php
/* @var $this Hotel_bookingController */
/* @var $model HotelBooking */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hotel-booking-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_boking_start_date'); ?>
		<?php echo $form->textField($model,'hotel_boking_start_date'); ?>
		<?php echo $form->error($model,'hotel_boking_start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_boking_end_date'); ?>
		<?php echo $form->textField($model,'hotel_boking_end_date'); ?>
		<?php echo $form->error($model,'hotel_boking_end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_boking_name'); ?>
		<?php echo $form->textField($model,'hotel_boking_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'hotel_boking_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_boking_phone'); ?>
		<?php echo $form->textField($model,'hotel_boking_phone',array('size'=>60,'maxlength'=>63)); ?>
		<?php echo $form->error($model,'hotel_boking_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_boking_email'); ?>
		<?php echo $form->textField($model,'hotel_boking_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'hotel_boking_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_booking_hotel_room_id'); ?>
		<?php echo $form->textField($model,'hotel_booking_hotel_room_id'); ?>
		<?php echo $form->error($model,'hotel_booking_hotel_room_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->