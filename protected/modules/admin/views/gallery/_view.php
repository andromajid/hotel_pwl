<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gallery_id), array('view', 'id'=>$data->gallery_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_gallery_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_gallery_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_admin_id')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_admin_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_title')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_content')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_image')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_is_active')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_is_active); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_input_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_input_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_is_top')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_is_top); ?>
	<br />

	*/ ?>

</div>