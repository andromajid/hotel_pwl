<?php
/* @var $this Mlm_memberController */
/* @var $data mlm_member */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_network_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->member_network_id), array('view', 'id'=>$data->member_network_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_name')); ?>:</b>
	<?php echo CHtml::encode($data->member_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_nickname')); ?>:</b>
	<?php echo CHtml::encode($data->member_nickname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_email')); ?>:</b>
	<?php echo CHtml::encode($data->member_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_sex')); ?>:</b>
	<?php echo CHtml::encode($data->member_sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_address')); ?>:</b>
	<?php echo CHtml::encode($data->member_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_city_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_city_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('member_state_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_country_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_zipcode')); ?>:</b>
	<?php echo CHtml::encode($data->member_zipcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_birth_place')); ?>:</b>
	<?php echo CHtml::encode($data->member_birth_place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_birth_date')); ?>:</b>
	<?php echo CHtml::encode($data->member_birth_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_identity_type')); ?>:</b>
	<?php echo CHtml::encode($data->member_identity_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_identity_no')); ?>:</b>
	<?php echo CHtml::encode($data->member_identity_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_phone')); ?>:</b>
	<?php echo CHtml::encode($data->member_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_fax')); ?>:</b>
	<?php echo CHtml::encode($data->member_fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_mobilephone')); ?>:</b>
	<?php echo CHtml::encode($data->member_mobilephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_image')); ?>:</b>
	<?php echo CHtml::encode($data->member_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_join_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->member_join_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_devisor_name')); ?>:</b>
	<?php echo CHtml::encode($data->member_devisor_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_devisor_relationship')); ?>:</b>
	<?php echo CHtml::encode($data->member_devisor_relationship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_devisor_phone')); ?>:</b>
	<?php echo CHtml::encode($data->member_devisor_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_bank_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_bank_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_bank_city')); ?>:</b>
	<?php echo CHtml::encode($data->member_bank_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_bank_branch')); ?>:</b>
	<?php echo CHtml::encode($data->member_bank_branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_bank_account_name')); ?>:</b>
	<?php echo CHtml::encode($data->member_bank_account_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_bank_account_no')); ?>:</b>
	<?php echo CHtml::encode($data->member_bank_account_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_tax_account_no')); ?>:</b>
	<?php echo CHtml::encode($data->member_tax_account_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_serial_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_serial_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_serial_pin')); ?>:</b>
	<?php echo CHtml::encode($data->member_serial_pin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_register_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_register_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_last_update')); ?>:</b>
	<?php echo CHtml::encode($data->member_last_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_last_login')); ?>:</b>
	<?php echo CHtml::encode($data->member_last_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_is_updated_by_member')); ?>:</b>
	<?php echo CHtml::encode($data->member_is_updated_by_member); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_is_updated_by_admin')); ?>:</b>
	<?php echo CHtml::encode($data->member_is_updated_by_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_is_suspended')); ?>:</b>
	<?php echo CHtml::encode($data->member_is_suspended); ?>
	<br />

	*/ ?>

</div>