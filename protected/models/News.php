<?php

/**
 * This is the model class for table "gs_news".
 *
 * The followings are the available columns in table 'gs_news':
 * @property integer $news_id
 * @property integer $news_type_id
 * @property string $name_en
 * @property string $name_th
 * @property string $title_en
 * @property string $title_th
 * @property string $desc_en
 * @property string $desc_th
 * @property string $image
 * @property string $create_date
 * @property integer $show_homepage
 * @property integer $show_new
 * @property integer $status
 * @property integer $user_id
 * @property string $time_stamp
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'gs_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('news_type_id, name_en, name_th,title_en,title_th,create_date, status,', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('news_type_id, show_homepage, show_new, status, user_id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th, image', 'length', 'max'=>255),
			array('title_en, title_th, desc_en, desc_th, create_date', 'safe'),
                        array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('news_id, news_type_id, name_en, name_th, title_en, title_th, desc_en, desc_th, image, create_date, show_homepage, show_new, status, user_id, time_stamp', 'safe', 'on'=>'search'),
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
                    'newsType' => array(self::BELONGS_TO, 'NewsType', 'news_type_id', 'joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'news_id' => 'รหัส',
			'news_type_id' => 'ประเภทข่าว',
			'name_en' => 'หัวข้อข่าว (ภาษาอังกฤษ)',
			'name_th' => 'หัวข้อข่าว (ภาษาไทย)',
			'title_en' => 'คำบรรยาย (ภาษาอังกฤษ)',
			'title_th' => 'คำบรรยาย (ภาษาไทย)',
			'desc_en' => 'รายละเอียด (ภาษาอังกฤษ)',
			'desc_th' => 'รายละเอียด (ภาษาไทย)',
			'image' => 'รูปภาพ Thumbnail',
			'create_date' => 'วันที่สร้าง',
			'show_homepage' => 'แสดงในหน้าแรก',
			'show_new' => 'แสดงไอคอน New',
			'status' => 'สถานะ',
			'user_id' => 'User',
			'time_stamp' => 'Time Stamp',
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

		$criteria->compare('news_id',$this->news_id);
		$criteria->compare('news_type_id',$this->news_type_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('title_th',$this->title_th,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('desc_th',$this->desc_th,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('show_homepage',$this->show_homepage);
		$criteria->compare('show_new',$this->show_new);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('time_stamp',$this->time_stamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20),
		));
	}
}