<?php

/**
 * This is the model class for table "gs_event".
 *
 * The followings are the available columns in table 'gs_event':
 * @property integer $event_id
 * @property string $event_title_en
 * @property string $event_title_th
 * @property string $event_start
 * @property string $event_end
 * @property string $event_url
 * @property string $event_location
 * @property integer $event_status
 */
class Event extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Event the static model class
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
		return 'gs_event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_title_en, event_title_th, event_start, event_status', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('event_status', 'numerical', 'integerOnly'=>true),
			array('event_title_en, event_title_th, event_url, location_en, location_th', 'length', 'max'=>255),
			array('event_end', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('event_id, event_title_en, event_title_th, event_start, event_end, event_url, location_en, location_th, event_status', 'safe', 'on'=>'search'),
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
			'event_id' => 'รหัสกิจกรรม',
			'event_title_en' => 'ชื่อกิจกรรม (ภาษาอังกฤษ)',
			'event_title_th' => 'ชื่อกิจกรรม (ภาษาไทย)',
			'event_start' => 'วันที่เริ่ม',
			'event_end' => 'วันที่สิ้นสุด',
			'event_url' => 'ลิงค์ที่เกี่ยวข้อง',
                        'location_en' => 'สถานที่ (ภาษาอังกฤษ)',
                        'location_th' => 'สถานที่ (ภาษาไทย)',
			'event_status' => 'สถานะ',
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

		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('event_title_en',$this->event_title_en,true);
		$criteria->compare('event_title_th',$this->event_title_th,true);
		$criteria->compare('event_start',$this->event_start,true);
		$criteria->compare('event_end',$this->event_end,true);
		$criteria->compare('event_url',$this->event_url,true);
                $criteria->compare('location_en',$this->location_en,true);
                $criteria->compare('location_th',$this->location_th,true);
		$criteria->compare('event_status',$this->event_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20),
		));
	}
}