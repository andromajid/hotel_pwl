<?php

/**
 * This is the model class for table "site_gallery_category".
 *
 * The followings are the available columns in table 'site_gallery_category':
 * @property string $gallery_category_id
 * @property string $gallery_category_title
 * @property string $gallery_category_description
 * @property string $gallery_category_is_active
 * @property string $gallery_category_image
 * @property integer $gallery_category_is_delete
 */
class SiteGalleryCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SiteGalleryCategory the static model class
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
		return 'site_gallery_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_category_is_delete', 'numerical', 'integerOnly'=>true),
			array('gallery_category_title', 'length', 'max'=>100),
			array('gallery_category_is_active', 'length', 'max'=>1),
			//array('gallery_category_image', 'length', 'max'=>200),
			array('gallery_category_description', 'safe'),
                        array('gallery_category_image', 'file', 'allowEmpty'=>true, 'types'=>'jpg,gif,png', 'maxSize'=>409600,'tooLarge'=>'Ukuran File terlalu besar. Maksimal ukuran file diijinkan 400kb.'),
            
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gallery_category_id, gallery_category_title, gallery_category_description, gallery_category_is_active, gallery_category_image, gallery_category_is_delete', 'safe', 'on'=>'search'),
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
			'gallery_category_id' => 'Gallery Category',
			'gallery_category_title' => 'Kategori',
			'gallery_category_description' => 'Deskripsi',
			'gallery_category_is_active' => 'Status',
			'gallery_category_image' => 'Gambar',
			'gallery_category_is_delete' => 'Delete',
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

		$criteria->compare('gallery_category_id',$this->gallery_category_id,true);
		$criteria->compare('gallery_category_title',$this->gallery_category_title,true);
		$criteria->compare('gallery_category_description',$this->gallery_category_description,true);
		$criteria->compare('gallery_category_is_active',$this->gallery_category_is_active,true);
		$criteria->compare('gallery_category_image',$this->gallery_category_image,true);
		$criteria->compare('gallery_category_is_delete',$this->gallery_category_is_delete);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}