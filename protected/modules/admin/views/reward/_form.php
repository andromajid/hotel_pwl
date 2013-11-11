<?php
/* @var $this RewardController */
/* @var $model MlmReward */
/* @var $form CActiveForm */
$drop_down = array();
$data_list = dbHelper::getEnumValue('mlm_reward', 'reward_type');
foreach ($data_list as $row_enum) {
    $drop_down[$row_enum] = $row_enum;
}
Yii::app()->clientScript->registerScript('select','
    $("#MlmReward_reward_type").change(function(){
    console.log(this.value);
    if(this.value == "produk") {
        $("#MlmReward_reward_nominal").attr("disabled","disabled");
  } else {
    $("#MlmReward_reward_nominal").removeAttr("disabled");
  }
});
');
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'mlm-reward-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>


    <?php echo $form->labelEx($model, 'reward_cond_node_left'); ?>
<?php echo $form->textField($model, 'reward_cond_node_left', array('class' => 'span6')); ?>
    <?php echo $form->error($model, 'reward_cond_node_left'); ?>


    <?php echo $form->labelEx($model, 'reward_cond_node_right'); ?>
<?php echo $form->textField($model, 'reward_cond_node_right', array('class' => 'span6')); ?>
<?php echo $form->error($model, 'reward_cond_node_right'); ?>



    <?php echo $form->labelEx($model, 'reward_bonus'); ?>
<?php echo $form->textArea($model, 'reward_bonus', array('rows' => 5, 'cols' => 60, 'class' => 'span6')); ?>
<?php echo $form->error($model, 'reward_bonus'); ?>



    <?php echo $form->labelEx($model, 'reward_type'); ?>
   <?php echo $form->dropDownList($model, 'reward_type', $drop_down); ?>
    <?php echo $form->error($model, 'reward_type'); ?>

    <?php echo $form->labelEx($model, 'reward_nominal'); 
        $reward_nominal = array('class' => 'span6');
        if($model->reward_type == 'produk') {
            $reward_nominal = array_merge($reward_nominal, array('disabled' => 'disabled'));
        }
    ?>
<?php echo $form->textField($model, 'reward_nominal', $reward_nominal); ?>
<?php echo $form->error($model, 'reward_nominal'); ?>


    <div class="row buttons">
      <?php
        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'active',
            'caption' => $model->isNewRecord ? 'Create' : 'Save',
            'htmlOptions' => array('class' => 'btn-primary')));
        ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->