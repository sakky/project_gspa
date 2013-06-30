<?php

/**
 * This is the model class for table "gs_cooperation".
 *
 * The followings are the available columns in table 'gs_cooperation':
 * @property integer $co_id
 * @property string $name_en
 * @property string $name_th
 * @property string $desc_en
 * @property string $desc_th
 * @property integer $sort_order
 * @property integer $status
 * @property integer $user_id
 * @property string $time_stamp
 *
 * The followings are the available model relations:
 * @property GsUser $user
 */
class Cooperation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cooperation the static model class
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
		return 'gs_cooperation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_en, name_th, co_type_id, group', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('sort_order, status, user_id, co_type_id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th', 'length', 'max'=>255),
			array('desc_en, desc_th, group', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('co_id, name_en, name_th, desc_en, desc_th, sort_order, status, user_id, time_stamp', 'safe', 'on'=>'search'),
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
                        'coType' => array(self::BELONGS_TO, 'CooperationType', 'co_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'co_id' => 'รหัส',
                        'group' => 'กลุ่มความร่วมมือ',
                        'co_type_id' => 'ประเภท',
			'name_en' => 'ชื่อเรื่อง (ภาษาอังกฤษ)',
			'name_th' => 'ชื่อเรื่อง (ภาษาไทย)',
			'desc_en' => 'รายละเอียด (ภาษาอังกฤษ)',
			'desc_th' => 'รายละเอียด (ภาษาไทย)',
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

		$criteria->compare('co_id',$this->co_id);
                $criteria->compare('group',$this->group,true);
                $criteria->compare('co_type_id',$this->co_type_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('desc_th',$this->desc_th,true);
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