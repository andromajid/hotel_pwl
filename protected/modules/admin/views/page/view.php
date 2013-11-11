<?php

$this->breadcrumbs = array(
    'Content',
    'Page' => array('list'),
    'Detail Data ' . $model->page_title,
);

$this->menu = array();

//action list
array_push($this->menu, array('label' => 'List of Page', 'url' => array('list')));

//action create
array_push($this->menu, array('label' => 'Create Page', 'url' => array('create')));

//action update
array_push($this->menu, array('label' => 'Update Page', 'url' => array('update', 'id' => $model->page_id)));

//action delete
array_push($this->menu, array('label' => 'Delete Page', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->page_id), 'confirm' => 'Are you sure you want to delete this item?')));
?>

<?php

$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Data Halaman '.$model->page_title, 'hideOnEmpty' => TRUE));

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'page_title',
        array('name' => 'page_content', 'type' => 'html'),
        array(
            'label'=>'Status',
            'value'=>($model->page_is_active==0)?'Draft':'Publish',
        ),
        array(
            'label'=>'Keterangan',
            'value'=>($model->page_is_delete==0)?'Tidak bisa dihapus':'Bisa dihapus',
        ),
        
    ),
    'htmlOptions' => array('class' => 'detail'),
));
$this->endWidget();
?>