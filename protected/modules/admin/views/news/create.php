<?php
$this->breadcrumbs = array(
    'Content',
    'News' => array('list'),
    'Create',
);

$this->menu = array(
    array('label' => 'List of News', 'url' => array('list')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Generate Serial Aktivasi', 'hideOnEmpty' => TRUE));
?>
<h4>Create News</h4>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
<?php
$this->endWidget();
?>