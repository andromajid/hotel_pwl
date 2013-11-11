<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<div class="block">

    <div class="input_group">
        <?php echo $form->label($model, 'news_category_id'); ?>
        <?php echo $form->dropDownList($model, 'news_category_id', CHtml::listData(site_news_category::model()->findAll(), 'news_category_id', 'news_category_title'), array('prompt' => 'Please Select Category')); ?>
    </div>

    <?php echo $form->label($model, 'news_source'); ?>
    <?php echo $form->textField($model, 'news_source', array('size' => 50, 'maxlength' => 50)); ?>

    <?php echo $form->label($model, 'news_title'); ?>
    <?php echo $form->textField($model, 'news_title', array('size' => 60, 'maxlength' => 255)); ?>

    <?php echo $form->label($model, 'news_subtitle'); ?>
    <?php echo $form->textField($model, 'news_subtitle', array('size' => 60, 'maxlength' => 255)); ?>

    <div class="input_group">
        <?php echo $form->label($model, 'news_is_active'); ?>
        <?php echo $form->radioButtonList($model, 'news_is_active', array('1' => 'Ya', '0' => 'Tidak'), array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;'))); ?>
    </div>

    <button class="button_colour round_all"><img height="24" width="24" alt="Bended Arrow Right" src="<?php echo Yii::app()->params['backendUrl']; ?>/images/icons/small/white/bended_arrow_right.png"><span>Search</span></button>

</div>

<?php $this->endWidget(); ?>

<!-- search-form -->