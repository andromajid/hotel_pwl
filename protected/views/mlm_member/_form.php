<?php
/* @var $this Mlm_memberController */
/* @var $model mlm_member */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mlm-member-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'member_network_id'); ?>
		<?php echo $form->textField($model,'member_network_id',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'member_network_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_name'); ?>
		<?php echo $form->textField($model,'member_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_nickname'); ?>
		<?php echo $form->textField($model,'member_nickname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_nickname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_email'); ?>
		<?php echo $form->textField($model,'member_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_sex'); ?>
		<?php echo $form->textField($model,'member_sex',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'member_sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_address'); ?>
		<?php echo $form->textArea($model,'member_address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'member_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_city_id'); ?>
		<?php echo $form->textField($model,'member_city_id',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'member_city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_state_id'); ?>
		<?php echo $form->textField($model,'member_state_id',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'member_state_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_country_id'); ?>
		<?php echo $form->textField($model,'member_country_id',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'member_country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_zipcode'); ?>
		<?php echo $form->textField($model,'member_zipcode',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_zipcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_birth_place'); ?>
		<?php echo $form->textField($model,'member_birth_place',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_birth_place'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_birth_date'); ?>
		<?php echo $form->textField($model,'member_birth_date'); ?>
		<?php echo $form->error($model,'member_birth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_identity_type'); ?>
		<?php echo $form->textField($model,'member_identity_type',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'member_identity_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_identity_no'); ?>
		<?php echo $form->textField($model,'member_identity_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_identity_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_phone'); ?>
		<?php echo $form->textField($model,'member_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_fax'); ?>
		<?php echo $form->textField($model,'member_fax',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_mobilephone'); ?>
		<?php echo $form->textField($model,'member_mobilephone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_mobilephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_image'); ?>
		<?php echo $form->textField($model,'member_image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_join_datetime'); ?>
		<?php echo $form->textField($model,'member_join_datetime'); ?>
		<?php echo $form->error($model,'member_join_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_devisor_name'); ?>
		<?php echo $form->textField($model,'member_devisor_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_devisor_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_devisor_relationship'); ?>
		<?php echo $form->textField($model,'member_devisor_relationship',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_devisor_relationship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_devisor_phone'); ?>
		<?php echo $form->textField($model,'member_devisor_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_devisor_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_bank_id'); ?>
		<?php echo $form->textField($model,'member_bank_id',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'member_bank_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_bank_city'); ?>
		<?php echo $form->textField($model,'member_bank_city',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_bank_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_bank_branch'); ?>
		<?php echo $form->textField($model,'member_bank_branch',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_bank_branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_bank_account_name'); ?>
		<?php echo $form->textField($model,'member_bank_account_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_bank_account_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_bank_account_no'); ?>
		<?php echo $form->textField($model,'member_bank_account_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_bank_account_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_tax_account_no'); ?>
		<?php echo $form->textField($model,'member_tax_account_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_tax_account_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_serial_id'); ?>
		<?php echo $form->textField($model,'member_serial_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_serial_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_serial_pin'); ?>
		<?php echo $form->textField($model,'member_serial_pin',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_serial_pin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_register_id'); ?>
		<?php echo $form->textField($model,'member_register_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'member_register_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_last_update'); ?>
		<?php echo $form->textField($model,'member_last_update'); ?>
		<?php echo $form->error($model,'member_last_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_last_login'); ?>
		<?php echo $form->textField($model,'member_last_login'); ?>
		<?php echo $form->error($model,'member_last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_is_updated_by_member'); ?>
		<?php echo $form->textField($model,'member_is_updated_by_member',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'member_is_updated_by_member'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_is_updated_by_admin'); ?>
		<?php echo $form->textField($model,'member_is_updated_by_admin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'member_is_updated_by_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_is_suspended'); ?>
		<?php echo $form->textField($model,'member_is_suspended',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'member_is_suspended'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->