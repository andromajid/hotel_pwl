<?php
/* @var $this SupportController */
/* @var $data SiteSupport */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('support_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->support_id), array('view', 'id'=>$data->support_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('support_name')); ?>:</b>
	<?php echo CHtml::encode($data->support_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('support_nick')); ?>:</b>
	<?php echo CHtml::encode($data->support_nick); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('support_phone')); ?>:</b>
	<?php echo CHtml::encode($data->support_phone); ?>
	<br />


</div>