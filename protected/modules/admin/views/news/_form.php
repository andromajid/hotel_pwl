<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'site-news-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<div class="block">

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="input_group">
        <?php echo $form->labelEx($model, 'news_category_id'); ?>
        <?php echo $form->dropDownList($model, 'news_news_category_id', CHtml::listData(SiteNewsCategory::model()->findAll(), 'news_category_id', 'news_category_title'), array('prompt' => 'Please Select Category')); ?>
        <?php //echo $form->error($model, 'news_category_id'); ?>
    </div>

    <?php echo $form->labelEx($model, 'news_source'); ?>
    <?php echo $form->textField($model, 'news_source', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php //echo $form->error($model, 'news_source'); ?>

    <?php echo $form->labelEx($model, 'news_title'); ?>
    <?php echo $form->textField($model, 'news_title', array('size' => 60, 'maxlength' => 100, 'class' => 'span6')); ?>
    <?php //echo $form->error($model, 'news_title'); ?>

    <?php //echo $form->error($model, 'news_subtitle'); ?>

    <div class="input_group">
        <?php echo $form->labelEx($model, 'news_content'); ?>
        <?php
        $this->widget('ext.redactor.ImperaviRedactorWidget', array(
            // you can either use it for model attribute
            'model' => $model,
            'elfinder' => TRUE,
            'attribute' => 'news_content',
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
//        $this->widget('ext.redactor.ImperaviRedactorWidget', array(
//            // you can either use it for model attribute
//            'model' => $model,
//            'elfinder' => TRUE,
//            'attribute' => 'news_content',
//            'options' => array('imageUpload' => $this->createUrl('upload')),
//        ));
        ?>
        <?php //echo $form->error($model, 'news_content'); ?>
    </div>

    <div class="input_group" id="videoForm" style="<?php echo ($model->news_news_category_id==7)?'':'display: none;';?>">
        <?php 
        
        echo $form->labelEx($model, 'news_video_url'); ?> <i>Copy</i> alamat video dari Youtube.
        Contoh: <i style="color:blue;">http://www.youtube.com/watch?v=N-MgRkSh5Xk</i> <a href="http://www.youtube.com/watch?v=N-MgRkSh5Xk" target="_blank" class=" icon-share-alt"></a><br />
        <?php
        echo $form->textField($model,'news_video_url',array(
            'placeholder'=>'http://www.youtube.com/embed/N-MgRkSh5Xk',
            'class'=>'span6'
        ));
        ?>
        <?php //echo $form->error($model, 'news_content'); ?>
    </div>
    
    <div class="input_group">
        <?php echo $form->labelEx($model, 'news_image'); ?>
        <?php
        
        if (!$model->isNewRecord && $model->news_image != null) {
            echo '<div>' . CHtml::image(Yii::app()->params['config']['dir']['news'] . $model->news_image, (($model->news_image != null) ? $model->news_title : ''), array('width' => 100)) . '</div>';
        }
        ?>
        <?php echo CHtml::activeFileField($model, 'news_image'); ?>
        <?php //echo $form->error($model, 'news_image'); ?>
    </div>

    <?php
    $this->widget('zii.widgets.jui.CJuiButton', array(
        'name' => 'kirim',
        'caption' => $model->isNewRecord?'Create':'update',
        'htmlOptions' => array('class' => 'btn-primary')));
    ?>
</div>

<?php $this->endWidget(); ?>
<!-- form -->

<script type="text/javascript">
    var videoId=7;
    $("select[name='SiteNews[news_news_category_id]']").change(function(){
        var val=$(this).val();
        var text=$(this).text();
        
        if(val==videoId)
        {
            $("div#videoForm").slideDown('slow');
        }
        else
        {
            $("div#videoForm").slideUp('slow');

        }
    });
</script>