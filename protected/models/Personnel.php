<?php

/**
 * This is the model class for table "gs_personnel".
 *
 * The followings are the available columns in table 'gs_personnel':
 * @property integer $personnel_id
 * @property integer $personnel_type_id
 * @property string $name_en
 * @property string $name_th
 * @property string $sex
 * @property string $position_en
 * @property string $position_th
 * @property string $detail_en
 * @property string $detail_th
 * @property string $image
 * @property integer $sort_order
 * @property integer $status
 * @property string $time_stamp
 * @property integer $user_id
 */
class Personnel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Personnel the static model class
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
		return 'gs_personnel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('personnel_type_id, name_en, name_th, sex', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('personnel_type_id, sort_order, status, user_id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th, position_en, position_th, image', 'length', 'max'=>255),
			array('sex', 'length', 'max'=>1),
			array('detail_en, detail_th', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('personnel_id, personnel_type_id, name_en, name_th, sex, position_en, position_th, detail_en, detail_th, image, sort_order, status, time_stamp, user_id', 'safe', 'on'=>'search'),
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
                        'personnelType' => array(self::BELONGS_TO, 'personnelType', 'personnel_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'personnel_id' => 'รหัส',
			'personnel_type_id' => 'ประเภทบุคลากร',
			'name_en' => 'ชื่อ-นามสกุล (ภาษาอังกฤษ)',
			'name_th' => 'ชื่อ-นามสกุล (ภาษาไทย)',
			'sex' => 'เพศ',
			'position_en' => 'ตำแหน่ง (ภาษาอังกฤษ)',
			'position_th' => 'ตำแหน่ง (ภาษาไทย)',
                        'detail_en' => 'รายละเอียด (ภาษาอังกฤษ)',
			'detail_th' => 'รายละเอียด (ภาษาไทย)',
			'image' => 'รูปประจำตัว',
			'sort_order' => 'การเรียงลำดับ',
			'status' => 'สถานะ',
			'time_stamp' => 'Time Stamp',
			'user_id' => 'User',
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

		$criteria->compare('personnel_id',$this->personnel_id);
		$criteria->compare('personnel_type_id',$this->personnel_type_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('position_en',$this->position_en,true);
		$criteria->compare('position_th',$this->position_th,true);
		$criteria->compare('detail_en',$this->detail_en,true);
		$criteria->compare('detail_th',$this->detail_th,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);
		$criteria->compare('time_stamp',$this->time_stamp,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20),
		));
	}
}