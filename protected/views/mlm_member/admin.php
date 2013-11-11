<?php
/* @var $this Mlm_memberController */
/* @var $model mlm_member */

$this->breadcrumbs=array(
	'Mlm Members'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List mlm_member', 'url'=>array('index')),
	array('label'=>'Create mlm_member', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mlm-member-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Mlm Members</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mlm-member-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'member_network_id',
		'member_name',
		'member_nickname',
		'member_email',
		'member_sex',
		'member_address',
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
			'class'=>'CButtonColumn',
		),
	),
)); ?>
