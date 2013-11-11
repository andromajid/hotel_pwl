<?php
/* @var $this BankController */
/* @var $data RefBank */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bank_id), array('view', 'id'=>$data->bank_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_name')); ?>:</b>
	<?php echo CHtml::encode($data->bank_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_adm_fee')); ?>:</b>
	<?php echo CHtml::encode($data->bank_adm_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_is_active')); ?>:</b>
	<?php echo CHtml::encode($data->bank_is_active); ?>
	<br />


</div>