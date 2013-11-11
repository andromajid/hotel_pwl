<?php
$this->breadcrumbs = array(
    'Content',
    'News' => array('list'),
    'Data Update '.$model->news_title,
);

$this->menu = array();

//action create
    array_push($this->menu, array('label' => 'Create News', 'url' => array('create')));

//action view
array_push($this->menu, array('label' => 'Detail News', 'url' => array('view', 'id' => $model->news_id)));

//action list
array_push($this->menu, array('label' => 'List of News', 'url' => array('list')));
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Generate Serial Aktivasi', 'hideOnEmpty' => TRUE));
?>
    <h4>Update News</h4>

        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
<?php $this->endWidget();?>