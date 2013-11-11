<?php
/* @var $this Site_testimonialController */
/* @var $model SiteTestimonial */

$this->breadcrumbs=array(
    
	'Daftar Testimonial',
);

$this->menu=array(
	array('label'=>'Daftar Testimonial', 'url'=>array('list')),
	array('label'=>'Buat Testimonial', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('site-testimonial-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Testimonials</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'site-testimonial-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
             array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
		'testimonial_name',
             array(
            'name' => 'testimonial_content',
            'value' => '(strlen($data->testimonial_content)>200)?substr($data->testimonial_content,0,200)."...":$data->testimonial_content',
                 
        ),
            
            array(
                'name'=>'testimonial_is_active',
                'filter'=>array(1=>'Ditampilkan',0=>'Disembunyikan'),
                'value'=>'($data->testimonial_is_active==1)?"Ditampilkan":"Disembunyikan"',
            ),
		'testimonial_date',
		'testimonial_datetime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
