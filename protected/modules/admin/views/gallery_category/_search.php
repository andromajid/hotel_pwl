<div class="block">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

    		<?php echo $form->label($model,'gallery_category_title'); ?>
		<?php echo $form->textField($model,'gallery_category_title',array('size'=>60,'maxlength'=>100)); ?>

		<?php echo $form->label($model,'gallery_category_description'); ?>
		<?php echo $form->textArea($model,'gallery_category_description',array('rows'=>6, 'cols'=>50)); ?>

                <div class="input_group">
                    <?php echo $form->label($model, 'gallery_category_is_active'); ?>
                    <?php echo $form->radioButtonList($model, 'gallery_category_is_active', array('1' => 'Ya', '0' => 'Tidak'), array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;'))); ?>
                </div>
                <button class="button_colour round_all"><img height="24" width="24" alt="Bended Arrow Right" src="<?php echo Yii::app()->params['backendUrl']; ?>/images/icons/small/white/bended_arrow_right.png"><span>Search</span></button>


<?php $this->endWidget(); ?>

</div><!-- search-form -->