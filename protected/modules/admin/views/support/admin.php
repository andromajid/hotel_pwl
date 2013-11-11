<?php
/* @var $this SupportController */
/* @var $model SiteSupport */

$this->breadcrumbs=array(
	'Site Supports'
);

$this->menu=array(
	array('label'=>'Buat Support', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('site-support-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>data Supports</h1>
<?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Daftar Bank', 'hideOnEmpty' => TRUE)); 

echo CHtml::form();
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'active',
    'caption' => 'aktifkan',
    'htmlOptions' => array('class' => 'btn-primary', 'style' => 'margin-left:10px;margin-bottom:3px;')));
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'cancel',
    'caption' => 'disable',
    'htmlOptions' => array('class' => 'btn-danger', 'style' => 'margin-left:10px;margin-bottom:3px;')));
?> 

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'site-support-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            array('name' => 'support_id',
                      'htmlOptions' => array('style' => 'width:10px;')),
		'support_name',
		'support_nick',
		'support_phone',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
echo CHtml::endForm();
$this->endWidget();
?>
