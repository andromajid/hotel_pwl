<?php
$this->breadcrumbs = array(
    
    'Gallery' => array('list'),
    'Detail Data '.$model->gallery_title,
);

$this->menu = array();

//action list
array_push($this->menu, array('label' => 'List of Gallery', 'url' => array('list')));

array_push($this->menu, array('label' => 'Create Gallery', 'url' => array('create')));

    
array_push($this->menu, array('label' => 'Update Gallery', 'url' => array('update', 'id' => $model->gallery_id)));

    
//action delete

    array_push($this->menu, array('label' => 'Delete Gallery', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->gallery_id), 'confirm' => 'Are you sure you want to delete this item?')));
?>
<div class="flat_area grid_16">
    <h2>Detail Gallery</h2>
</div>

            <?php

            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    array(
                        'label' => $model->getAttributeLabel('rel_gallery_to_category.gallery_category_title'),
                        'value' => $model->rel_gallery_to_category->gallery_category_title,
                    ),
                    'gallery_title',
                    
                    array(
                        'label' => $model->getAttributeLabel('gallery_url'),
                        'type' => 'raw',
                        'value' => $model->gallery_url,
                    ),
                    array(
                        'label' => $model->getAttributeLabel('gallery_is_active'),
                        'value' => $model->gallery_is_active == 1 ? 'Yes' : 'No',
                    ),
                    array(
                    'label' => $model->getAttributeLabel('gallery_image'),
                    'type'=>'raw',
                    'value' => (trim($model->gallery_image)!='') ? CHtml::image(Yii::app()->baseUrl .$model->gallery_image, ($model->gallery_image!= null) ? $model->gallery_image : '',array('width'=>'20%')).CHtml::link(' ',Yii::app()->baseUrl.'/admin/ecommerce/product/update/id/'.$model->gallery_id.'/action/reset_image'):'',
                    ),
//                    array(
//                        'label' => $model->getAttributeLabel('gallery_is_top'),
//                        'value' => $model->gallery_is_top == 1 ? 'Yes' : 'No',
//                    ),
                ),
                'htmlOptions' => array('class' => 'detail'),
            ));

            ?>
