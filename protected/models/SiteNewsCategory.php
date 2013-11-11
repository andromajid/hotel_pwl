<?php

/**
 * This is the model class for table "site_news_category".
 *
 * The followings are the available columns in table 'site_news_category':
 * @property string $news_category_id
 * @property string $news_category_title
 * @property string $news_category_is_active
 */
class SiteNewsCategory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SiteNewsCategory the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'site_news_category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('news_category_title', 'length', 'max' => 100),
            array('news_category_is_active', 'length', 'max' => 1),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('news_category_id, news_category_title, news_category_is_active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'news' => array(self::HAS_MANY, 'SiteNews', 'news_news_category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'news_category_id' => 'News Category',
            'news_category_title' => 'News Category Title',
            'news_category_is_active' => 'News Category Is Active',
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

        $criteria->compare('news_category_id', $this->news_category_id, true);
        $criteria->compare('news_category_title', $this->news_category_title, true);
        $criteria->compare('news_category_is_active', $this->news_category_is_active, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}