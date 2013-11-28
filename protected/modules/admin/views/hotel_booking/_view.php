<?php
/* @var $this Hotel_bookingController */
/* @var $data HotelBooking */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_booking_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->hotel_booking_id), array('view', 'id'=>$data->hotel_booking_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_boking_start_date')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_boking_start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_boking_end_date')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_boking_end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_boking_name')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_boking_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_boking_phone')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_boking_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_boking_email')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_boking_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_booking_hotel_room_id')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_booking_hotel_room_id); ?>
	<br />


</div>