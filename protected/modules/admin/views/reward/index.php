<?php
/* @var $this RewardController */
/* @var $model MlmReward */

$this->breadcrumbs = array(
    'Daftar Reward' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List MlmReward', 'url' => array('index')),
    array('label' => 'Create MlmReward', 'url' => array('create')),
    array('label' => 'Create MlmReward', 'url' => array('memberlist')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mlm-reward-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h4>Daftar Rewards</h4>
<?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Daftar Reward', 'hideOnEmpty' => TRUE)); ?> 
<?php
echo CHtml::form();
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'active',
    'caption' => 'aktivkan Reward',
    'htmlOptions' => array('class' => 'btn-primary', 'style' => 'margin-left:10px;margin-bottom:3px;')));
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'cancel',
    'caption' => 'nonaktifkan reward',
    'htmlOptions' => array('class' => 'btn-danger', 'style' => 'margin-left:10px;margin-bottom:3px;')));
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'mlm-reward-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('header' => CHtml::checkBox('check_all', false, array('onclick' => 'js:if($("this").attr("checked") == "checked"){$("input:checkbox").removeAttr("checked");}else{$("input:checkbox").attr("checked","checked");} return false;')), 'type' => 'raw', 'sortable' => false,
            'value' => 'CHtml::checkBox(\'aktiv[]\', false, array(\'value\' => $data->reward_id))'),
        'reward_cond_node_left',
        'reward_cond_node_right',
        'reward_bonus',
        'reward_type',
        'reward_nominal',
        array('header' => 'Active',
            'type' => 'html',
            'value' => '$data->reward_is_active == \'1\'?Chtml::tag(\'span\', array(\'class\' => \'badge badge-success\'), \'√\'):Chtml::tag(\'span\', array(\'class\' => \'badge badge-important\'), \'x\')',
            'filter' => CHtml::activeDropDownList($model, 'reward_is_active', array('' => '', '1' => 'active', '0' => 'tidak aktive')),),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}{view}',
        ),
    ),
));
echo CHtml::endForm();
$this->endWidget();
?>
