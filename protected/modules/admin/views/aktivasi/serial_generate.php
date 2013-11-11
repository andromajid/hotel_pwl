<?php
$this->menu = array(
    array('label' => 'daftar Serial Aktivasi', 'url' => array('list')),
    array('label' => 'daftar file excel', 'url' => array('file_list')),
    array('label' => 'Cari Pin Aktivasi', 'url' => array('search_serial_pin')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Generate Serial Aktivasi', 'hideOnEmpty' => TRUE));
echo CHtml::form();
?>
<div>
    <?php echo CHtml::label('Jumlah Serial Aktivasi', 'jumlah_aktivasi'); ?>
<?php echo CHtml::textField('jumlah_aktivasi', ''); ?>
</div>
<?php
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'kirim',
    'caption' => 'kirim',
    'htmlOptions' => array('class' => 'btn-primary')));
echo CHtml::endForm();
?>
<?php $this->endWidget(); ?>
