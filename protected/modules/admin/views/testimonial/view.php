<?php
/* @var $this Site_testimonialController */
/* @var $model SiteTestimonial */

$this->breadcrumbs=array(
	'Daftar Testimonials'=>array('list'),
	$model->testimonial_id,
);

$this->menu=array(
	array('label'=>'Daftar Testimonial', 'url'=>array('list')),
	array('label'=>'Buat Testimonial', 'url'=>array('create')),
	array('label'=>'Update Testimonial', 'url'=>array('update', 'id'=>$model->testimonial_id)),
	array('label'=>'Hapus Testimonial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->testimonial_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Detail Testimonial #<?php echo $model->testimonial_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            
		'testimonial_name',
		'testimonial_content',
                array(
                    'name'=>'testimonial_is_active',
                    'value'=>($model->testimonial_is_active==1)?'Ditampilkan':'Disembunyikan',
                ),
                array(
                    'name'=>'testimonial_date',
                    'value'=>Yii::app()->dateFormatter->formatDateTime($model->testimonial_date,'medium',''),
                ),
                array(
                    'name'=>'testimonial_datetime',
                    'value'=>Yii::app()->dateFormatter->formatDateTime($model->testimonial_datetime,'medium'),
                ),
            
	),
)); ?>
