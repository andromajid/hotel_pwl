<?php
set_time_limit(3600);
class RekapController extends Controller {

    public $layout = '//layouts/column2';

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
    public function actionIndex() {
        Yii::import('application.extensions.mlm.*');
        //ambil data member rekap yang berdasar network_id nya
        $data_network = Yii::app()->db->createCommand()->select("*, DATE_FORMAT(member_join_datetime, '%Y-%m-%d') as tanggal")->from('mlm_network')->
                        leftJoin('mlm_member', 'network_id = member_network_id')->order('network_id ASC')->queryAll();
        //ayo kita rekap
        $mlm_entity = new mlmEntity();
        $mlm_node = new mlmNode($mlm_entity);
        $mlm_node->enableBonusTitik(TRUE)->setMaxLevel(10);
        //bonus pasangan
        $mlm_match = new mlmMatch($mlm_entity);
        //bonus sposnosr 
        $mlm_sponsor = new mlmSponsor($mlm_entity);
        
        foreach ($data_network as $row) {
            $mlm_entity->network_mid = $row['network_mid'];
            $mlm_entity->network_id = $row['network_id'];
            $mlm_entity->network_upline_network_id = $row['network_upline_network_id'];
            $mlm_entity->network_sponsor_network_id = $row['network_sponsor_network_id'];
            $mlm_node->updateNode($mlm_entity->network_id, $mlm_entity->network_upline_network_id, $row['tanggal'], 1);
            $mlm_match->updateMatch($row['tanggal']);
            $mlm_sponsor->updateSponsor($row['tanggal']);
        }
        $this->render('index');
    }

}