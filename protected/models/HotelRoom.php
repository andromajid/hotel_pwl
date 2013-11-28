<?php

/**
 * This is the model class for table "hotel_room".
 *
 * The followings are the available columns in table 'hotel_room':
 * @property integer $hotel_room_id
 * @property string $hotel_room_description
 * @property integer $hotel_room_rate
 * @property string $hotel_room_facility
 * @property string $hotel_room_name
 *
 * The followings are the available model relations:
 * @property HotelRoomImage[] $hotelRoomImages
 */
class HotelRoom extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HotelRoom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hotel_room';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_room_name', 'required'),
			array('hotel_room_rate', 'numerical', 'integerOnly'=>true),
			array('hotel_room_name', 'length', 'max'=>2255),
			array('hotel_room_description, hotel_room_facility', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('hotel_room_id, hotel_room_description, hotel_room_rate, hotel_room_facility, hotel_room_name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'hotelRoomImages' => array(self::HAS_MANY, 'HotelRoomImage', 'hotel_room_image_hotel_room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'hotel_room_id' => 'Hotel Room',
			'hotel_room_description' => 'Hotel Room Description',
			'hotel_room_rate' => 'Hotel Room Rate',
			'hotel_room_facility' => 'Hotel Room Facility',
			'hotel_room_name' => 'Hotel Room Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('hotel_room_id',$this->hotel_room_id);
		$criteria->compare('hotel_room_description',$this->hotel_room_description,true);
		$criteria->compare('hotel_room_rate',$this->hotel_room_rate);
		$criteria->compare('hotel_room_facility',$this->hotel_room_facility,true);
		$criteria->compare('hotel_room_name',$this->hotel_room_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}