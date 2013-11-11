<?php
$this->menu = array(
    array('label' => 'generate Serial Aktivasi', 'url' => array('generate')),
    array('label' => 'daftar file excel', 'url' => array('file_list')),
    array('label' => 'daftar Serial Aktivasi', 'url' => array('list')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Potongan Komisi', 'hideOnEmpty' => TRUE));
echo CHtml::form($this->createUrl('/admin/aktivasi/search_serial_pin'), 'get');
?>
<div>
    <?php echo CHtml::label('Serial Start', 'serial_start'); ?>
    <?php echo CHtml::textField('serial_start', isset($_GET['serial_start']) ? $_GET['serial_start'] : ''); ?>
</div>
<div>
    <?php echo CHtml::label('Serial End', 'serial_end'); ?>
    <?php echo CHtml::textField('serial_end', isset($_GET['serial_end']) ? $_GET['serial_end'] : ''); ?>
</div>
<?php
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'cut',
    'caption' => 'kirim',
    'htmlOptions' => array('class' => 'btn-primary')));
echo CHtml::endForm();

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'site-menu-grid',
    'enablePagination' => true,
    'ajaxUpdate' => false,
    'enableSorting' => true,
    'dataProvider' => $data_serial,
    'columns' => array(
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'header' => 'Serial aktivasi',
            'value' => '$data["serial_id"]',
        ),
        'serial_pin'
        ,
        array(
            'header' => 'Member ID',
            'value' => 'dbHelper::getOne("network_mid", "mlm_network", "network_id=".$data["serial_user_network_id"]);',
        ),
        array(
            'header' => 'Aktivasi telah active',
            'type' => 'raw',
            'value' => '$data["serial_is_active"] == \'1\'?Chtml::tag(\'span\', array(\'class\' => \'badge badge-success\'), \'√\'):Chtml::tag(\'span\', array(\'class\' => \'badge badge-important\'), \'x\')',
        ),
        array(
            'header' => 'Aktivasi telah terpakai',
            'type' => 'raw',
            'value' => '$data["serial_is_used"] == \'1\'?Chtml::tag(\'span\', array(\'class\' => \'badge badge-success\'), \'√\'):Chtml::tag(\'span\', array(\'class\' => \'badge badge-important\'), \'x\')',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}',
            'buttons' => array('view' => array('label' => 'View Serial ID ',
                    'options' => array('class' => 'icon-eye-open'),
                    'url' => 'Yii::app()->getController()->createUrl("/admin/aktivasi/view_pin", array("id" => $data["serial_id"]))',
                    'imageUrl' => Yii::app()->theme->baseUrl . '/img/glyphicons-halflings.png'),),
        ),
    ),
));
$this->endWidget();
