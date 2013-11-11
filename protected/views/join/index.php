<?php
$this->pageTitle = 'Registrasi Member';
$this->breadcrumbs = array(
    'join',
);
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'mydialog',
    // additional javascript options for the dialog plugin
    'options' => array(
        'title' => 'Pilih Sponsor',
        'autoOpen' => false,
    ),
));
?>
<style type="text/css">

    div.form
    {
    }

    div.form input,
    div.form textarea,
    div.form select
    {
        margin: 0.2em 0 0.5em 0;
    }

    div.form fieldset
    {
        border: 1px solid #DDD;
        padding: 10px;
        margin: 0 0 10px 0;
        -moz-border-radius:7px;
    }

    div.form label
    {
        font-weight: bold;
        font-size: 0.9em;
        display: block;
    }

    div.form .row
    {
        margin: 5px 0;
    }

    div.form .hint
    {
        margin: 0;
        padding: 0;
        color: #999;
    }

    div.form .note
    {
        font-style: italic;
    }

    div.form span.required
    {
        color: red;
    }

    div.form div.error label:first-child,
    div.form label.error,
    div.form span.error
    {
        color: #C00;
    }

    div.form div.error input,
    div.form div.error textarea,
    div.form div.error select,
    div.form input.error,
    div.form textarea.error,
    div.form select.error
    {
        background: #FEE;
        border-color: #C00;
    }

    div.form div.success input,
    div.form div.success textarea,
    div.form div.success select,
    div.form input.success,
    div.form textarea.success,
    div.form select.success
    {
        background: #E6EFC2;
        border-color: #C6D880;
    }


    div.form .errorSummary
    {
        border: 2px solid #C00;
        padding: 7px 7px 12px 7px;
        margin: 0 0 20px 0;
        background: #FEE;
        font-size: 0.9em;
    }

    div.form .errorMessage
    {
        color: red;
        font-size: 0.9em;
    }

    div.form .errorSummary p
    {
        margin: 0;
        padding: 5px;
    }

    div.form .errorSummary ul
    {
        margin: 0;
        padding: 0 0 0 20px;
    }

    div.wide.form label
    {
        float: left;
        margin-right: 10px;
        position: relative;
        text-align: right;
        width: 100px;
    }

    div.wide.form .row
    {
        clear: left;
    }

    div.wide.form .buttons, div.wide.form .hint, div.wide.form .errorMessage
    {
        clear: left;
        padding-left: 110px;
    }

</style>
<?php
echo CHtml::form();
echo '<p>Isikan Sponsor dan sistem akan menemukan upline anda dan posisi anda secara otomatis.</p>';
echo CHtml::label('Sponsor', 'sponsor_auto');
echo CHtml::textField('sponsor_auto');
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'submit',
    'caption' => 'Save'));
?>
<?php
echo CHtml::endForm();
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<div class="form">
    <?php $form = $this->beginWidget('CActiveForm'); ?>
    <?php echo $form->errorSummary($form_model); ?>
    <fieldset>
        <legend>Data Network</legend>
        <div class="row">
            <?php echo $form->label($form_model, 'sponsor_username'); ?>
            <?php echo $form->textField($form_model, 'sponsor_username') ?>
        </div>
        <div class="row">
            <?php echo $form->label($form_model, 'upline_username'); ?>
            <?php echo $form->textField($form_model, 'upline_username') ?>
        </div>
        <div class="row">
            <?php
            //$form_model->position = empty($form_model->position) ? "kiri" : "kanan";
            ?>
            <?php echo $form->label($form_model, 'position'); ?>
            <?php echo $form->radioButtonList($form_model, 'position', array('kiri' => 'Kiri', 'kanan' => 'kanan'), array('uncheckValue' => null, 'separator' => "&nbsp;&nbsp;",
                'labelOptions' => array('style' => 'display:inline'))); ?>
        </div>

        <div class="row">
            <p style="font-size:14px;">Jika Tidak tahu posisi dan upline anda silahkan <?php
            echo CHtml::link('<b>Klik Disini</b>', '#', array(
                'onclick' => '$("#mydialog").dialog("open"); return false;',
            ));
            ?></p>
        </div>
    </fieldset>
    <fieldset>
        <legend>Activation</legend>
        <div class="row">
            <?php echo $form->label($form_model, 'activation_id'); ?>
            <?php echo $form->textField($form_model, 'activation_id') ?>
        </div>
        <div class="row">
            <?php echo $form->label($form_model, 'activation_pin'); ?>
            <?php echo $form->textField($form_model, 'activation_pin') ?>
        </div>
    </fieldset>

    <fieldset>
        <legend>Data Login</legend>
        <div class="row">
            <?php echo $form->label($form_model, 'member_password'); ?>
            <?php echo $form->passwordField($form_model, 'member_password') ?>
        </div>
        <div class="row">
            <?php echo $form->label($form_model, 'member_password_repeat'); ?>
            <?php echo $form->passwordField($form_model, 'member_password_repeat') ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Data Member</legend>
        <div class="row">
            <?php echo $form->label($form_model, 'member_name'); ?>
            <?php echo $form->textField($form_model, 'member_name') ?>
        </div>
        <div class="row">
            <?php echo $form->label($form_model, 'member_username'); ?>
            <?php echo $form->textField($form_model, 'member_username') ?>
        </div>
        <div class="row">
            <?php echo $form->label($form_model, 'member_email'); ?>
            <?php echo $form->textField($form_model, 'member_email') ?>
        </div>

        <div class="row">
            <?php echo $form->label($form_model, 'member_mobilephone'); ?>
            <?php echo $form->textField($form_model, 'member_mobilephone') ?>
        </div>
        <div class="row">
            <?php echo $form->label($form_model, 'member_tax_account_no'); ?>
            <?php echo $form->textField($form_model, 'member_tax_account_no') ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Data Bank</legend>
        <div class="row">
        <?php echo $form->labelEx($form_model, 'member_bank_id'); ?>
    <?php echo CHtml::activeDropDownList($form_model, 'member_bank_id', CHtml::listData(RefBank::model()->findAll("bank_is_active = '1'"), 'bank_id', 'bank_name'));
    ?></div>
        <div class="row">
            <?php echo $form->label($form_model, 'member_bank_city'); ?>
            <?php echo $form->textField($form_model, 'member_bank_city') ?>
        </div>
        <div class="row">
            <?php echo $form->label($form_model, 'member_bank_branch'); ?>
            <?php echo $form->textField($form_model, 'member_bank_branch') ?>
        </div>
        <div class="row">
            <?php echo $form->label($form_model, 'member_bank_account_name'); ?>
            <?php echo $form->textField($form_model, 'member_bank_account_name') ?>
        </div>
        <div class="row">
            <?php echo $form->label($form_model, 'member_bank_account_no'); ?>
            <?php echo $form->textField($form_model, 'member_bank_account_no') ?>
        </div>
    </fieldset>
    <?php echo CHtml::submitButton('Daftar'); ?>
    <?php $this->endWidget(); ?>
</div>

<script type="text/javascript">
    $("button.close").bind('click',function(){
        $('div.alert').slideUp('slow');
    });
</script>