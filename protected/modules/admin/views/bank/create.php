<?php
/* @var $this BankController */
/* @var $model RefBank */

$this->breadcrumbs=array(
	'daftar bank'=>array('list'),
	'Create',
);

$this->menu=array(
	array('label'=>'daftar bank', 'url'=>array('list')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Buat Data Bank', 'hideOnEmpty' => TRUE));
?>

<h1>Create data bank</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->endWidget();
?>