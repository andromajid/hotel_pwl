<?php

$this->menu = array(
    array('label' => 'Daftar Transfer', 'url' => array('index')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'daftar History Transfer', 'hideOnEmpty' => TRUE));
//$no = $paging->getCurrentPage();
?>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'site-menu-grid',
    'enablePagination' => true,
    'ajaxUpdate' => true,
    'enableSorting' => true,
    'dataProvider' => $data,
    'columns' => array(
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'header' => 'tanggal',
            'value' => 'CHtml::link($data["transfer_datetime"], Yii::app()->getController()->createUrl("/admin/transfer/history", array("page_view" => "transfer", "date" => $data["transfer_datetime"])));',
            'type' => 'html'
        ),
        array(
            'header' => 'Total Bonus',
            'value' => 'number_format($data["transfer_bonus_total"])',
        ),
        array(
            'header' => 'Total Potongan',
            'value' => 'number_format($data["transfer_cut_index"] + $data["transfer_cut_adm"])',
        ),
        array(
            'header' => 'Total Transfer',
            'value' => 'number_format($data["transfer_total"])',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{download}',
            'buttons' => array('view' => array('label' => 'View transfer ',
                    'options' => array('class' => 'icon-eye-open'),
                    'url' => 'Yii::app()->getController()->createUrl("/admin/transfer/history", array("page_view" => "transfer", "date" => $data["transfer_datetime"]))',
                    'imageUrl' => Yii::app()->theme->baseUrl . '/img/glyphicons-halflings.png'),
                'download' => array('label' => 'download file excel',
                    'options' => array('class' => '  icon-circle-arrow-down'),
                   // 'url' => ' Yii::app()->baseUrl."/files/excel/transfer/Transfer ".Yii::app()->name." ".date("Y.m.d",strtotime($data["transfer_datetime"]))."-".date("H.i.s",strtotime($data["transfer_datetime"])).".xls" ',
                    'url' => 'Yii::app()->getController()->createUrl("/admin/transfer/gettransferexcel", array("date" => $data["transfer_datetime"]))',
                /*    function($data) {
                        $pola = array('-', ':');
                        $tanggal_file = str_replace($pola, '.', $data['transfer_datetime']);
                        $tanggal_file = str_replace(" ", "-", $tanggal_file);
                        return  Yii::app()->baseUrl.'/files/excel/transfer/Transfer '.Yii::app()->name. ' '.$tanggal_file.".xls";
                    },*/
                    'imageUrl' => Yii::app()->theme->baseUrl . '/img/glyphicons-halflings.png'),),
        ),
    ),
));

$this->endWidget();
?>
