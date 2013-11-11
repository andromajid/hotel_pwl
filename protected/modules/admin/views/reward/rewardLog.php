<?php
$this->menu = array(
    array('label' => 'List MlmReward', 'url' => array('index')),
    array('label' => 'Create MlmReward', 'url' => array('create')),
    array('label' => 'Create MlmReward', 'url' => array('memberlist')),
);
?>
<h4>Daftar Member Yang Mendapatkan reward</h4>
<?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Daftar Member Yang Mendapatkan reward', 'hideOnEmpty' => TRUE)); ?> 
<?php
echo CHtml::form();
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'active',
    'caption' => 'Setujui Member Mendapatkan Reward',
    'htmlOptions' => array('class' => 'btn-primary', 'style' => 'margin-left:10px;margin-bottom:3px;')));
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'mlm-reward-log-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('header' => CHtml::checkBox('check_all', false, array('onclick' => 'js:if($("this").attr("checked") == "checked"){$("input:checkbox").removeAttr("checked");}else{$("input:checkbox").attr("checked","checked");} return false;')), 'type' => 'raw', 'sortable' => false,
            'value' => 'CHtml::checkBox(\'aktiv[]\', false, array(\'value\' => $data->reward_log_id))'),
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array('header' => 'Member ID',
            'value' => '$data->network->network_mid'),
        array('header' => 'Member ID',
            'name' => 'network_mid',
            'value' => '$data->network->network_mid'),
        array('header' => 'Nama Member',
            'name' => 'member_name',
            'value' => '$data->member->member_name'),
        array('header' => 'Reward',
            'value' => '$data->reward->reward_bonus'),
        array('header' => 'disetujui?',
            'type' => 'html',
            'value' => '$data->reward_log_is_approve == \'1\'?Chtml::tag(\'span\', array(\'class\' => \'badge badge-success\'), \'√\'):Chtml::tag(\'span\', array(\'class\' => \'badge badge-important\'), \'x\')',
            'filter' => CHtml::activeDropDownList($model, 'reward_log_is_approve', array('' => '', '1' => 'active', '0' => 'tidak aktive')),),
        array(
            'class' => 'CButtonColumn'
        ),
    ),
));
?>
<?php
echo CHtml::endForm();
$this->endWidget(); ?>
