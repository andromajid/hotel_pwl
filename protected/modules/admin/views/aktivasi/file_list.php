<?php
$this->menu = array(
    array('label' => 'generate Serial Aktivasi', 'url' => array('generate')),
    array('label' => 'daftar serial aktivasi', 'url' => array('list')),
    array('label' => 'Cari Pin Aktivasi', 'url' => array('search_serial_pin')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'daftar file excel', 'hideOnEmpty' => TRUE));
?>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th id="yw7_c0">#</th><th id="yw7_c4">File Excell(Klik Untuk download)</th></tr>
    </thead>
    <?php
    if (is_array($data_arr)):
        $x = 1;
        ?>
        <?php foreach ($data_arr as $row): ?>
            <?php
                $explode = explode('/', $row);
                $last_array = array_pop($explode);
            ?>
            <tr class="odd">
                <td> <?php echo $x; ?></td>
                <td> <?php echo CHtml::link($last_array, Yii::app()->baseUrl.'/files/excel/serial/'.$last_array); ?></td>
            </tr>
            <?php
            $x++;
        endforeach;
        ?>
<?php endif; ?>
</table>
<?php
$this->endWidget();