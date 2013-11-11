<?php
/* @var $this Mlm_memberController */
/* @var $model mlm_member */

$this->breadcrumbs=array(
	'Mlm Members'=>array('index'),
	$model->member_network_id,
);

$this->menu=array(
	array('label'=>'List mlm_member', 'url'=>array('index')),
	array('label'=>'Create mlm_member', 'url'=>array('create')),
	array('label'=>'Update mlm_member', 'url'=>array('update', 'id'=>$model->member_network_id)),
	array('label'=>'Delete mlm_member', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->member_network_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage mlm_member', 'url'=>array('admin')),
);
?>

<h1>View mlm_member #<?php echo $model->member_network_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'member_network_id',
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
		'member_is_updated_by_member',
		'member_is_updated_by_admin',
		'member_is_suspended',
	),
)); ?>
