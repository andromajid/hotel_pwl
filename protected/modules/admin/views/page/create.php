<?php

$this->breadcrumbs = array(
    'Content',
    'Page' => array('list'),
    'Create',
);

$this->menu = array(
    array('label' => 'List of Page', 'url' => array('list')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Buat Halaman', 'hideOnEmpty' => TRUE));
?>

<?php

echo $this->renderPartial('_form', array('model' => $model));
$this->endWidget();
?>
