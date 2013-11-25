<div class="block">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'site-gallery-category-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    ));
    ?>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'gallery_category_title'); ?>
<?php echo $form->textField($model, 'gallery_category_title', array('size' => 60, 'maxlength' => 100)); ?>
<?php //echo $form->error($model,'gallery_category_title');  ?>
    </div>

    <div class="input_group">
        <?php echo $form->labelEx($model, 'gallery_category_is_active'); ?>
<?php echo $form->radioButtonList($model, 'gallery_category_is_active', array('1' => 'Ya', '0' => 'Tidak'), array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;'))); ?>
    <?php //echo $form->error($model,'gallery_category_is_active');  ?>
    </div>

    <?php
    $this->widget('zii.widgets.jui.CJuiButton', array(
        'name' => 'kirim',
        'caption' => $model->isNewRecord ? 'Create' : 'update',
        'htmlOptions' => array('class' => 'btn-primary')));
    ?>

<?php $this->endWidget(); ?>

</div><!-- form -->