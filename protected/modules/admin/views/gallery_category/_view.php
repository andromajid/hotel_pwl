<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gallery_category_id), array('view', 'id'=>$data->gallery_category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_category_title')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_category_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_category_description')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_category_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_category_is_active')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_category_is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_category_image')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_category_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_category_is_delete')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_category_is_delete); ?>
	<br />


</div>