<?php
/* @var $this BankController */
/* @var $model RefBank */

$this->breadcrumbs=array(
	'Ref Banks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'data Bank', 'url'=>array('list')),
	array('label'=>'Buat Data Bank', 'url'=>array('create')),
);
?>

<h4>Daftar Bank</h4>
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
	'id'=>'ref-bank-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            array('header' => CHtml::checkBox('check_all', false, array('onclick' => 'js:if($("this").attr("checked") == "checked"){$("input:checkbox").removeAttr("checked");}else{$("input:checkbox").attr("checked","checked");} return false;')), 'type' => 'raw', 'sortable' => false,
            'value' => 'CHtml::checkBox(\'aktiv[]\', false, array(\'value\' => $data->bank_id))'),
		array('name' => 'bank_id',
                      'htmlOptions' => array('style' => 'width:10px;')),
		'bank_name',
		        array('header' => 'active?',
            'type' => 'html',
            'value' => '$data->bank_is_active == \'1\'?Chtml::tag(\'span\', array(\'class\' => \'badge badge-success\'), \'√\'):Chtml::tag(\'span\', array(\'class\' => \'badge badge-important\'), \'x\')',
            'filter' => CHtml::activeDropDownList($model, 'bank_is_active', array('' => '', '1' => 'active', '0' => 'tidak aktive')),),
		array(
			'class'=>'CButtonColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => array('delete' => array( 'options' => array('class' => ' icon-minus-sign'),
                                                          'label' => 'disable/enable',
                                                          'imageUrl' => Yii::app()->theme->baseUrl . '/img/glyphicons-halflings.png')),
		),
	),
)); 
echo CHtml::endForm();
$this->endWidget();
?>
