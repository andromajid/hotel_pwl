<?php

/**
 * This is the model class for table "site_gallery".
 *
 * The followings are the available columns in table 'site_gallery':
 * @property string $gallery_id
 * @property string $gallery_gallery_category_id
 * @property string $gallery_admin_id
 * @property string $gallery_title
 * @property string $gallery_content
 * @property string $gallery_image
 * @property string $gallery_is_active
 * @property string $gallery_input_datetime
 * @property integer $gallery_is_top
 *
 * The followings are the available model relations:
 * @property SiteGallery $galleryGalleryCategory
 * @property SiteGallery[] $siteGalleries
 */
class SiteGallery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SiteGallery the static model class
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
		return 'site_gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_gallery_category_id, gallery_title, gallery_content', 'required'),
			array('gallery_is_top', 'numerical', 'integerOnly'=>true),
			array('gallery_gallery_category_id', 'length', 'max'=>11),
			array('gallery_admin_id', 'length', 'max'=>10),
			array('gallery_title', 'length', 'max'=>100),
			
                        array('gallery_is_active', 'length', 'max'=>1),
			array('gallery_input_datetime', 'safe'),
			array('gallery_url', 'safe'),
			 array('gallery_image', 'file', 'allowEmpty'=>true, 'types'=>'jpeg,jpg,gif,png', 'maxSize'=>409600,'tooLarge'=>'Ukuran File terlalu besar. Maksimal ukuran file diijinkan 400kb.'),
            
                            // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gallery_url, gallery_id, gallery_gallery_category_id, gallery_admin_id, gallery_title, gallery_content, gallery_image, gallery_is_active, gallery_input_datetime, gallery_is_top', 'safe', 'on'=>'search'),
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
			'rel_gallery_to_category' => array(self::BELONGS_TO, 'SiteGalleryCategory', 'gallery_gallery_category_id'),
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gallery_id' => 'Gallery',
			'gallery_gallery_category_id' => 'Category',
			'gallery_admin_id' => 'Admin',
			'gallery_title' => 'Judul',
			'gallery_content' => 'Konten',
			'gallery_image' => 'Gambar',
			'gallery_url' => 'Url',
			'gallery_is_active' => 'Tampilkan?',
			'gallery_input_datetime' => 'Tanggal Dibuat',
			'gallery_is_top' => 'Unggulan / Umum?',
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
                
		$criteria->compare('gallery_id',$this->gallery_id,true);
		$criteria->compare('gallery_gallery_category_id',$this->gallery_gallery_category_id,true);
		$criteria->compare('gallery_admin_id',$this->gallery_admin_id,true);
		$criteria->compare('gallery_title',$this->gallery_title,true);
		$criteria->compare('gallery_content',$this->gallery_content,true);
		$criteria->compare('gallery_image',$this->gallery_image,true);
		$criteria->compare('gallery_is_active',$this->gallery_is_active,true);
		$criteria->compare('gallery_input_datetime',$this->gallery_input_datetime,true);
		$criteria->compare('gallery_is_top',$this->gallery_is_top);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}