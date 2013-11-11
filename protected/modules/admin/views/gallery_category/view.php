
<?php
$this->breadcrumbs = array(
    
    'Gallery Category' => array('list'),
    'Detail Data '.$model->gallery_category_title,
);

$this->menu = array();

//action list
array_push($this->menu, array('label' => 'List of Category', 'url' => array('list')));

//action create
if($this->action_create == 1) {
    array_push($this->menu, array('label' => 'Create Category', 'url' => array('create')));
}

//action update
if($this->action_update == 1) {
    array_push($this->menu, array('label' => 'Update Category', 'url' => array('update', 'id' => $model->gallery_category_id)));
}

//action delete
if($this->action_delete == 1) {
    array_push($this->menu, array('label' => 'Delete Gallery', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->gallery_category_id), 'confirm' => 'Are you sure you want to delete this item?')));
}
?>
<div class="flat_area grid_16">
    <h2>Detail Page</h2>
</div>
<div class="box grid_16 round_all">
    <h2 class="box_head grad_colour">Data Detail</h2>
    <a href="#" class="grabber">&nbsp;</a>
    <a href="#" class="toggle">&nbsp;</a>
    <div class="toggle_container">
        <div class="block no_padding">
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    array(
                        'name' => 'gallery_category_title',
                        'value' => $model->gallery_category_title,
                    ),
                    
                    array(
                        'name' => 'gallery_category_description',
                        'type'=>'raw',
                        'value' => $model->gallery_category_description,
                    ),
                    array(
                        'label' => $model->getAttributeLabel('gallery_category_image'),
                        'type'=>'raw',
                        'value' => (trim($model->gallery_category_image)!='') ? CHtml::image(Yii::app()->baseUrl .$model->gallery_category_image, ($model->gallery_category_image!= null) ? $model->gallery_category_image : '',array('width'=>'20%')).CHtml::link(' ',Yii::app()->baseUrl.'/admin/content/gallery_category/update/id/'.$model->gallery_category_id.'/action/reset_image'):'',
                    ),
                    array(
                        'label' => $model->getAttributeLabel('gallery_category_is_active'),
                        'value' => $model->gallery_category_is_active == 1 ? 'Yes' : 'No',
                    ),
                    
                ),
                'htmlOptions' => array('class' => 'detail'),
            ));
            ?>
        </div>
    </div>
</div>