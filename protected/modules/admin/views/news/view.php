<?php
$this->breadcrumbs = array(
    'Content',
    'News' => array('list'),
    'Detail Data ' . $model->news_title,
);

$this->menu = array();

//action list
array_push($this->menu, array('label' => 'List of News', 'url' => array('list')));

array_push($this->menu, array('label' => 'Create News', 'url' => array('create')));

//action update
array_push($this->menu, array('label' => 'Update News', 'url' => array('update', 'id' => $model->news_id)));


//action delete
array_push($this->menu, array('label' => 'Delete News', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->news_id), 'confirm' => 'Are you sure you want to delete this item?')));
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Generate Serial Aktivasi', 'hideOnEmpty' => TRUE));
?>
<h4>Detail News</h4>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label' => $model->getAttributeLabel('category.news_category_title'),
            'value' => $model->category->news_category_title,
        ),
        'news_title',
        'news_source',
        array(
            'label' => $model->getAttributeLabel('admin.admin_username'),
            'value' => $model->admin->admin_username,
        ),
        array(
            'label' => $model->getAttributeLabel('news_is_active'),
            'value' => $model->news_is_active == 1 ? 'Yes' : 'No',
        ),
    ),
));
$this->endWidget();
?>