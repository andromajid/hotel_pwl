

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'site-gallery-form',
	'enableAjaxValidation'=>false,
         'htmlOptions'=>array(
            'enctype'=>'multipart/form-data',
        ),
)); ?>

<div class="block">

    

	<?php 
        $info_category=(!$count_category)?'<a href="'.Yii::app()->baseUrl.'/admin/content/gallery_category/create" target="_blank">Buat Kategori</a> - <a href="#" id="refresh">Refresh</a>':'';
        //$info_category=(!$count_category)?'<a href="'.Yii::app()->baseUrl.'/admin/content/gallery_category/create" target="_blank">Buat Kategori</a> - <a href="#" id="refresh">Refresh</a>':'';
        echo $form->errorSummary($model); ?>

	
                
                <div class="input_group" id="default_category">
                    <?php echo $form->labelEx($model, 'gallery_gallery_category_id'); ?>
                    <?php echo $form->dropDownList($model, 'gallery_gallery_category_id', CHtml::listData(SiteGalleryCategory::model()->findAll(), 'gallery_category_id', 'gallery_category_title'), array('prompt' => 'Please Select Category')).$info_category; ?>
                    <?php //echo $form->error($model, 'news_category_id'); ?>
                </div>
    
                <div class="input_group" id="results">
                    
                </div>
    
		<?php echo $form->labelEx($model,'gallery_title'); ?>
		<?php echo $form->textField($model,'gallery_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php //echo $form->error($model,'gallery_title'); ?>
        
                <div class="input_group">
                <?php echo $form->labelEx($model, 'gallery_content'); ?>
                <?php
//                $this->widget('application.extensions.ckeditor.CKEditor', array(
//                    "model" => $model,
//                    "attribute" => 'gallery_content',
//                    "width" => '100%',
//                    "toolbar" => "Basic",
//                        )
//                );
                ?>
                     <?php
//        $this->widget('ext.redactor.ImperaviRedactorWidget', array(
//            // you can either use it for model attribute
//            'model' => $model,
//            'elfinder' => TRUE,
//            'attribute' => 'gallery_content',
//            'options' => array('imageUpload' => $this->createUrl('upload')),
//            'assetsUrl'=>YiiBase::getPathOfAlias('webroot.').'/files/images/',
//        ));
       $this->widget('ext.redactor.ImperaviRedactorWidget', array(
            // you can either use it for model attribute
            'model' => $model,
            'elfinder' => TRUE,
            'attribute' => 'gallery_content',
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
                <?php //echo $form->error($model, 'news_content'); ?>
                </div>
        
                <div class="input_group">
                <?php echo $form->labelEx($model, 'gallery_image'); ?>
                <?php echo (trim($model->gallery_image)!='') ? CHtml::image(Yii::app()->baseUrl .$model->gallery_image, ($model->gallery_image!= null) ? $model->gallery_image : '',array('width'=>'20%')).CHtml::link(' ',Yii::app()->baseUrl.'/admin/content/gallery/update/id/'.$model->gallery_id.'/action/reset_image'):''; 
                        ?>

                        <br />
                        <?php echo $form->fileField($model,'gallery_image',array('size'=>60,'maxlength'=>100));

                            echo CHtml::hiddenField('gallery_image_old',$model->gallery_image);
                        ?>
                <?php //echo $form->error($model, 'news_image'); ?>
                </div>
                <?php echo $form->labelEx($model,'gallery_url'); ?><small>Jika ingin mengarahkan langsung ke halaman lain.</small>
		<?php echo $form->textField($model,'gallery_url',array('size'=>100,'maxlength'=>200,'placeholder'=>'Eq. http://inolabs.net/')); ?>
                <div class="input_group">
                <?php echo $form->labelEx($model, 'gallery_is_active'); ?>
                <?php echo $form->radioButtonList($model, 'gallery_is_active', array('1' => 'Ya', '0' => 'Tidak'), array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;'))); ?>
                <?php //echo $form->error($model,'gallery_is_active'); ?>
                </div>
        	
                <div class="input_group">
                <?php //echo $form->labelEx($model, 'gallery_is_top'); ?>
                <?php //echo $form->radioButtonList($model, 'gallery_is_top', array('1' => 'Ya', '0' => 'Tidak'), array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;'))); ?>
                <?php //echo $form->error($model,'gallery_is_top'); ?>
                </div>
        	<br />
        	<br />

                <?php
    $this->widget('zii.widgets.jui.CJuiButton', array(
        'name' => 'kirim',
        'caption' => $model->isNewRecord?'Create':'update',
        'htmlOptions' => array('class' => 'btn-primary')));
    ?>
	</div>

<?php $this->endWidget(); ?>
<!-- form -->

<script>
    $("#refresh").click(function(e){
       // e.preventDefault();
        var default_content=$("#default_category");
        var content=$("#results");
        $.ajax({
            beforeSend:function(){
                default_content.fadeOut(3000);
            },
            data:{refresh:1},
            url:'<?php echo Yii::app()->baseUrl.'/admin/content/gallery/index';?>',
            type:'get',
            success:function(results){
                content.html(results);
            }
        });
    });
    </script>