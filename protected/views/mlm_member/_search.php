<?php
/* @var $this Mlm_memberController */
/* @var $model mlm_member */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'member_network_id'); ?>
		<?php echo $form->textField($model,'member_network_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_name'); ?>
		<?php echo $form->textField($model,'member_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_nickname'); ?>
		<?php echo $form->textField($model,'member_nickname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_email'); ?>
		<?php echo $form->textField($model,'member_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_sex'); ?>
		<?php echo $form->textField($model,'member_sex',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_address'); ?>
		<?php echo $form->textArea($model,'member_address',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_city_id'); ?>
		<?php echo $form->textField($model,'member_city_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_state_id'); ?>
		<?php echo $form->textField($model,'member_state_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_country_id'); ?>
		<?php echo $form->textField($model,'member_country_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_zipcode'); ?>
		<?php echo $form->textField($model,'member_zipcode',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_birth_place'); ?>
		<?php echo $form->textField($model,'member_birth_place',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_birth_date'); ?>
		<?php echo $form->textField($model,'member_birth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_identity_type'); ?>
		<?php echo $form->textField($model,'member_identity_type',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_identity_no'); ?>
		<?php echo $form->textField($model,'member_identity_no',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_phone'); ?>
		<?php echo $form->textField($model,'member_phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_fax'); ?>
		<?php echo $form->textField($model,'member_fax',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_mobilephone'); ?>
		<?php echo $form->textField($model,'member_mobilephone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_image'); ?>
		<?php echo $form->textField($model,'member_image',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_join_datetime'); ?>
		<?php echo $form->textField($model,'member_join_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_devisor_name'); ?>
		<?php echo $form->textField($model,'member_devisor_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_devisor_relationship'); ?>
		<?php echo $form->textField($model,'member_devisor_relationship',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_devisor_phone'); ?>
		<?php echo $form->textField($model,'member_devisor_phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_bank_id'); ?>
		<?php echo $form->textField($model,'member_bank_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_bank_city'); ?>
		<?php echo $form->textField($model,'member_bank_city',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_bank_branch'); ?>
		<?php echo $form->textField($model,'member_bank_branch',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_bank_account_name'); ?>
		<?php echo $form->textField($model,'member_bank_account_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_bank_account_no'); ?>
		<?php echo $form->textField($model,'member_bank_account_no',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_tax_account_no'); ?>
		<?php echo $form->textField($model,'member_tax_account_no',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_serial_id'); ?>
		<?php echo $form->textField($model,'member_serial_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_serial_pin'); ?>
		<?php echo $form->textField($model,'member_serial_pin',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_register_id'); ?>
		<?php echo $form->textField($model,'member_register_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_last_update'); ?>
		<?php echo $form->textField($model,'member_last_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_last_login'); ?>
		<?php echo $form->textField($model,'member_last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_is_updated_by_member'); ?>
		<?php echo $form->textField($model,'member_is_updated_by_member',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_is_updated_by_admin'); ?>
		<?php echo $form->textField($model,'member_is_updated_by_admin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_is_suspended'); ?>
		<?php echo $form->textField($model,'member_is_suspended',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->