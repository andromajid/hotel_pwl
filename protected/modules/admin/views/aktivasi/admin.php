<?php
/* @var $this AktivasiController */
/* @var $model MlmSerial */

$this->breadcrumbs = array(
    'Serial Aktivasi' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'generate Serial Aktivasi', 'url' => array('generate')),
    array('label' => 'daftar file excel', 'url' => array('file_list')),
    array('label' => 'Cari Pin Aktivasi', 'url' => array('search_serial_pin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mlm-serial-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Generate Serial Aktivasi', 'hideOnEmpty' => TRUE));
?>

<h4>Manage serial aktivasi</h4>

<?php
echo CHtml::form();
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'active',
    'caption' => 'aktifkan',
    'htmlOptions' => array('class' => 'btn-primary', 'style' => 'margin-left:10px;margin-bottom:3px;')));
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'cancel',
    'caption' => 'batalkan kartu aktif',
    'htmlOptions' => array('class' => 'btn-danger', 'style' => 'margin-left:10px;margin-bottom:3px;')));
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'mlm-serial-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'ajaxUpdate' => FALSE,
    'columns' => array(
        array('header' => CHtml::checkBox('check_all', false, array('onclick' => 'js:if($("this").attr("checked") == "checked"){$("input:checkbox").removeAttr("checked");}else{$("input:checkbox").attr("checked","checked");} return false;')), 'type' => 'raw', 'sortable' => false,
            'value' => 'CHtml::checkBox(\'aktiv[]\', false, array(\'value\' => $data->serial_id))'),
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        'serial_id',
        array('name' => 'network_mid',
            'value' => 'isset($data->network->network_mid)?$data->network->network_mid:""'),
        'serial_create_datetime',
        array(
            'name' => 'serial_is_active',
            'type' => 'raw',
            'value' => '$data->serial_is_active == \'1\'?Chtml::tag(\'span\', array(\'class\' => \'badge badge-success\'), \'√\'):Chtml::tag(\'span\', array(\'class\' => \'badge badge-important\'), \'x\')',
            'filter' => CHtml::activeDropDownList($model, 'serial_is_active', array('' => '', '1' => 'Active', '0' => 'InActive')),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'serial_is_used',
            'type' => 'raw',
            'value' => '$data->serial_is_used == \'1\'?Chtml::tag(\'span\', array(\'class\' => \'badge badge-success\'), \'√\'):Chtml::tag(\'span\', array(\'class\' => \'badge badge-important\'), \'x\')',
            'filter' => CHtml::activeDropDownList($model, 'serial_is_used', array('' => '', '1' => 'Used', '0' => 'UnUsed')),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        /*
          'serial_active_datetime',
          'serial_use_datetime',
          'serial_buy_datetime',
          'serial_active_by_admin_id',
          'serial_is_active',
          'serial_is_used',
         */
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}'
        ),
    ),
));
echo CHtml::endForm();
$this->endWidget();
?>
