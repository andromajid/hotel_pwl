<?php
$this->breadcrumbs = array(
   'transfer'=>array('/admin/transfer'),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Potongan Komisi', 'hideOnEmpty' => TRUE));
echo CHtml::form();
?>
<div>
    <?php echo CHtml::label('Potongan Index', 'cut_index'); ?>
    <div class="input-append">
        <?php echo CHtml::textField('cut_index', $transfer->getCutIndex(date('Y-m-d'), 'daily')); ?><span class="add-on">%</span>
    </div>
</div>
<div>
    <?php echo CHtml::label('Potongan Administrasi', 'cut_admin'); ?>
    <?php echo CHtml::textField('cut_admin', $transfer->getCutAdm()); ?>
</div>
<?php
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'cut',
    'caption' => 'kirim',
    'htmlOptions' => array('class' => 'btn-primary')));
echo CHtml::endForm();
?>  

<?php $this->endWidget(); ?>
<?php
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Transfer Komisi', 'hideOnEmpty' => TRUE));
echo CHtml::form();
?>  
<div cellspacing="0" cellpadding="0" id="yw9" class="grid-view">
    <fieldset>
    <?php
    echo CHtml::label('Kode Unik', 'captcha');
    echo CHtml::image($this->createUrl('/site/captcha', array('session_name' => 'captcha_admin'))).'';
    echo CHtml::textField('captcha').'<br />';
    $this->widget('zii.widgets.jui.CJuiButton', array(
        'name' => 'transfer',
        'caption' => 'transfer',
        'htmlOptions' => array('class' => 'btn-danger', 'style' => 'margin:10px')));
    ?>
    <table class="table table-hover table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th id="yw9_c0"><?php echo CHtml::checkBox('item', false, array('value' => 'on')); ?></th><th id="yw9_c0">#</th><th id="yw9_c0">Member ID</th><th id="yw9_c1">Nama</th><th id="yw9_c2">Nomer Rekening</th><th id="yw9_c3">Nama Bank</th><th id="yw9_c4">bonus sponsor</th>
               <th id="yw9_c4">bonus titik level</th> <th id="yw9_c4">bonus Pasangan</th><th id="yw9_c4">bonus reward</th><th id="yw9_c4">Total Komisi</th><th id="yw9_c4">Potongan Index</th><th id="yw9_c4">Potongan PPh(21%)</th><th id="yw9_c4">Potongan Admin</th><th id="yw9_c4">Total Transfer</th>
            </tr>
            <?php
            echo $data_table;
            ?>
        </thead>
    </table>
</div>
<?php
echo CHtml::endForm();
$this->endWidget();
?>