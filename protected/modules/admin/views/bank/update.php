<?php
/* @var $this BankController */
/* @var $model RefBank */

$this->breadcrumbs=array(
	'daftar Bank'=>array('link'),
	'Update '.$model->bank_name,
);

$this->menu=array(
	array('label'=>'daftar data bank', 'url'=>array('list')),
	array('label'=>'Buat Data Bank', 'url'=>array('create')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Update Data '.$model->bank_name, 'hideOnEmpty' => TRUE));
?>

<h4>Update <?php echo $model->bank_name; ?></h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 
$this->endWidget();
?>