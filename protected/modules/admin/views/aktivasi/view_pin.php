<?php
/* @var $this AktivasiController */
/* @var $model MlmSerial */

$this->breadcrumbs=array(
	'Serial Aktivasi'=> array('list'),
	$model->serial_id,
);

$this->menu=array(
	array('label'=>'Serial Aktivasi', 'url'=>array('list')),
        array('label' => 'Daftar file aktivasi', 'url' => array('file_list')),
);
?>

<h1>View Pin MlmSerial #<?php echo $model->serial_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'serial_id',
		'serial_pin',
		array('label' => 'user',
                      'value' => $model->network->network_mid),
		'serial_create_datetime',
		'serial_active_datetime',
		'serial_use_datetime',
		array('name' => 'serial_is_active',
                    'type' => 'html',
                      'value' => $model->serial_is_active == '1'?CHtml::tag('span', array('class' => 'badge badge-success'), '√'):CHtml::tag('span', array('class' => 'badge badge-important'), 'x')),
		array('name' => 'serial_is_used',
                    'type' => 'html',
                      'value' => $model->serial_is_used == '1'?CHtml::tag('span', array('class' => 'badge badge-success'), '√'):CHtml::tag('span', array('class' => 'badge badge-important'), 'x')),
	),
)); ?>
