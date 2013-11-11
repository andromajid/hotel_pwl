<?php
$this->breadcrumbs = array(
    'Gallery',
    'List',
);

$this->menu = array();

array_push($this->menu, array('label' => 'Create Gallery', 'url' => array('create')));

    


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('site-gallery-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="flat_area grid_16">
    <h2>List of Gallery</h2>
</div>
<!--<div class="box grid_16 round_all">
    <h2 class="box_head grad_colour round_all">Advanced Search</h2>
    <a href="#" class="grabber">&nbsp;</a>
    <a href="#" class="toggle toggle_closed">&nbsp;</a>
    <div class="toggle_container" style="display:none;">
        <?php
//        $this->renderPartial('_search', array(
//            'model' => $model,
//        ));
        ?>
    </div>
</div>
-->
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'site-gallery-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'gallery_gallery_category_id',
            'filter' => CHtml::listData(SiteGalleryCategory::model()->findAll(), 'gallery_category_id', 'gallery_category_title'),
            'value' => 'SiteGalleryCategory::Model()->findByPk($data->gallery_gallery_category_id)->gallery_category_title',
        ),
        array(
            'name' => 'gallery_title',
            'value' => '$data->gallery_title',
        ),
//        array(
//            'name' => 'gallery_admin_id',
//            'filter' => CHtml::listData(site_administrator::model()->findAll(), 'administrator_id', 'administrator_username'),
//            'value' => 'site_administrator::Model()->findByPk($data->gallery_admin_id)->administrator_username',
//        ),
        array(
            'name' => 'gallery_is_active',
            'type' => 'image',
            'value' => '($data->gallery_is_active == 1 ? Yii::app()->request->baseUrl . "/images/icon/b_ok.png" : Yii::app()->request->baseUrl . "/images/icon/b_notok.png")',
            'filter' => CHtml::activeDropDownList($model, 'gallery_is_active', array('' => '', '1' => 'Active', '0' => 'InActive')),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'header' => 'Action',
            'class' => 'CButtonColumn',
            'template' => '{view}{update}{delete}',
//            'buttons' => array(
//                'view' => array(
//                    'imageUrl' => Yii::app()->request->baseUrl . '/images/icon/adm_detail_navy.png',
//                ),
//                'update' => array(
//                    'imageUrl' => Yii::app()->request->baseUrl . '/images/icon/adm_edit_navy.png',
//                    'visible' => $this->action_update,
//                ),
//                'delete' => array(
//                    'imageUrl' => Yii::app()->request->baseUrl . '/images/icon/adm_delete_navy.png',
//                    'visible' => $this->action_delete,
//                ),
//            ),
        ),
    ),
    'selectableRows' => 2,
    
    'pager' => array(
       // 'cssFile' => Yii::app()->params['backendUrl'] . '/css/style-pager.css',
        'header' => '',
        'firstPageLabel' => 'First',
        'prevPageLabel' => 'Previous',
        'nextPageLabel' => 'Next',
        'lastPageLabel' => 'Last',
    ),
   // 'cssFile' => Yii::app()->params['backendUrl'] . '/css/style-gridview.css',
    'loadingCssClass' => '',
));
?>
<?php 
//$this->widget('zii.widgets.grid.CGridView', array(
//	'id'=>'site-gallery-grid',
//	'dataProvider'=>$model->search(),
//	'filter'=>$model,
//	'columns'=>array(
//		'gallery_id',
//		'gallery_gallery_category_id',
//		'gallery_admin_id',
//		'gallery_title',
//		'gallery_content',
//		'gallery_image',
//		/*
//		'gallery_is_active',
//		'gallery_input_datetime',
//		'gallery_is_top',
//		*/
//		array(
//			'class'=>'CButtonColumn',
//		),
//	),
//)); 
?>
