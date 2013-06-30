<?php

/**
 * This is the model class for table "gs_student_service".
 *
 * The followings are the available columns in table 'gs_student_service':
 * @property integer $ser_id
 * @property string $name_en
 * @property string $name_th
 * @property string $desc_en
 * @property string $desc_th
 * @property integer $ser_type_id
 * @property integer $ser_group
 * @property string $pdf_en
 * @property string $pdf_th
 * @property string $last_update
 * @property integer $counter
 * @property integer $sort_order
 * @property integer $status
 * @property integer $user_id
 * @property string $time_stamp
 */
class StudentService extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentService the static model class
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
		return 'gs_student_service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_en, name_th, ser_type_id, ser_group', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('ser_type_id, ser_group, counter, sort_order, status, user_id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th', 'length', 'max'=>255),
			array('desc_en, desc_th, last_update', 'safe'),
                        array('pdf_en,pdf_th', 'file', 'types'=>'pdf,zip', 'maxSize'=>1024 * 1024 * 15, 'tooLarge'=>'File has to be smaller than 15MB','allowEmpty'=>true) ,
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ser_id, name_en, name_th, desc_en, desc_th, ser_type_id, ser_group, pdf_en, pdf_th, last_update, counter, sort_order, status, user_id, time_stamp', 'safe', 'on'=>'search'),
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
                    'serType' => array(self::BELONGS_TO, 'StudentServiceType', 'ser_type_id'),
                    'serGroup' => array(self::BELONGS_TO, 'StudentServiceGroup', 'ser_group'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ser_id' => 'รหัส',
			'name_en' => 'ชื่อ (ภาษาอังกฤษ)',
			'name_th' => 'ชื่อ (ภาษาไทย)',
                    	'desc_en' => 'รายละเอียด (ภาษาอังกฤษ)',
			'desc_th' => 'รายละเอียด (ภาษาไทย)',
			'ser_type_id' => 'ประเภทบริการ',
			'ser_group' => 'กลุ่มประเภท',
			'pdf_en' => 'อัพโหลดไฟล์ (ภาษาอังกฤษ)',
			'pdf_th' => 'อัพโหลดไฟล์ (ภาษาไทย)',
			'last_update' => 'วันที่ปรับปรุงข้อมูล',
			'counter' => 'จำนวนผู้เข้าชม',
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

		$criteria->compare('ser_id',$this->ser_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('desc_th',$this->desc_th,true);
		$criteria->compare('ser_type_id',$this->ser_type_id);
		$criteria->compare('ser_group',$this->ser_group);
		$criteria->compare('pdf_en',$this->pdf_en,true);
		$criteria->compare('pdf_th',$this->pdf_th,true);
		$criteria->compare('last_update',$this->last_update,true);
		$criteria->compare('counter',$this->counter);
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