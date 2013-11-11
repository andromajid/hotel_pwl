<?php

class WidgetGeneology extends CWidget {

    //put your code here
    public $top_mid;
    public $data = array();
    public $base_url;

    public function init() {
        //terbitkan CSSnya
        $dir = dirname(__FILE__) . '/assets';
        $assetsDir = Yii::app()->assetManager->publish($dir);
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($assetsDir . '/geneology.css');
        $data = $this->generate_geneology_binary($this->top_mid, 3);
        for ($i = 1; $i <= 15; $i++) {
            if (isset($data[$i]['network_level_status']) && $data[$i]['network_level_status'] != '') {
                $data[$i]['box_class'] = 'box-' . $data[$i]['network_level_status'];
            } else {
                $data[$i]['box_class'] = 'box';
            }
        }
        $this->data = $data;
    }

    public function run() {
        $this->render('ViewGeneology', array('data' => $this->data));
    }

    // --------------------------------------------------- GENERATE GENEOLOGY BINARY
    public static function generate_geneology_binary($top_id, $level_depth) {

        $data_max = 0;
        for ($i = 0; $i <= $level_depth; $i++) {
            $data_max = $data_max + (pow(2, $i));
        }

        $upline = 0;
        for ($x = 1; $x <= $data_max; $x++) {
            if ($x % 2 == 0) {
                $position = 'L';
                $position_text = 'kiri';
                $downline_node_id = 'network_left_node_network_id';
                $upline++;
            } else {
                $position = 'R';
                $position_text = 'kanan';
                $downline_node_id = 'network_right_node_network_id';
            }

            if ($x == 1) {
                $network_id = $top_id;
            } elseif ($data[$upline]['member_mid'] == '') {
                $network_id = '';
            } else {
                $network_id = $data[$upline][$downline_node_id];
            }

            if ($network_id == '') {
                $data[$x] = '';
                $data[$x]['member_mid'] = '';
                $data[$x]['member_info'] = 'KOSONG';
                $data[$x]['member_node'] = '';
            } else {
                $sql = "SELECT * FROM mlm_network, mlm_member WHERE network_id = member_network_id AND network_id = '" . $network_id . "'";
                //$sql = "SELECT * FROM mlm_network, mlm_member, mlm_network_node WHERE network_id = member_network_id AND network_id = network_node_network_id AND network_id = '" . $network_id . "'";
                $row = Yii::app()->db->createCommand($sql)->queryRow();

                if ($row !== false) {
                    $data[$x] = $row;


//                    if ($row['network_level_status'] == 'passive') {
//                        $data[$x]['member_mid'] = '<a href="' . Yii::app()->baseUrl . '/member/binary/geneology/' . $data[$x]['network_mid'] . '">' . $data[$x]['network_mid'] . '</a>';
//                        $data[$x]['member_node'] = '';
//                        $data[$x]['member_info'] = 'BELUM<br />AKTIF';
//                    } else {
                    $data[$x]['member_mid'] = '<a href="' . Yii::app()->baseUrl . '/member/geneology/view_network/' . $data[$x]['network_mid'] . '">' . $data[$x]['network_mid'] . '</a>';
                    $data[$x]['member_info'] = str_replace(' ', '<br />', dbHelper::getOne('member_nickname', 'mlm_member', 'member_network_id='.$data[$x]['network_id']));
                    //$data[$x]['member_node'] = $data[$x]['network_total_node_left'] . ' | ' . $data[$x]['network_total_node_right'];
                    $data[$x]['member_node'] = $data[$x]['network_node_left'] . ' | ' . $data[$x]['network_node_right'];
//                        $data[$x]['member_node'] .= '<br /><br />D: ' . $data[$x]['network_node_distributor_left'] . ' | ' . $data[$x]['network_node_distributor_right'];
//                        $data[$x]['member_node'] .= '<br />W: ' . $data[$x]['network_node_warehouse_left'] . ' | ' . $data[$x]['network_node_warehouse_right'];
//                        $data[$x]['member_node'] .= '<br />F: ' . $data[$x]['network_node_factory_left'] . ' | ' . $data[$x]['network_node_factory_right'];
                    //}
                } else {
                    $base_decode = base64_encode(function_lib::get_network_mid($_SESSION['member']['network_id']) . '/' . $data[$upline]['network_mid'] . '/' . $position_text);
                    //var_dump(function_lib::get_network_mid($_SESSION['member']['network_id']) . '/' . $data[$upline]['network_mid'] . '/' . $position_text);
                    $data[$x] = '';
                    $data[$x]['member_mid'] = '';
                    $data[$x]['member_node'] = '';
                    $data[$x]['member_info'] = '';
                    $data[$x]['member_info'] .= '<a href="' . Yii::app()->getController()->createUrl('/member/join/clone', array('param' => $base_decode)) . '"><b>KLONING</b></a><br><br>';
                    $data[$x]['member_info'] .= '<br /><a href="' . Yii::app()->getController()->createUrl('/member/join/new', array('param' => $base_decode)) . '"><b>DAFTAR BARU</b></a>';
                    //$data[$x]['member_info'] .= 'KOSONG';
                }
            }
        }
        return $data;
    }

}

?>
