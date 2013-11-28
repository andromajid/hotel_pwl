<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'hotel-image-grid',
    'dataProvider' => $data_provider->gridList($_GET['id']),
    //'filter' => $data_provider,
    'columns' => array(
        'hotel_room_image_id',
        array(
            'name' => 'hotel_room_image',
            'type' => 'html',
            'value' => 'CHtml::image(Yii::app()->baseUrl."/files/images/".$data->hotel_room_image, $data->hotel_room_image, array("height" => 100, "style" => "height:100px !important;"))',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("/admin/hotel_room/delete_image", array("id"=> $data->hotel_room_image_id))'
                ),
            ),
        ),
    ),
));
?>
