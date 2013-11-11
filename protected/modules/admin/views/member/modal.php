<?php

//masukkan ke output behavior
ob_start();
echo '<div cellspacing="0" cellpadding="0" id="mlm-member-grid" class="grid-view">';
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
      //  'member_network_id',
        array(
            'label'=>'Total Kiri',
            'value'=>function_lib::countNodeMember($model->member_network_id,'L'),
        ),
        array(
            'label'=>'Total Kanan',
            'value'=>function_lib::countNodeMember($model->member_network_id,'R'),
        ),
        'member_name',
        'member_nickname',
        'member_email',
        'member_sex',
        'member_address',
        'member_city_id',
        'member_state_id',
        'member_country_id',
        'member_zipcode',
        'member_birth_place',
        'member_birth_date',
        'member_identity_type',
        'member_identity_no',
        'member_phone',
        'member_fax',
        'member_mobilephone',
        'member_image',
        'member_join_datetime',
        'member_devisor_name',
        'member_devisor_relationship',
        'member_devisor_phone',
        'member_bank_id',
        'member_bank_city',
        'member_bank_branch',
        'member_bank_account_name',
        'member_bank_account_no',
        'member_tax_account_no',
        'member_serial_id',
        'member_serial_pin',
        'member_register_id',
        'member_last_update',
        'member_last_login',
      //  'member_is_updated_by_member',
       // 'member_is_updated_by_admin',
        'member_is_suspended',
    ),
));
echo '</div>';
$view = ob_get_contents();
ob_end_clean();
?>
<div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#pane1" data-toggle="tab">Data Member</a></li>
        </ul>
        <div class="tab-content">
            <div id="pane1" class="tab-pane active">
                <h4>Data Member</h4>
                <?php echo $view;?>
            </div>
        </div><!-- /.tab-content -->
    </div><!-- /.tabbable -->
