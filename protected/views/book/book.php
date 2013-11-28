<?php
Yii::app()->clientScript->registerScript('checkRoom', "
jQuery('#checkRoom').bind('click', function(){
    $.ajax({
        type: 'GET',
        url: '".$this->createUrl('/room/show')."',
        data : {
            ajax : 'yes',
            id : jQuery('#HotelBooking_hotel_booking_hotel_room_id').find(':selected').val()
        },
        success: function (msg) {
            jQuery('.modal-body').html(msg);
            jQuery('#myModal').modal({
                show : true
            });
        }
    });
    
});
");
?>
<div class="col-sm-8">
    <h3>Book Our Room</h3>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'hotel-booking-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="form-group col-lg-8">
            <?php echo $form->labelEx($model, 'hotel_boking_name'); ?>
            <?php echo $form->textField($model, 'hotel_boking_name', array('class' => 'form-control')); ?>
        </div>
        <div class="form-group col-lg-8">
            <?php echo $form->labelEx($model, 'hotel_boking_start_date'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'hotel_boking_start_date',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => "yy-mm-dd",
                    'changeMonth' => true,
                    'minDate' => 'js: new Date()'
                ),
                'htmlOptions' => array(
                    'class' => 'form-control',
                ),
            ));
            ?>
        </div>
        <div class="form-group col-lg-8">
            <?php echo $form->labelEx($model, 'hotel_boking_end_date'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'hotel_boking_end_date',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => "yy-mm-dd",
                    'changeMonth' => true,
                    'minDate' => 'js: new Date()',
                ),
                'htmlOptions' => array(
                    'class' => 'form-control',
                ),
            ));
            ?>
        </div>
        <div class="form-group col-lg-8">
            <?php echo $form->labelEx($model, 'hotel_boking_phone'); ?>
            <?php echo $form->textField($model, 'hotel_boking_phone', array('class' => 'form-control')); ?>
        </div>
        <div class="form-group col-lg-8">
            <?php echo $form->labelEx($model, 'hotel_boking_email'); ?>
            <?php echo $form->textField($model, 'hotel_boking_email', array('class' => 'form-control')); ?>
        </div>
        <div class="form-group col-lg-6">
            <?php echo $form->labelEx($model, 'hotel_booking_hotel_room_id'); ?>
            <?php
            echo CHtml::activeDropDownList($model, 'hotel_booking_hotel_room_id', CHtml::listData(HotelRoom::model()->findAll(), 'hotel_room_id', 'hotel_room_name'), array('class' => 'form-control'));
            ?>
        </div>
        <div class="form-group col-lg-2">
            <span id="checkRoom" class="btn btn-danger" style="margin-top: 1.7em;">Check Room</span>
        </div>
        <div class="form-group col-lg-8">
            <?php echo $form->labelEx($model, 'hotel_booking_notes'); ?>
            <?php echo $form->textArea($model, 'hotel_booking_notes', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
        </div>
        <div class="form-group col-lg-8">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    <?php $this->endWidget(); ?>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->