<?php

/**
 * This is the model class for table "site_news".
 *
 * The followings are the available columns in table 'site_news':
 * @property string $news_id
 * @property string $news_news_category_id
 * @property string $news_admin_id
 * @property string $news_source
 * @property string $news_title
 * @property string $news_subtitle
 * @property string $news_short_content
 * @property string $news_content
 * @property string $news_image
 * @property string $news_is_active
 * @property string $news_input_datetime
 */
class SiteNews extends CActiveRecord
{
    public $administrator_username;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SiteNews the static model class
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
		return 'site_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('news_news_category_id, news_title, news_content', 'required'),
			array('news_news_category_id', 'length', 'max'=>11),
			array('news_admin_id', 'length', 'max'=>10),
			array('news_source, news_image', 'length', 'max'=>255),
			array('news_title, news_subtitle', 'length', 'max'=>100),
			array('news_is_active', 'length', 'max'=>1),
			array('news_short_content, news_video_url, news_input_datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('news_video_url, news_id, news_news_category_id, news_admin_id, news_source, news_title, news_subtitle, news_short_content, news_content, news_image, news_is_active, news_input_datetime', 'safe', 'on'=>'search'),
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
                    'category' => array(self::BELONGS_TO, 'SiteNewsCategory', 'news_news_category_id'),
                    'admin' => array(self::BELONGS_TO, 'SiteAdministrator', 'news_admin_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'news_id' => 'News',
			'news_news_category_id' => 'News News Category',
			'news_admin_id' => 'News Admin',
			'news_source' => 'Sumber',
			'news_title' => 'Judul',
			'news_subtitle' => 'News Subtitle',
			'news_short_content' => 'Konten Singkat',
			'news_content' => 'Konten Utama',
			'news_image' => 'Gambar ',
			'news_is_active' => 'Tampilkan',
			'news_input_datetime' => 'Tgl',
			'news_video_url' => 'Alamat Video',
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

		$criteria->compare('news_id',$this->news_id,true);
		$criteria->compare('news_news_category_id',$this->news_news_category_id,true);
		$criteria->compare('news_admin_id',$this->news_admin_id,true);
		$criteria->compare('news_source',$this->news_source,true);
		$criteria->compare('news_title',$this->news_title,true);
		$criteria->compare('news_subtitle',$this->news_subtitle,true);
		$criteria->compare('news_short_content',$this->news_short_content,true);
		$criteria->compare('news_content',$this->news_content,true);
		$criteria->compare('news_image',$this->news_image,true);
		$criteria->compare('news_is_active',$this->news_is_active,true);
		$criteria->compare('news_input_datetime',$this->news_input_datetime,true);
		$criteria->compare('news_video_url',$this->news_video_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}