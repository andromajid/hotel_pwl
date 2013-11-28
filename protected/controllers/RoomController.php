<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RoomController
 *
 * @author andro
 */
class RoomController extends CController {
    //put your code here
    public function actionShow() {
        $id = $_GET['id'];
        $model = HotelRoom::model()->findByPk($id);
        if($model == null)
            throw new Exception ('room doesnt exist', 404);
        $image = HotelRoomImage::model()->findAll('hotel_room_image_hotel_room_id = :room_id', array(':room_id' => $id));
        if(isset($_GET['ajax'])) {
            $this->renderPartial('view_room', array('room' => $model, 'image' => $image));
        } else 
            $this->render('view_room', array('room' => $model, 'image' => $image));
    }
}

?>
