<?php
/* @var $this Site_testimonialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Site Testimonials',
);

$this->menu=array(
	array('label'=>'Create SiteTestimonial', 'url'=>array('create')),
	array('label'=>'Manage SiteTestimonial', 'url'=>array('admin')),
);
?>

<h1>Site Testimonials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
