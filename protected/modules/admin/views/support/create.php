<?php
/* @var $this SupportController */
/* @var $model SiteSupport */

$this->breadcrumbs=array(
	'daftar data support'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'daftar data support', 'url'=>array('index')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Buat Data Support', 'hideOnEmpty' => TRUE));
?>

<h4>Create SiteSupport</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 
$this->endWidget();
?>