<?php
/* @var $this RewardController */
/* @var $data MlmReward */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->reward_id), array('view', 'id'=>$data->reward_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_cond_node_left')); ?>:</b>
	<?php echo CHtml::encode($data->reward_cond_node_left); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_cond_node_right')); ?>:</b>
	<?php echo CHtml::encode($data->reward_cond_node_right); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_bonus')); ?>:</b>
	<?php echo CHtml::encode($data->reward_bonus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_type')); ?>:</b>
	<?php echo CHtml::encode($data->reward_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_nominal')); ?>:</b>
	<?php echo CHtml::encode($data->reward_nominal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_is_active')); ?>:</b>
	<?php echo CHtml::encode($data->reward_is_active); ?>
	<br />


</div>