<div class="block">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'site-gallery-category-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
            'enctype'=>'multipart/form-data',
        ),
)); ?>

	<div class="alert alert_grey">
        <img height="24" width="24" src="<?php echo Yii::app()->params['backendUrl']; ?>/images/icons/small/grey/alert_2.png" />
        Fields with <span class="required"><strong>*</strong></span> are required.
    </div>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gallery_category_title'); ?>
		<?php echo $form->textField($model,'gallery_category_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php //echo $form->error($model,'gallery_category_title'); ?>
	</div>

        <div class="input_group">
                <?php echo $form->labelEx($model, 'gallery_category_description'); ?>
                <?php
                $this->widget('application.extensions.ckeditor.CKEditor', array(
                    "model" => $model,
                    "attribute" => 'gallery_category_description',
                    "width" => '100%',
                    "toolbar" => "Basic",
                        )
                );
                ?>
                <?php //echo $form->error($model, 'gallery_category_description'); ?>
        </div>
    
        <div class="input_group">
                <?php echo $form->labelEx($model, 'gallery_category_image'); ?>
                <?php echo (trim($model->gallery_category_image)!='') ? CHtml::image(Yii::app()->baseUrl .$model->gallery_category_image, ($model->gallery_category_image!= null) ? $model->gallery_category_image : '',array('width'=>'20%')).CHtml::link(' ',Yii::app()->baseUrl.'/admin/content/gallery_category/update/id/'.$model->gallery_category_id.'/action/reset_image'):''; 
                        ?>

                        <br />
                        <?php echo $form->fileField($model,'gallery_category_image',array('size'=>60,'maxlength'=>100));

                            echo CHtml::hiddenField('gallery_category_image_old',$model->gallery_category_image);
                        ?>
                <?php //echo $form->error($model, 'news_image'); ?>
                </div>
        
    
        <div class="input_group">
            <?php echo $form->labelEx($model, 'gallery_category_is_active'); ?>
            <?php echo $form->radioButtonList($model, 'gallery_category_is_active', array('1' => 'Ya', '0' => 'Tidak'), array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;'))); ?>
            <?php //echo $form->error($model,'gallery_category_is_active'); ?>
        </div>

	 <button class="button_colour round_all"><img height="24" width="24" alt="Bended Arrow Right" src="<?php echo Yii::app()->params['backendUrl']; ?>/images/icons/small/white/bended_arrow_right.png" /><span><?php echo ($model->isNewRecord) ? 'Create' : 'Save'; ?></span></button>
    

<?php $this->endWidget(); ?>

</div><!-- form -->