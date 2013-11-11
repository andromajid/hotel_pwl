<?php

class mlmTransfer {

    public $arr_bonus = array();
    public $arr_cut = array();
    public $min_bonus = 100000;
    public $transfer_caption;
    public $transfer_datetime;
    public $transfer_category;
    public $transfer_type;
    public $where = '';
    public $cut_admin, $cut_index, $cut_tax;
    /**
     * @var $excel_writer buat penanda total
     */
    public $excel_writer = array();

    /**
     * fungsi buat ngeadd bonus
     * @param array $arr_bonus array('name' => 'nama bonus', 'field' => 'nama field di database');
     */
    public function setArrBonus($arr_bonus) {
        $this->arr_bonus[] = $arr_bonus;
        return $this;
    }

    /**
     * fungsi buat ngeadd potongan
     * @param array $arr_bonus array('name' => 'nama potonagan', 'field' => 'nama field di database', 'value' => 'data harga');
     */
    public function setArrCut($arr_cut) {
        $this->arr_cut[] = $arr_cut;
        return $this;
    }

    /**
     * fungsi buat ngeset where SQL
     * @param String $where sql where-nya
     */
    public function setWhere($where) {
        $this->where .= $where;
        return $this;
    }

    /**
     * fungsi buat ngerender tampilan transfer
     */
    public function renderTransfer() {
        $isi_table = '';
        $bonus_acc = $bonus_paid = '(';
        $bonus_select_acc = $bonus_select_paid = '';
        for ($i = 0; $i < count($this->arr_bonus); $i++) {
            $bonus_acc .= 'bonus_' . $this->arr_bonus[$i]['field'] . '_acc';
            $bonus_paid .= 'bonus_' . $this->arr_bonus[$i]['field'] . '_paid';
            $bonus_select_acc .= 'bonus_' . $this->arr_bonus[$i]['field'] . '_acc';
            $bonus_select_paid .= 'bonus_' . $this->arr_bonus[$i]['field'] . '_paid';
            $iplus = $i + 1;
            if ($iplus != count($this->arr_bonus)) {
                $bonus_acc .= ' + ';
                $bonus_paid .= ' + ';
                $bonus_select_acc .= ', ';
                $bonus_select_paid .= ', ';
            }
        }
        $bonus_acc .= ')';
        $bonus_paid .= ')';
        $total_total_komisi = $total_cut_index = $total_cut_tax = $total_cut_adm = $total_total_transfer = 0;
        //ambil data dari mlm_bonus
        $data_transfer = $this->get_transfer($bonus_select_acc, $bonus_select_paid, $bonus_acc, $bonus_paid);
        if ($data_transfer) {
            $bonus_manual = "";
            $no = 1;

            //klo ada cut_adm
            $cut_adm = $this->getCutAdm();
            $cut_index_percent = $this->getCutIndex(date('Y-m-d'), 'daily');
            foreach ($data_transfer as $row_transfer) {
                $hidden_form = '';
                $bonus_manual = "";
                for ($i = 0; $i < count($this->arr_bonus); $i++) {
                    $bonus_acc = 'bonus_' . $this->arr_bonus[$i]['field'] . '_acc';
                    $bonus_paid = 'bonus_' . $this->arr_bonus[$i]['field'] . '_paid';
                    $bonus_manual .= '<td>' . number_format($row_transfer[$bonus_acc] - $row_transfer[$bonus_paid]) . '</td>';
                    $hidden_form .= '<input type="hidden" name="arr_bonus[' . $i . '][item][' . $row_transfer['network_id'] . ']" value="' . ($row_transfer[$bonus_acc] - $row_transfer[$bonus_paid]) . '">';
                }
                $total_komisi = $row_transfer['total_komisi'];
                $cut_index = ($cut_index_percent / 100) * $total_komisi;
                //untuk potongan Pajak PPH masih manual dolo
                //$cut_tax = (21 / 100) * $total_komisi;
                $cut_tax = (0 / 100) * $total_komisi;
                $total_transfer = $total_komisi - ($cut_adm + $cut_index + $cut_tax);
                //nambahin ke hidden form-nya
                $hidden_form .= '<input type="hidden" name="total_komisi[' . $row_transfer['network_id'] . ']" value="' . $total_komisi . '">';
                $hidden_form .= '<input type="hidden" name="arr_potongan[cut_index_percent][item][' . $row_transfer['network_id'] . ']" value="' . $cut_index_percent . '">';
                $hidden_form .= '<input type="hidden" name="arr_potongan[cut_index][item][' . $row_transfer['network_id'] . ']" value="' . $cut_index . '">';
                $hidden_form .= '<input type="hidden" name="arr_potongan[cut_adm][item][' . $row_transfer['network_id'] . ']" value="' . $cut_adm . '">';
                $hidden_form .= '<input type="hidden" name="arr_potongan[cut_tax][item][' . $row_transfer['network_id'] . ']" value="' . $cut_tax . '">';
                $hidden_form .= '<input type="hidden" name="total_transfer[' . $row_transfer['network_id'] . ']" value="' . $total_transfer . '">';
                $hidden_form .= '<input type="hidden" name="transfer_bank_id[' . $row_transfer['network_id'] . ']" value="' . $row_transfer['member_bank_id'] . '">';
                $hidden_form .= '<input type="hidden" name="transfer_bank_account_name[' . $row_transfer['network_id'] . ']" value="' . $row_transfer['member_bank_account_name'] . '">';
                $hidden_form .= '<input type="hidden" name="transfer_bank_account_no[' . $row_transfer['network_id'] . ']" value="' . $row_transfer['member_bank_account_no'] . '">';
                $hidden_form .= '<input type="hidden" name="transfer_mobilephone[' . $row_transfer['network_id'] . ']" value="' . $row_transfer['member_mobilephone'] . '">';

                $total_total_komisi = $total_total_komisi + $total_komisi;
                $total_cut_index = $total_cut_index + $cut_index;
                $total_cut_adm = $total_cut_adm + $cut_adm;
                $total_cut_tax = $total_cut_tax + $cut_tax;
                $total_total_transfer = $total_total_transfer + $total_transfer;
                $bank_name = dbHelper::getOne('bank_name', 'ref_bank', 'bank_id = ' . $row_transfer['member_bank_id']);
                //ISI KE table
                $isi_table .= '<tr>';
                $isi_table .= "<td align=\"center\"><input type=\"checkbox\" name=\"item[{$no}]\" id=\"item[{$no}]\" value=\"{$row_transfer['network_id']}\"></td>";
                $isi_table .= "<td align=\"right\">{$no}</td>";
                $isi_table .= "<td align=\"center\">{$row_transfer['network_mid']}</td>";
                $isi_table .= "<td>{$row_transfer['member_name']}</td>";
                $isi_table .= "<td></td>";
                $isi_table .= "<td>{$row_transfer['member_bank_account_no']}</td>";
                $isi_table .= $bonus_manual;
                $isi_table .= "<td>" . number_format($total_komisi) . "</td>";
                $isi_table .= "<td>" . number_format($cut_index) . "</td>";
                $isi_table .= "<td>" . number_format($cut_tax) . "</td>";
                $isi_table .= "<td>" . number_format($cut_adm) . "</td>";
                $isi_table .= "<td>" . number_format($total_transfer) . "</td>";
                $isi_table .= "</tr>";
                $isi_table .= $hidden_form;
                $no++;
            }
            $isi_table .= '<tr>';
            $isi_table .= '<td colspan="10"></td>';
            $isi_table .= '<td>' . number_format($total_total_komisi) . '</td>';
            $isi_table .= '<td>' . number_format($total_cut_index) . '</td>';
             $isi_table .= '<td>' . number_format($total_cut_tax) . '</td>';
            $isi_table .= '<td>' . number_format($total_cut_adm) . '</td>';
            $isi_table .= '<td>' . number_format($total_total_transfer) . '</td>';
            $isi_table .= '<tr />';
        }
        return $isi_table;
    }

    /**
     *  fungsi buat ngeset tranfer
     * @param Int $network_id
     * @param Int $transfer_bank_id nama banknya
     * @param String $transfer_bank_name
     * @param Int $transfer_bank_account_no
     * @param String $trasnfer_mobilephone
     * @param Array $arr_bonus
     * @param Array $arr_potongan
     * @param Int $transfer_bonus_total
     * @param Int $transfer_total
     * @param Int $transfer_datetime
     * @param excel $excel
     */
    public function commitTransfer($network_id, $transfer_bank_id, $transfer_bank_account_name, $transfer_bank_account_no, $transfer_mobilephone, $arr_bonus, $arr_potongan, $transfer_bonus_total, $transfer_total, $excel, $no) {
        $bonus_syntax = $transfer_syntax = '';
        for ($i = 0; $i < count($this->arr_bonus); $i++) {
            $transfer_syntax .= 'transfer_' . $this->arr_bonus[$i]['field'] . '_paid = ' . $arr_bonus[$i]['value'];
            $bonus_syntax .= 'bonus_' . $this->arr_bonus[$i]['field'] . '_paid = bonus_' . $this->arr_bonus[$i]['field'] . '_paid + ' . $arr_bonus[$i]['value'];

            $transfer_syntax .= ', ';
            if ($i != count($arr_bonus))
                $bonus_syntax .= ',';
        }
        $member = Yii::app()->db->createCommand()->from('mlm_member')->where('member_network_id=:network_id', array(':network_id' => $network_id))->queryRow();
        $bonus_syntax = trim($bonus_syntax, ',');
        //masukan ke sys_bonus_transfer
        $data_insert_transfer = "transfer_network_id = '" . $network_id . "',
                                " . $transfer_syntax . "
                                transfer_bonus_total = '" . $transfer_bonus_total . "',
                                transfer_total = '" . $transfer_total . "',
                                transfer_cut_adm = '" . $arr_potongan['cut_adm']['value'] . "',
                                transfer_cut_tax = '".$arr_potongan['cut_tax']['value']."',
                                transfer_cut_index = '" . $arr_potongan['cut_index']['value'] . "',
                                transfer_cut_index_percent = '" . $arr_potongan['cut_index_percent']['value'] . "',
                                transfer_caption = '" . addslashes($this->transfer_caption) . "',
                                transfer_category = '" . $this->transfer_category . "',
                                transfer_type = '" . $this->transfer_type . "',
                                transfer_bank_id = '" . $transfer_bank_id . "',
                                transfer_tax_account_no = '".$member['member_tax_account_no']."',
                                transfer_bank_account_name = '" . addslashes($transfer_bank_account_name) . "',
                                transfer_bank_account_no = '" . addslashes($transfer_bank_account_no) . "',
                                transfer_mobilephone = '" . addslashes($transfer_mobilephone) . "',
                                transfer_datetime = '" . $this->transfer_datetime . "'";

        //update sys_bonus
        Yii::app()->db->createCommand("INSERT INTO mlm_bonus_transfer SET " . $data_insert_transfer)->execute();
        Yii::app()->db->createCommand("UPDATE mlm_bonus SET " . $bonus_syntax . " WHERE bonus_network_id = " . $network_id)->execute();
        //update ke excelnya
        $member = Yii::app()->db->createCommand()->select()->from('mlm_bonus_transfer')->leftJoin('mlm_network', 'transfer_network_id=network_id')->leftJoin('mlm_member', 'mlm_network.network_id = mlm_member.member_network_id')->
                        where('network_id=:network_id', array(':network_id' => $network_id))->queryRow();
        if ($member) {
            $total_bonus_paid = array();
            $arr_line = array($no, $member['network_mid'], $member['member_name'], isset($member['transfer_bank_id'])?dbHelper::getOne('bank_name', 'ref_bank', 'bank_id=' . $member['transfer_bank_id']):'',
                $transfer_bank_account_name, $transfer_bank_account_no, $member['member_bank_city'] . "(" . $member['member_bank_branch'] . ")", $member['transfer_mobilephone']);
            for ($i = 0; $i < count($this->arr_bonus); $i++) {
                array_push($arr_line, $arr_bonus[$i]['value']);
                $this->excel_writer['bonus_total'][$i] += $arr_bonus[$i]['value'];
            }
            $this->excel_writer['cut_total']['cut_index'] += $arr_potongan['cut_index']['value'];
            $this->excel_writer['cut_total']['cut_adm'] += $arr_potongan['cut_adm']['value'];
            $this->excel_writer['cut_total']['cut_tax'] += $arr_potongan['cut_tax']['value'];
            $this->excel_writer['total']['transfer_total'] +=  $transfer_total;
            $this->excel_writer['total']['transfer_bonus_total'] +=  $transfer_bonus_total;
            array_push($arr_line, $transfer_bonus_total, $arr_potongan['cut_index']['value'], $arr_potongan['cut_tax']['value'], $arr_potongan['cut_adm']['value'], $transfer_total);
            $excel->writeLine($arr_line);
        }
    }

    /**
     * method private buat nge-grap data sql transfer
     * @param String $bonus_select_acc sql select acc
     * @param String $bonus_select_paid sql select paid
     * @param String $bonus_acc
     * @param String $bonus_paid
     */
    private function get_transfer($bonus_select_acc, $bonus_select_paid, $bonus_acc, $bonus_paid) {
        $result = Yii::app()->db->createCommand("SELECT network_id, network_mid,  member_name, member_nickname, member_mobilephone,
            member_bank_id, member_bank_city, member_bank_branch, member_bank_account_name, member_bank_account_no,
            " . $bonus_select_acc . ", " . $bonus_select_paid . ", (" . $bonus_acc . " - " . $bonus_paid . ") AS total_komisi
            FROM mlm_bonus
            RIGHT JOIN mlm_network ON bonus_network_id = network_id
            LEFT JOIN mlm_member ON member_network_id = network_id
            WHERE
            member_is_suspended = '0' AND
            (" . $bonus_acc . " - " . $bonus_paid . ") >= " . $this->min_bonus . "
            " . $this->where . "
            ")->queryAll();
        if ($result)
            return $result;
        else
            return FALSE;
    }

    /**
     * Buat ambil potongan administrasi
     * @return Int potongan admin-nya
     */
    public function getCutAdm() {
        if (isset(Yii::app()->session['cut_adm'])) {
            return Yii::app()->session['cut_adm'];
        } else
            return 0;
    }

    /**
     * buat ambil potongan index
     * 
     */
    public function getCutIndex($index_date, $index_type) {
        return dbHelper::getOne('index_value', 'mlm_bonus_index', "index_type = '{$index_type}' AND index_date = '{$index_date}'");
    }

    /**
     * buat ngeset cut index
     * @param int $cut_index_val nilai cut_index
     * @param String $date
     * @param String $index_type tipe index-nya
     */
    public function setCutIndex($cut_index_val, $date, $index_type = 'daily') {
        $cut_index_val = intval($cut_index_val);
        //cek dolo
        $cut_index = dbHelper::getOne('index_id', 'mlm_bonus_index', 'index_date = \'' . $date . '\' AND index_type =\'' . $index_type . '\'');
        if ($cut_index) {
            Yii::app()->db->createCommand()->update('mlm_bonus_index', array('index_value' => $cut_index_val), 'index_date=:index_date AND index_type=:index_type'
                    , array(':index_date' => $date, ':index_type' => $index_type));
        } else {
            Yii::app()->db->createCommand()->insert('mlm_bonus_index', array('index_date' => $date,
                'index_type' => $index_type,
                'index_value' => $cut_index_val));
        }
        return $this;
    }

    /**
     * buat ngeset cut administrasi
     * @param int $cut_adm_value
     */
    public function set_cut_adm($cut_adm_value) {
        $cut_adm_value = intval($cut_adm_value);
        Yii::app()->session['cut_adm'] = $cut_adm_value;
        return $this;
    }

}

?>
