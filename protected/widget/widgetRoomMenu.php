<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of widgetRoom
 *
 * @author andro
 */
class widgetRoomMenu extends CWidget{
    //put your code here
    public function run() {
        $data_all_room = Yii::app()->db->createCommand()->select('hotel_room_name, hotel_room_id')->from('hotel_room')->queryAll();
        $this->render('view_widget_room_menu', array('data' => $data_all_room));
    }
}

?>
