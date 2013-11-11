<?php

/**
 * This is the model class for table "site_support".
 *
 * The followings are the available columns in table 'site_support':
 * @property integer $support_id
 * @property string $support_name
 * @property string $support_nick
 * @property string $support_phone
 */
class SiteSupport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SiteSupport the static model class
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
		return 'site_support';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('support_name, support_nick, support_phone', 'required'),
			array('support_name, support_nick, support_phone', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('support_id, support_name, support_nick, support_phone', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'support_id' => 'Support',
			'support_name' => 'Nama Support',
			'support_nick' => 'Nama ID Yahoo',
			'support_phone' => 'Nomer Telepon',
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

		$criteria->compare('support_id',$this->support_id);
		$criteria->compare('support_name',$this->support_name,true);
		$criteria->compare('support_nick',$this->support_nick,true);
		$criteria->compare('support_phone',$this->support_phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}