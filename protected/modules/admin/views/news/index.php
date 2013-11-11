<?php
$this->breadcrumbs = array(
    'Content',
    'News' => array('list'),
    'Index',
);
$this->menu = array();

//action create
if($this->action_create) {
    array_push($this->menu, array('label' => 'Create News', 'url' => array('create')));
}

//action list
array_push($this->menu, array('label' => 'List of News', 'url' => array('list')));
?>

<div class="flat_area grid_16">
    <h2>Index of News</h2>
</div>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'pager' => array(
        'cssFile' => Yii::app()->params['backendUrl'] . '/css/style-pager.css',
        'header' => '',
        'firstPageLabel' => 'First',
        'prevPageLabel' => 'Previous',
        'nextPageLabel' => 'Next',
        'lastPageLabel' => 'Last',
    ),
    'cssFile' => Yii::app()->params['backendUrl'] . '/css/style-listview.css',
    'loadingCssClass' => '',
    'itemsTagName' => 'ul',
    'itemsCssClass' => 'block content_accordion',
));
?>