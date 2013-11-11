<?php
/* @var $this Site_testimonialController */
/* @var $model SiteTestimonial */

$this->breadcrumbs=array(
	'Daftar Testimonials'=>array('list'),
	$model->testimonial_id=>array('view','id'=>$model->testimonial_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Testimonial', 'url'=>array('list')),
	array('label'=>'Buat Testimonial', 'url'=>array('create')),
	array('label'=>'Detail Testimonial', 'url'=>array('view', 'id'=>$model->testimonial_id)),
);
?>

<h1>Update SiteTestimonial <?php echo $model->testimonial_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>