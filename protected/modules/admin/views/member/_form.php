<?php
/* @var $this MemberController */
/* @var $model MlmMember */
/* @var $form CActiveForm */
?>
<?php
$old_image = ($model->member_image != '') ? '<a href="' . Yii::app()->baseUrl . "/files/images/member/" . $model->member_image . '" target="_blank">' . $model->member_image . '</a><br />' : '';
?>
<script language="javascript">
    var optionParentState = new Array();
    var valueParentState = new Array();
    var optionChildState = new Array();
    var valueChildState = new Array();
    var defaultChildIdState = '0';
    var defaultParentIdState = '0';
<?php
$q_parent = "SELECT area_id, area_name FROM ref_area WHERE area_par_id = '0'";
$r_parent = Yii::app()->db->createCommand($q_parent)->queryAll();
$i = 0;

foreach ($r_parent as $parent) {
    extract($parent);
    $q_child = "SELECT area_id AS id_child, area_name AS wil_child FROM ref_area WHERE area_par_id = '$area_id' ORDER BY area_name";
    $r_child = Yii::app()->db->createCommand($q_child)->queryAll();
    $arroptionChildState = "";
    $arrvalueChildState = "";

    foreach ($r_child as $child) {
        @extract($child);

        if ($id_child == $model->member_city_id) {
            $arroptionChildState .= "'===== $wil_child =====',";
        } else {
            $arroptionChildState .= "'$wil_child',";
        }

        $arrvalueChildState .= "'$id_child',";
        //$arrvalueChildState .= "'$wil_child',";
    }

    $arroptionChildState = substr($arroptionChildState, 0, -1);
    $arrvalueChildState = substr($arrvalueChildState, 0, -1);

    if ($area_id == $model->member_state_id) {
        ?>
                    optionParentState[<?= $i ?>] = '===== <?= $area_name ?> =====';
                    valueParentState[<?= $i ?>] = '<?= $area_id ?>';
        <?php
    } else {
        ?>
                    optionParentState[<?= $i ?>] = '<?= $area_name ?>';
                    valueParentState[<?= $i ?>] = '<?= $area_id ?>';
        <?php
    }
    ?>

            optionChildState[<?= $i ?>] = Array(<?= $arroptionChildState; ?>);
            valueChildState[<?= $i ?>] = Array(<?= $arrvalueChildState; ?>);
    <?php
    $i++;
}
?>

    function loadParent(parent, child)
    {
        if(parent.length <= 1)
        {
            parent.length = 0;
            for(var i = 0; i < optionParentState.length; i++)
            {
                parent.options[i] = new Option(optionParentState[i], valueParentState[i]);
                if(valueParentState[i] == '<?php echo dbHelper::getOne('area_name', 'ref_area', 'area_id=' . $model->member_state_id); ?>') parent.options[i].selected = true;
            }

            //parent.options[defaultParentIdState].selected = true;
            loadChild(parent, child);
            //child.options[defaultChildIdState].selected = true;
        }
    }

    function loadChild(parent, child)
    {
        var currParent = parent.selectedIndex;

        child.length = 0;

        //if (currParent > 0)
        //{
        var curroptionChildState = optionChildState[currParent]; //.split(',');
        var currvalueChildState = valueChildState[currParent]; //.split(',');

        for(var i = 0; i < curroptionChildState.length; i++)
        {
            child.options[i] = new Option(curroptionChildState[i], currvalueChildState[i]);


            //child.options[0].selected = true;
            if(currvalueChildState[i] == '<?php echo dbHelper::getOne('area_name', 'ref_area', 'area_id=' . $model->member_city_id); ?>') child.options[i].selected = true;
        }
        //}
    }

    var sval = '';
</script>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'mlm-member-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->labelEx($model, 'member_name'); ?>
    <?php echo $form->textField($model, 'member_name', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_name'); ?>

    <?php echo $form->labelEx($model, 'member_nickname'); ?>
    <?php echo $form->textField($model, 'member_nickname', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_nickname'); ?>

    <?php echo $form->labelEx($model, 'member_email'); ?>
    <?php echo $form->textField($model, 'member_email', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_email'); ?>

    <div class="input_group">
        <label for="MlmMember_member_bank_id">Jenis Kelamin </label>
        <?php
        $member_sex_option = array('male' => 'Laki-laki', 'female' => 'Perempuan');
        echo CHtml::radioButtonList('MlmMember[member_sex]', $model->member_sex, $member_sex_option, array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;')));
        ?>
    </div>

    <?php echo $form->labelEx($model, 'member_address'); ?>
    <?php echo $form->textArea($model, 'member_address', array('rows' => 6, 'cols' => 50, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_address'); ?>

    <label for="MlmMember_member_bank_id">Propinsi </label>
    <select name="MlmMember[member_state_id]" id="inputParent" onchange="loadChild(this, document.getElementById('inputChild'));" onFocus="loadParent(this, document.getElementById('inputChild'))">
        <option value="<?php echo $model->member_state_id; ?>">===== <?php echo dbHelper::getOne('area_name', 'ref_area', 'area_id=' . $model->member_state_id); ?> =====</option>
    </select>

    <label for="MlmMember_member_bank_id">Kabupaten </label>
    <select name="MlmMember[member_city_id]" id="inputChild">
        <option value="<?php echo $model->member_city_id; ?>">===== <?php echo dbHelper::getOne('area_name', 'ref_area', 'area_id=' . $model->member_city_id); ?> =====</option>
    </select>

    <?php echo $form->labelEx($model, 'member_zipcode'); ?>
    <?php echo $form->textField($model, 'member_zipcode', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_zipcode'); ?>

    <?php echo $form->labelEx($model, 'member_birth_place'); ?>
    <?php echo $form->textField($model, 'member_birth_place', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_birth_place'); ?>

    <?php echo $form->labelEx($model, 'member_birth_date'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'member_birth_date',
        // additional javascript options for the date picker plugin
        'options' => array(
            'showAnim' => 'fold',
            'changeMonth' => true,
            'changeYear' => true,
            'maxDate' => '-1d',
            'minDate' => '-70y',
            'dateFormat' => 'yy-mm-dd'
        ),
        'htmlOptions' => array(
            'style' => 'height:20px;'
        ),
    ));
    ?>
    <?php echo $form->error($model, 'member_birth_date'); ?>

    <?php echo $form->labelEx($model, 'member_identity_type'); ?>
    <?php
    $member_identity_type_option = array('ktp' => 'KTP', 'sim' => 'SIM', 'passport' => 'Passport');
    echo CHtml::activeRadioButtonList($model, 'member_identity_type', $member_identity_type_option, array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;'))); //radioButtonList('MlmMember[member_identity_type]', $model->member_identity_type, $member_identity_type_option, array('size' => 1, 'maxlength' => 1, 'labelOptions' => array('style' => 'display:inline; font-weight:normal;')));
    ?>

    <?php echo $form->error($model, 'member_identity_type'); ?>

    <?php echo $form->labelEx($model, 'member_identity_no'); ?>
    <?php echo $form->textField($model, 'member_identity_no', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_identity_no'); ?>

    <?php echo $form->labelEx($model, 'member_phone'); ?>
    <?php echo $form->textField($model, 'member_phone', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_phone'); ?>


    <?php echo $form->labelEx($model, 'member_mobilephone'); ?>
    <?php echo $form->textField($model, 'member_mobilephone', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_mobilephone'); ?>
    <input type="hidden" name="old_image" value="<?php echo $model->member_image;?>"> 
    <?php echo $form->labelEx($model, 'member_image'); ?>
    <?php echo $form->fileField($model, 'member_image'); ?>
    <?php echo $form->error($model, 'member_image'); ?>
    
    <?php echo $form->labelEx($model, 'member_devisor_name'); ?>
    <?php echo $form->textField($model, 'member_devisor_name', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_devisor_name'); ?>

    <?php echo $form->labelEx($model, 'member_devisor_relationship'); ?>
    <?php echo $form->textField($model, 'member_devisor_relationship', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_devisor_relationship'); ?>

    <?php echo $form->labelEx($model, 'member_devisor_phone'); ?>
    <?php echo $form->textField($model, 'member_devisor_phone', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_devisor_phone'); ?>

    <?php echo $form->labelEx($model, 'member_bank_id'); ?>
    <?php echo CHtml::activeDropDownList($model, 'member_bank_id', CHtml::listData(RefBank::model()->findAll("bank_is_active = '1'"), 'bank_id', 'bank_name'));
    ?>
    <?php echo $form->error($model, 'member_bank_id'); ?>

    <?php echo $form->labelEx($model, 'member_bank_city'); ?>
    <?php echo $form->textField($model, 'member_bank_city', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_bank_city'); ?>

    <?php echo $form->labelEx($model, 'member_bank_branch'); ?>
    <?php echo $form->textField($model, 'member_bank_branch', array('size' => 60, 'maxlength' => 25, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_bank_branch'); ?>

    <?php echo $form->labelEx($model, 'member_bank_account_name'); ?>
    <?php echo $form->textField($model, 'member_bank_account_name', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_bank_account_name'); ?>

    <?php echo $form->labelEx($model, 'member_bank_account_no'); ?>
    <?php echo $form->textField($model, 'member_bank_account_no', array('size' => 60, 'maxlength' => 255, 'class' => 'span6')); ?>
    <?php echo $form->error($model, 'member_bank_account_no'); ?>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->