<?php

/**
 * This is the model class for table "gs_link".
 *
 * The followings are the available columns in table 'gs_link':
 * @property integer $link_id
 * @property integer $name_en
 * @property integer $name_th
 * @property integer $link_en
 * @property integer $link_th
 * @property string $type
 * @property integer $sort_order
 * @property integer $status
 * @property integer $user_id
 * @property string $time_stamp
 */
class Link extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Link the static model class
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
		return 'gs_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_en, name_th, link_en, link_th', 'required','message'=>'{attribute} ห้ามว่าง'),
                    	array('name_en, name_th, link_en, link_th', 'length', 'max'=>255),
			array('sort_order, status, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('link_id, name_en, name_th, link_en, link_th, sort_order, status, user_id, time_stamp', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'link_id' => 'รหัส',
			'name_en' => 'ชื่อลิงค์ (ภาษาอังกฤษ)',
			'name_th' => 'ชื่อลิงค์ (ภาษาไทย)',
			'link_en' => 'ลิงค์ (หน้าภาษาอังกฤษ)',
			'link_th' => 'ลิงค์ (หน้าภาษาไทย)',
			'sort_order' => 'การเรียงลำดับ',
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

		$criteria->compare('link_id',$this->link_id);
		$criteria->compare('name_en',$this->name_en);
		$criteria->compare('name_th',$this->name_th);
		$criteria->compare('link_en',$this->link_en);
		$criteria->compare('link_th',$this->link_th);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('time_stamp',$this->time_stamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20),
		));
	}
}