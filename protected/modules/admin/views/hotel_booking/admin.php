<?php
/* @var $this Hotel_bookingController */
/* @var $model HotelBooking */

$this->breadcrumbs=array(
	'Hotel Bookings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HotelBooking', 'url'=>array('index')),
	array('label'=>'Create HotelBooking', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hotel-booking-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hotel Bookings</h1>

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
	'id'=>'hotel-booking-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'hotel_booking_id',
		'hotel_boking_start_date',
		'hotel_boking_end_date',
		'hotel_boking_name',
		'hotel_boking_phone',
		'hotel_boking_email',
		/*
		'hotel_booking_hotel_room_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
