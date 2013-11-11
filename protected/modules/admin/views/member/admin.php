<?php
/* @var $this MemberController */
/* @var $model MlmMember */

$this->breadcrumbs = array(
    'Mlm Members' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List MlmMember', 'url' => array('index')),
    array('label' => 'Create MlmMember', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.modalCall').live('click',function(){
        //console.log(this.text);
        var network_id = this.text;
        $.ajax({
         url : '" . Yii::app()->createUrl('admin/member/view') . "',
         type : 'GET',
         data : {'id' : network_id},
         success : function (data) {
            $('#myModal .modal-body').html(data);
             $('#myModal').modal().css({
    width: 'auto',
    'min-width': '560px',
    'margin-left': function () {
        return -($(this).width() / 2);
    }
});
         }
        });
	return false;
});
");
Yii::app()->clientScript->registerScript('ajaxupdate', "
$('#supplier-grid a.ajaxupdate').live('click', function() {
        $.fn.yiiGridView.update('supplier-grid', {
                type: 'POST',
                url: $(this).attr('href'),
                success: function() {
                        $.fn.yiiGridView.update('supplier-grid');
                }
        });
        return false;
});
");
?>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Daftar Member ', 'hideOnEmpty' => TRUE)); ?> 
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'mlm-member-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array('header' => 'Member ID',
            'name' => 'network_mid',
            'value' => '"<b>".Chtml::Link($data->MlmNetwork->network_mid, "#", array("class" => "modalCall"))."</b>"',
            'type' => 'html',),
        'member_name',
        array('header' => 'Kota',
            'value' => 'dbHelper::getOne("area_name", "ref_area", "area_id = ".$data->member_city_id)'),
        array('header' => 'Sponsor',
            'name' => 'sponsor_network_id',
            'value' => 'MlmHelper::getNetworkMid(mlmNetwork::Model()->FindByPk($data->member_network_id)->network_sponsor_network_id)'),
        'member_mobilephone',
        array('header' => 'Aktivasi ID',
            'name' => 'member_serial_id'),
        array('header' => 'Aktivasi PIN',
            'name' => 'member_serial_pin'),
        'member_join_datetime',
        array(
            'name' => 'member_is_suspended',
            'type' => 'raw',
            'value' => '$data->member_is_suspended == \'0\'?Chtml::tag(\'span\', array(\'class\' => \'badge badge-success\'), \'√\'):Chtml::tag(\'span\', array(\'class\' => \'badge badge-important\'), \'x\')',
            'filter' => CHtml::activeDropDownList($model, 'member_is_suspended', array('' => '', '0' => 'Active', '1' => 'Suspended')),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        /*
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
          'member_is_updated_by_member',
          'member_is_updated_by_admin',
          'member_is_suspended',
         */
        array(
            'class' => 'CButtonColumn',
            'template' => '{suspend}{update}{change_password}{login}',
            'buttons' => array(
                'suspend' => array(
                    'label' => 'Suspend Member',
                    'options' => array('class' => 'icon-remove',
                                       'ajax' => array('type' => 'get',
                                                        'url'=>'js:$(this).attr("href")',
                                                        'success' => 'js:function(data) { $.fn.yiiGridView.update("mlm-member-grid")}'),),
                    'url' => 'Yii::app()->getController()->createUrl("/admin/member/suspendmember/", array("id" => $data->member_network_id, "data" => $data->member_is_suspended == "0"?1:0,))',
                    'imageUrl' => Yii::app()->theme->baseUrl . '/img/glyphicons-halflings.png'
                ),
                'login' => array('label' => 'Login Member Area',
                    'options' => array('class' => 'icon-plane', 'target' => '_blank'),
                    'url' => "Yii::app()->getController()->createUrl('/admin/member/login', array('id' => \$data->member_network_id))",
                    'imageUrl' => Yii::app()->theme->baseUrl . '/img/glyphicons-halflings.png'),
                'change_password' => array('label' => 'change Password',
                    'options' => array('class' => ' icon-th'),
                    'url' => "Yii::app()->getController()->createUrl('/admin/member/password', array('id' => \$data->member_network_id))",
                    'imageUrl' => Yii::app()->theme->baseUrl . '/img/glyphicons-halflings.png'),
                ),
        ),
    ),
));
$this->endWidget();
?>
<div class="modalPlace"> 
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Modal header</h3>
        </div>
        <div class="modal-body">

        </div>
    </div>
</div>
