<?php
/* @var $this Hotel_bookingController */
/* @var $model HotelBooking */

$this->breadcrumbs=array(
	'Hotel Bookings'=>array('index'),
	$model->hotel_booking_id=>array('view','id'=>$model->hotel_booking_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HotelBooking', 'url'=>array('index')),
	array('label'=>'Create HotelBooking', 'url'=>array('create')),
	array('label'=>'View HotelBooking', 'url'=>array('view', 'id'=>$model->hotel_booking_id)),
	array('label'=>'Manage HotelBooking', 'url'=>array('admin')),
);
?>

<h1>Update HotelBooking <?php echo $model->hotel_booking_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>