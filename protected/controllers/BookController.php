<?php

class BookController extends CController {

    public function actionIndex() {
        $model = new HotelBooking;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['HotelBooking'])) {
            $model->attributes = $_POST['HotelBooking'];
            if($model->validate()) {
                $model->save(false);
                Yii::app()->user->setFlash('message', 'The booking data has been submitted, we will call you right away.');
            }
        }

        $this->render('book', array(
            'model' => $model,
        ));
    }

}