<?php
/* @var $this Hotel_roomController */
/* @var $data HotelRoom */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_room_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->hotel_room_id), array('view', 'id'=>$data->hotel_room_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_room_description')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_room_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_room_rate')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_room_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_room_facility')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_room_facility); ?>
	<br />


</div>