<?php
/* @var $this Hotel_roomController */
/* @var $model HotelRoom */

$this->breadcrumbs=array(
	'Hotel Rooms'=>array('index'),
	$model->hotel_room_id,
);

$this->menu=array(
	array('label'=>'List HotelRoom', 'url'=>array('index')),
	array('label'=>'Create HotelRoom', 'url'=>array('create')),
	array('label'=>'Update HotelRoom', 'url'=>array('update', 'id'=>$model->hotel_room_id)),
	array('label'=>'Delete HotelRoom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->hotel_room_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HotelRoom', 'url'=>array('admin')),
);
?>

<h1>View HotelRoom #<?php echo $model->hotel_room_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'hotel_room_id',
		'hotel_room_description',
		'hotel_room_rate',
		'hotel_room_facility',
	),
)); ?>
