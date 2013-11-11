<?php
/* @var $this Site_testimonialController */
/* @var $data SiteTestimonial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('testimonial_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->testimonial_id), array('view', 'id'=>$data->testimonial_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('testimonial_name')); ?>:</b>
	<?php echo CHtml::encode($data->testimonial_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('testimonial_content')); ?>:</b>
	<?php echo CHtml::encode($data->testimonial_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('testimonial_is_active')); ?>:</b>
	<?php echo CHtml::encode($data->testimonial_is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('testimonial_date')); ?>:</b>
	<?php echo CHtml::encode($data->testimonial_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('testimonial_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->testimonial_datetime); ?>
	<br />


</div>