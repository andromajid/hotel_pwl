<?php
/* @var $this Hotel_roomController */
/* @var $model HotelRoom */
/* @var $form CActiveForm */
?>

<div class="block">



    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php
    if ($model->hasErrors()) {
        echo '<div class="alert alert-danger">' . $form->errorSummary($model) . '</div>';
    }
    ?>

    <?php echo $form->labelEx($model, 'hotel_room_name'); ?>
    <?php echo $form->textField($model, 'hotel_room_name', array('class' => 'span6')); ?>

    <?php echo $form->labelEx($model, 'hotel_room_rate'); ?>
    <?php echo $form->textField($model, 'hotel_room_rate', array('class' => 'span6')); ?>

    <div class="input_group">
        <?php echo $form->labelEx($model, 'hotel_room_description'); ?>
        <?php
        $this->widget('ext.redactor.ImperaviRedactorWidget', array(
            // you can either use it for model attribute
            'model' => $model,
            'elfinder' => TRUE,
            'attribute' => 'hotel_room_description',
            'options' => array('imageUpload' => $this->createUrl('upload')),
            'plugins' => array(
                'fullscreen' => array(
                    'js' => array('fullscreen.js',),
                ),
                'clips' => array(
                    // You can set base path to assets
                    'basePath' => 'application.components.imperavi.my_plugin',
                    // or url, basePath will be ignored
                    'baseUrl' => '/js/my_plugin',
                    'css' => array('clips.css',),
                    'js' => array('clips.js',),
                    // add depends packages
                    'depends' => array('imperavi-redactor',),
                ),
            ),
        ));
        ?>
    </div>

    <?php echo CHtml::label('hotel_room_image', 'hotel_room_image'); ?>
    <?php echo CHtml::fileField('hotel_room_image[]', '', array('multiple' => 'multiple', 'accept' => 'image/*')); ?>
    <br />
    <?php
    $this->widget('zii.widgets.jui.CJuiButton', array(
        'name' => 'kirim',
        'caption' => $model->isNewRecord ? 'Create' : 'update',
        'htmlOptions' => array('class' => 'btn btn-primary')));
    ?>


</div><!-- form -->