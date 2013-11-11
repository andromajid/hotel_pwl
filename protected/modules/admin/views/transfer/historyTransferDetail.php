<?php
$tanggal = function_lib::convert_datetime(CHtml::decode($_GET['date']), 'month');
$no = 1;
$pola = array('-',':');
$tanggal_file = str_replace($pola, '.', $_GET['date']);
$tanggal_file = str_replace(" ", "-", $tanggal_file);
$this->menu = array(
    array('label' => 'Daftar Transfer', 'url' => array('index')),
    array('label' => 'Daftar History Transfer', 'url' => array('history')),
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'daftar Transfer Tanggal ' . $tanggal, 'hideOnEmpty' => TRUE));
?>
<h4>daftar Transfer Tanggal <?php echo $tanggal; ?></h4>
<a href="<?php echo $this->createUrl('/admin/transfer/gettransferexcel', array('date' => $_GET['date']));?>"><small>download file excell</small></a>
<table class="table table-hover table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th>no</th>
            <th>Member ID</th>
            <th>Nama</th>
            <th>Nomer Rekening</th>
            <th>Total Komisi</th>
            <th>Total Potongan</th>
            <th>Total Transfer</th>
        </tr>
    </thead>
    <?php if ($data): ?>
        <?php foreach ($data as $row_data):
            ?>
            <tr>
               <td><?php echo $no;?></td>
               <td><?php echo MlmHelper::getNetworkMid($row_data['transfer_network_id']);?></td>
               <td><?php echo dbHelper::getOne('member_name', 'mlm_member', 'member_network_id = '.$row_data['transfer_network_id']);?></td>
               <td><?php echo $row_data['transfer_bank_account_no'];?></td>
               <td><?php echo number_format($row_data['transfer_bonus_total']);?></td>
               <td><?php echo number_format($row_data['transfer_cut_index'] + $row_data['transfer_cut_adm']);?></td>
               <td><?php echo number_format($row_data['transfer_total']);?></td>
            </tr>
        <?php 
        $no++;
        endforeach; ?>
    <?php endif; ?>
</table>
<?php
$this->endWidget();
?>