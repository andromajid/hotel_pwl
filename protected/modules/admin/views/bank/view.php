<?php
/* @var $this BankController */
/* @var $model RefBank */

$this->breadcrumbs=array(
	'daftar Bank'=>array('index'),
	$model->bank_name,
);

$this->menu=array(
	array('label'=>'daftar Bank', 'url'=>array('list')),
	array('label'=>'Create bank', 'url'=>array('create')),
	array('label'=>'Update '.$model->bank_name, 'url'=>array('update', 'id'=>$model->bank_id)),
);
?>

<h1>View RefBank #<?php echo $model->bank_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'bank_id',
		'bank_name',
		array('label' => 'aktif',
                      'value' => $data->bank_is_active == '1'?'ya':'tidak'),
	),
)); ?>
