<?php
/* @var $this Site_testimonialController */
/* @var $model SiteTestimonial */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'site-testimonial-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'testimonial_name'); ?>
		<?php echo $form->textField($model,'testimonial_name',array('size'=>60,'maxlength'=>200,'class'=>'span6')); ?>
		<?php echo $form->error($model,'testimonial_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'testimonial_content'); ?>
		<?php echo $form->textArea($model,'testimonial_content',array('rows'=>6, 'cols'=>50,'class'=>'span6')); ?>
		<?php echo $form->error($model,'testimonial_content'); ?>
	</div>

	<div class="input_group">
		<?php echo $form->labelEx($model,'testimonial_is_active'); ?>
		<?php 
                $data=array(
                    '0'=>'Disembunyikan',
                    '1'=>'Ditampilkan',
                );
                echo $form->radioButtonList($model,'testimonial_is_active',$data); ?>
		<?php echo $form->error($model,'testimonial_is_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'testimonial_date'); ?>
            <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'SiteTestimonial[testimonial_date]',
                        'value' => (isset($_POST['SiteTestimonial']['testimonial_date'])?$_POST['SiteTestimonial']['testimonial_date']:$model->testimonial_date),
                        'options' => array(
                            'maxDate' => '+0', //('y' for years, 'm' for months, 'w' for weeks, 'd' for days, e.g. '+1m +1w')
                            'showAnim' => 'fold',
                            'dateFormat' => 'yy-mm-dd', // save to db format
                            'altField' => '#self_pointing_id',
                            'altFormat' => 'yy-mm-dd', // show to user format
                            'changeYear' => true,
                        ),
                        'htmlOptions' => array(
                            'style' => 'padding:3px 4px;',
                            'size' => 10,
                        ),
                    ));
                    ?>
		<?php //echo $form->textField($model,'testimonial_date'); ?>
		<?php echo $form->error($model,'testimonial_date'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->