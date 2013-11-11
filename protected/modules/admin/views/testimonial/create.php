<?php
/* @var $this Site_testimonialController */
/* @var $model SiteTestimonial */

$this->breadcrumbs=array(
	'Daftar Testimonials'=>array('index'),
	'Buat Testimonial',
);

$this->menu=array(
	array('label'=>'Daftar Testimonial', 'url'=>array('list')),
);
?>

<h1>Buat Testimonial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>