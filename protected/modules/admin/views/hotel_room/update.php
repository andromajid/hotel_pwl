<?php
/* @var $this Hotel_roomController */
/* @var $model HotelRoom */

$this->breadcrumbs = array(
    'Hotel Rooms' => array('index'),
    $model->hotel_room_id => array('view', 'id' => $model->hotel_room_id),
    'Update',
);

$this->menu = array(
    array('label' => 'List HotelRoom', 'url' => array('index')),
    array('label' => 'Create HotelRoom', 'url' => array('create')),
    array('label' => 'View HotelRoom', 'url' => array('view', 'id' => $model->hotel_room_id)),
    array('label' => 'Manage HotelRoom', 'url' => array('admin')),
);
?>

<h1>Update HotelRoom <?php echo $model->hotel_room_name; ?></h1>
<?php
$form = $this->beginWidget('CActiveForm', array(
'id' => 'hotel-room-form',
'enableAjaxValidation' => false,
'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>
<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => array(
        'Hotel Room' => array('content' => $this->renderPartial('_form', array('model' => $model, 'form' => $form), true), 'id' => 'tab1'),
        'Hotel Facility' => array('content' => $this->renderPartial('_multi_input', array('model' => $model), true), 'id' => 'tab2'),
    ),
    // additional javascript options for the tabs plugin
    'options' => array(
        'collapsible' => true,
    ),
));
?>

<?php $this->endWidget(); ?>