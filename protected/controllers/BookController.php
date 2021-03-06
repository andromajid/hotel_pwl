<?php

class BookController extends CController {

    public function actionIndex() {
        $model = new HotelBooking;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['HotelBooking'])) {
            $model->attributes = $_POST['HotelBooking'];
            if($model->validate()) {
                $model->hotel_booking_hotel_room_id = $_POST['HotelBooking']['hotel_booking_hotel_room_id'];
                $model->save(false);
                Yii::app()->user->setFlash('message', 'The booking data has been submitted, we will call you right away.');
                $this->refresh();
            }
        }

        $this->render('book', array(
            'model' => $model,
        ));
    }

}