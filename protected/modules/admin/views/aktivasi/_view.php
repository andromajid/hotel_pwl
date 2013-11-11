<?php
/* @var $this AktivasiController */
/* @var $data MlmSerial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->serial_id), array('view', 'id'=>$data->serial_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_mid')); ?>:</b>
	<?php echo CHtml::encode($data->serial_mid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_pin')); ?>:</b>
	<?php echo CHtml::encode($data->serial_pin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_user_network_id')); ?>:</b>
	<?php echo CHtml::encode($data->serial_user_network_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_buyer_network_id')); ?>:</b>
	<?php echo CHtml::encode($data->serial_buyer_network_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_create_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->serial_create_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_active_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->serial_active_datetime); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_use_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->serial_use_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_buy_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->serial_buy_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_active_by_admin_id')); ?>:</b>
	<?php echo CHtml::encode($data->serial_active_by_admin_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_is_active')); ?>:</b>
	<?php echo CHtml::encode($data->serial_is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_is_used')); ?>:</b>
	<?php echo CHtml::encode($data->serial_is_used); ?>
	<br />

	*/ ?>

</div>