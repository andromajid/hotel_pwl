<?php

/**
 * This is the model class for table "hotel_booking".
 *
 * The followings are the available columns in table 'hotel_booking':
 * @property integer $hotel_booking_id
 * @property string $hotel_boking_start_date
 * @property string $hotel_boking_end_date
 * @property string $hotel_boking_name
 * @property string $hotel_boking_phone
 * @property string $hotel_boking_email
 * @property String $hotel_boking_notes Description
 * @property integer $hotel_booking_hotel_room_id
 */
class HotelBooking extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return HotelBooking the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'hotel_booking';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('hotel_boking_name, hotel_boking_phone, hotel_boking_start_date, hotel_boking_end_date', 'required'),
            array('hotel_boking_name, hotel_boking_email', 'length', 'max' => 255),
            array('hotel_boking_phone', 'length', 'max' => 63),
            array('hotel_boking_start_date, hotel_boking_end_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('hotel_booking_id, hotel_boking_start_date, hotel_booking_notes, hotel_boking_end_date, hotel_boking_name, hotel_boking_phone, hotel_boking_email, hotel_booking_hotel_room_id, hotel_booking_is_checked', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'HotelBookingRoom' => array(self::BELONGS_TO, 'HotelRoom', 'hotel_booking_hotel_room_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'hotel_booking_id' => 'Hotel Booking',
            'hotel_boking_start_date' => 'Check-In',
            'hotel_boking_end_date' => 'Check-Out',
            'hotel_boking_name' => 'Name',
            'hotel_boking_phone' => 'Phone Number',
            'hotel_boking_email' => 'Email',
            'hotel_booking_hotel_room_id' => 'Hotel Room',
            'hotel_booking_notes' => 'notes',
            'hotel_booking_is_checked' => 'checked'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('hotel_booking_id', $this->hotel_booking_id);
        $criteria->compare('hotel_boking_start_date', $this->hotel_boking_start_date, true);
        $criteria->compare('hotel_boking_end_date', $this->hotel_boking_end_date, true);
        $criteria->compare('hotel_boking_name', $this->hotel_boking_name, true);
        $criteria->compare('hotel_boking_phone', $this->hotel_boking_phone, true);
        $criteria->compare('hotel_boking_email', $this->hotel_boking_email, true);
        $criteria->compare('hotel_booking_hotel_room_id', $this->hotel_booking_hotel_room_id);
        $criteria->compare('hotel_booking_is_checked', $this->hotel_booking_is_checked, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}