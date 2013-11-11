
<div class="block">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->label($model,'gallery_title'); ?>
		<?php echo $form->textField($model,'gallery_title',array('size'=>60,'maxlength'=>100)); ?>

		<?php echo $form->label($model,'gallery_content'); ?>
		<?php echo $form->textArea($model,'gallery_content',array('rows'=>6, 'cols'=>50)); ?>

		
		<?php echo $form->label($model,'gallery_input_datetime'); ?>
		<?php echo $form->textField($model,'gallery_input_datetime'); ?>
                <div class="input_group">
                <?php echo $form->label($model,'gallery_is_active'); ?>
                <?php echo $form->radioButtonList($model, 'gallery_is_active', array('1' => 'Ya', '0' => 'Tidak'), array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;'))); ?>
                </div>
                <div class="input_group">
    		<?php echo $form->label($model,'gallery_is_top'); ?>
                <?php echo $form->radioButtonList($model, 'gallery_is_top', array('1' => 'Ya', '0' => 'Tidak'), array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;'))); ?>
                </div>    
                <button class="button_colour round_all"><img height="24" width="24" alt="Bended Arrow Right" src="<?php echo Yii::app()->params['backendUrl']; ?>/images/icons/small/white/bended_arrow_right.png"><span>Search</span></button>


    
<?php $this->endWidget(); ?>

</div><!-- search-form -->