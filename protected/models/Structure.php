<?php

/**
 * This is the model class for table "gs_structure".
 *
 * The followings are the available columns in table 'gs_structure':
 * @property integer $str_id
 * @property integer $str_type_id
 * @property string $name_en
 * @property string $name_th
 * @property string $position_en
 * @property string $position_th
 * @property string $sex
 * @property string $image
 * @property integer $sort_order
 * @property integer $status
 * @property string $time_stamp
 * @property integer $user_id
 */
class Structure extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Structure the static model class
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
		return 'gs_structure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('str_type_id, name_en, name_th', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('str_type_id, sort_order, status, user_id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th, position_en, position_th, image', 'length', 'max'=>255),
			array('sex', 'length', 'max'=>1),
			array('time_stamp', 'safe'),
                        array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('str_id, str_type_id, name_en, name_th, position_en, position_th, sex, image, sort_order, status, time_stamp, user_id', 'safe', 'on'=>'search'),
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
                    'structureType' => array(self::BELONGS_TO, 'StructureType', 'str_type_id'),
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'str_id' => 'รหัส',
			'str_type_id' => 'ประเภทโครงสร้างหน่วย',
			'name_en' => 'ชื่อ-นามสกุล (ภาษาอังกฤษ)',
			'name_th' => 'ชื่อ-นามสกุล (ภาษาไทย)',
			'position_en' => 'ตำแหน่ง (ภาษาอังกฤษ)',
			'position_th' => 'ตำแหน่ง (ภาษาไทย)',
			'sex' => 'เพศ',
			'image' => 'รูปประจำตัว',
			'sort_order' => 'ลำดับ',
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

		$criteria->compare('str_id',$this->str_id);
		$criteria->compare('str_type_id',$this->str_type_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('position_en',$this->position_en,true);
		$criteria->compare('position_th',$this->position_th,true);
		$criteria->compare('sex',$this->sex,true);
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