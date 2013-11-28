<?php
/* @var $this Hotel_bookingController */
/* @var $model HotelBooking */

$this->breadcrumbs=array(
	'Hotel Bookings'=>array('index'),
	$model->hotel_booking_id,
);

$this->menu=array(
	array('label'=>'List HotelBooking', 'url'=>array('index')),
	array('label'=>'Create HotelBooking', 'url'=>array('create')),
	array('label'=>'Update HotelBooking', 'url'=>array('update', 'id'=>$model->hotel_booking_id)),
	array('label'=>'Delete HotelBooking', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->hotel_booking_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HotelBooking', 'url'=>array('admin')),
);
?>

<h1>View HotelBooking #<?php echo $model->hotel_booking_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'hotel_booking_id',
		'hotel_boking_start_date',
		'hotel_boking_end_date',
		'hotel_boking_name',
		'hotel_boking_phone',
		'hotel_boking_email',
                array(
                    'name' => 'Room',
                    'value' => $model->HotelBookingRoom->hotel_room_name
                ),
                array(
                    'value' => $model->hotel_booking_is_checked == 0?'unchecked':'checked',
                    'name' => 'hotel_booking_is_checked'
                ),
	),
)); ?>
