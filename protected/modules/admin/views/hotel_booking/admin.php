<?php
/* @var $this Hotel_bookingController */
/* @var $model HotelBooking */

$this->breadcrumbs = array(
    'Hotel Bookings' => array('index'),
    'Manage',
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

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $list_data = CHtml::listData(HotelRoom::model()->findAll(), 'hotel_room_id', 'hotel_room_name');
    $list_data[''] = '';
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'hotel-booking-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => "function(){jQuery('#hotel_boking_start_date').datepicker({'showOn':'focus','dateFormat':'yy-mm-dd','showOtherMonths':true,'selectOtherMonths':true,'changeMonth':true,'changeYear':true,'showButtonPanel':true});
jQuery('#hotel_boking_end_date').datepicker({'showOn':'focus','dateFormat':'yy-mm-dd','showOtherMonths':true,'selectOtherMonths':true,'changeMonth':true,'changeYear':true,'showButtonPanel':true});}",
    'columns' => array(
        'hotel_booking_id',
        array(
            'name' => 'hotel_boking_start_date',
            'value' => '$data->hotel_boking_start_date',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'hotel_boking_start_date',
                'htmlOptions' => array(
                    'id' => 'hotel_boking_start_date'
                ),
                'options' => array(
                    'showOn' => 'focus',
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
                    ), true),
        ),
        array(
            'name' => 'hotel_boking_end_date',
            'value' => '$data->hotel_boking_end_date',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'hotel_boking_end_date',
                'htmlOptions' => array(
                    'id' => 'hotel_boking_end_date'
                ),
                'options' => array(
                    'showOn' => 'focus',
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
                    ), true),
        ),
        'hotel_boking_name',
        'hotel_boking_phone',
        'hotel_boking_email',
        array(
            'name' => 'hotel_booking_hotel_room_id',
            'value' => '$data->HotelBookingRoom->hotel_room_name',
            'filter' => CHtml::activeDropDownList($model, 'hotel_booking_hotel_room_id', $list_data)
        ),
        array(
            'name' => 'hotel_booking_is_checked',
            'filter' => CHtml::activeDropDownList($model, 'hotel_booking_is_checked', array(
                '' => '',
                0 => 'not checked',
                1 => 'Checked'
            )),
            'value' => '$data->hotel_booking_is_checked == 0?"unchecked":"Checked"'
        ),
         array(
             'class' =>'CButtonColumn',
             'template' => '{view}'
         ),
    ),
));
?>
