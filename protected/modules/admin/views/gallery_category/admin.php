<?php
$this->breadcrumbs = array(
    'Gallery Category',
    'List',
);

$this->menu = array();

//action create
if ($this->action_create == 1) {
    array_push($this->menu, array('label' => 'Create Category', 'url' => array('create')));
}

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
    <h2>List of Gallery Category</h2>
</div>
<?php
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'site-gallery-grid',
//    'dataProvider' => $model->search(),
//    'filter' => $model,
//    'columns' => array(
//        array(
//            'header' => 'No.',
//            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
//            'htmlOptions' => array('style' => 'text-align:center;'),
//        ),
//      
//        array(
//            'name' => 'gallery_category_title',
//            'value' => '$data->gallery_category_title',
//        ),
//        
//        array(
//            'name' => 'gallery_category_is_active',
//            'type' => 'image',
//            'value' => '($data->gallery_category_is_active == 1 ? Yii::app()->request->baseUrl . "/images/icon/b_ok.png" : Yii::app()->request->baseUrl . "/images/icon/b_notok.png")',
//            'filter' => CHtml::activeDropDownList($model, 'gallery_category_is_active', array('' => '', '1' => 'Active', '0' => 'InActive')),
//            'htmlOptions' => array('style' => 'text-align:center;'),
//        ),
//        array(
//            'header' => 'Action',
//            'class' => 'CButtonColumn',
//            'template' => '{view}{update}{delete}',
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
//        ),
//    ),
//    'selectableRows' => 2,
//    
//    'pager' => array(
//        'cssFile' => Yii::app()->params['backendUrl'] . '/css/style-pager.css',
//        'header' => '',
//        'firstPageLabel' => 'First',
//        'prevPageLabel' => 'Previous',
//        'nextPageLabel' => 'Next',
//        'lastPageLabel' => 'Last',
//    ),
//    'cssFile' => Yii::app()->params['backendUrl'] . '/css/style-gridview.css',
//    'loadingCssClass' => '',
//));
//?>