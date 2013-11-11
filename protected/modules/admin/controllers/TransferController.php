<?php

class TransferController extends adminController {

    //put your code here
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    /**
     * Mehod default index
     */
    public function actionIndex() {
        $this->layout = 'column1';
        Yii::import('application.extensions.mlm.mlmTransfer');
        $transfer = new mlmTransfer;

        $transfer->transfer_datetime = date("Y-m-d H:i:s");
        $transfer->transfer_caption = 'Pembayaran Komisi Tanggal : ' . date("d-m-Y");
        $transfer->transfer_type = 'daily';
        $transfer->setArrBonus(array('name' => 'Bonus Sponsor',
            'field' => 'sponsor'));
        $transfer->setArrBonus(array('name' => 'Bonus Titik level',
            'field' => 'node'));
        $transfer->setArrBonus(array('name' => 'Bonus Pasangan',
            'field' => 'match'));
        $transfer->setArrBonus(array('name' => 'Bonus Reward',
            'field' => 'reward'));
        $transfer->setArrCut(array('name' => 'Potongan Index',
            'field' => 'cut_index',
            'value' => $transfer->getCutIndex(date("Y-m-d"), 'daily')));
        $transfer->setArrCut(array('name' => 'Potongan Admin',
            'field' => 'cut_admin',
            'value' => $transfer->getCutAdm()));
//         $transfer->setArrCut(array('name' => 'Potongan PPh',
//            'field' => 'cut_tax',
//            'value' => 21));
        $transfer->setArrCut(array('name' => 'Potongan PPh',
            'field' => 'cut_tax',
            'value' => 0));
        if (isset($_POST['cut'])) {
            $transfer->setCutIndex($_POST['cut_index'], date('Y-m-d'))->set_cut_adm($_POST['cut_admin']);
        }
        if (isset($_POST['transfer'])) {
            if ($_POST['captcha'] === $_SESSION['captcha_admin']) {
                if (is_array($_POST['item'])) {
                    Yii::import('application.extensions.excel');
                    $excel_file = 'Transfer ' . Yii::app()->name . ' ' . date("Y.m.d-H.i.s") . '.xls';
                    $excel = new excel(YiiBase::getPathOfAlias('webroot') . '/files/excel/transfer/' . $excel_file);
                    $arr_line = array($transfer->transfer_caption);
                    $excel->writeLine($arr_line);
                    $no = 1;
                    $arr_line = array('No.', 'ID Member', 'Nama Member', 'Nama Bank', 'Nama Nasabah', 'Nomor Rekening', "Cabang", 'Nomor Handphone');
                    for ($i = 0; $i < count($transfer->arr_bonus); $i++) {
                        array_push($arr_line, $transfer->arr_bonus[$i]['name']);
                    }
                    array_push($arr_line, 'Total Komisi', " Potongan index", 'Potongan Pajak(21%)', "Potongan Admin", 'Total Ditransfer');
                    $excel->writeLine($arr_line);
                    foreach ($_POST['item'] as $id => $value) {
                        for ($i = 0; $i < count($transfer->arr_bonus); $i++) {
                            $arr_bonus[$i]['value'] = $_POST['arr_bonus'][$i]['item'][$value];
                            $arr_potongan['cut_adm']['value'] = $_POST['arr_potongan']['cut_adm']['item'][$value];
                            $arr_potongan['cut_tax']['value'] = $_POST['arr_potongan']['cut_tax']['item'][$value];
                            $arr_potongan['cut_index']['value'] = $_POST['arr_potongan']['cut_index']['item'][$value];
                            $arr_potongan['cut_index_percent']['value'] = $_POST['arr_potongan']['cut_index_percent']['item'][$value];
                        }
                        $transfer->commitTransfer($value, $_POST['transfer_bank_id'][$value], $_POST['transfer_bank_account_name'][$value], $_POST['transfer_bank_account_no'][$value], $_POST['transfer_mobilephone'][$value], $arr_bonus, $arr_potongan, $_POST['total_komisi'][$value], $_POST['total_transfer'][$value], $excel, $no);
                        $no++;
                    }
                    $arr_line = array("", '', '', '', '', '', '', 'TOTAL');
                    for ($i = 0; $i < count($transfer->arr_bonus); $i++) {
                        array_push($arr_line, $transfer->excel_writer['bonus_total'][$i]);
                    }
                    array_push($arr_line, $transfer->excel_writer['total']['transfer_total'], $transfer->excel_writer['cut_total']['cut_index'], $transfer->excel_writer['cut_total']['cut_tax'], $transfer->excel_writer['cut_total']['cut_adm'], $transfer->excel_writer['total']['transfer_bonus_total']);
                    $excel->writeLine($arr_line);
                    //$excel->close();
                    Yii::app()->user->setFlash('success', 'Komisi Member berhasil di rekap. Silakan <a href="'.$this->createUrl('/admin/transfer/gettransferexcel', array('date' => $transfer->transfer_datetime)).'">Download File Excel</a> untuk mengetahui hasil rekap komisi.');
                    //$this->refresh();
                } else {
                    Yii::app()->user->setFlash('error', 'data trasnfer belum dipilih');
                }
            } else {
                Yii::app()->user->setFlash('error', 'Captcha Yang di isikan masih belum sesuai');
            }
        }
        $data_table = $transfer->renderTransfer();
        $this->render('index', array('data_table' => $data_table, 'transfer' => $transfer));
    }

    /**
     * Buat nampilin history dari transaksi
     */
    public function actionHistory() {
        $this->layout = '//layouts/column2';
        $page = (isset($_GET['page']) ? $_GET['page'] : 1);
        if (isset($_GET['page_view'])) {
            //ambil transfer pada tanggal itu
            $data = MlmBonusTransfer::model()->getTransferByDate($_GET['date']);
            $this->render('historyTransferDetail', array('data' => $data));
        } else {
            $data = '';

            $data = MlmBonusTransfer::model()->getHistoryTransfer(2, $page);
            //$paging = new CPagination($total);
            //$paging->setPageSize(2);
            $this->render('historyTransferList', array('data' => $data));
        }
    }

    public function actionGettransferexcel($date) {
        //ambil data transfe tanggal itu
        Yii::import('application.extensions.excel');
        $transfer = MlmBonusTransfer::model()->getTransferByDate($_GET['date']);
        //buat file arraynya
        $excel = new excel('Transfer ' . Yii::app()->name . ' ' . $_GET['date'] . '.xls');
        if ($transfer) {
            MlmBonusTransfer::model()->generateExcel($transfer, $excel);
            $excel->close();
        } else {
            throw new CHttpException(404, 'Transfer Pada tanggal ' . $_GET['date'] . ' tidak ada');
        }
        //$this->render('andro');
    }

}

?>
