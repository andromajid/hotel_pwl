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
