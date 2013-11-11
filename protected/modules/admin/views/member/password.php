<?php
$this->breadcrumbs = array(
    'Daftar Member' => array('List'),
    'update Password',
);

$this->menu = array(
    array('label' => 'daftar Member', 'url' => array('list')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Ubah Password ', 'hideOnEmpty' => TRUE));
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model_member,
    'attributes' => array(
        'member_name',
        'MlmNetwork.network_mid',
        array('label' => 'Sponsor',
            'type' => 'raw',
            'value' => dbHelper::getOne('network_mid', 'mlm_network', 'network_id=' . $model_member->MlmNetwork->network_sponsor_network_id)
        ),
        array('label' => 'Upline',
            'type' => 'raw',
            'value' => dbHelper::getOne('network_mid', 'mlm_network', 'network_id=' . $model_member->MlmNetwork->network_upline_network_id)),
        array('label' => 'Alamat',
            'type' => 'raw',
            'value' => $model_member->member_address . ' ' . dbHelper::getOne('area_name', 'ref_area', 'area_id=' . $model_member->member_city_id)),
    ),
        )
);
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'mlm-member-form',
    'enableAjaxValidation' => false,
        ));
?>
<div style="margin-top: 20px;">
    <?php echo $form->labelEx($model_password, 'password_value'); ?>
    <?php echo $form->textField($model_password, 'password_value', array('size' => 15, 'value' => '')); ?>
    <?php echo $form->error($model_password, 'password_value'); ?>
</div>
<div>
    <?php echo $form->labelEx($model_password, 'password_repeat'); ?>
    <?php echo $form->textField($model_password, 'password_repeat', array('size' => 15, 'value' => '')); ?>
    <?php echo $form->error($model_password, 'password_repeat'); ?>
</div>

<?php
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'kirim',
    'caption' => 'kirim',
    'htmlOptions' => array('class' => 'btn-primary')));
$this->endWidget();
$this->endWidget();