<?php

/**
 * This is the model class for table "esto_student".
 *
 * The followings are the available columns in table 'esto_student':
 * @property integer $student_id
 * @property string $id_number
 * @property string $firstname
 * @property string $lastname
 * @property string $school
 * @property integer $level_id
 * @property string $email
 * @property string $phone
 * @property string $image
 * @property integer $credit
 *
 * The followings are the available model relations:
 * @property EstoOrder[] $estoOrders
 * @property EstoLevel $level
 * @property EstoTestRecord[] $estoTestRecords
 */
class SignupForm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SignupForm the static model class
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
		return 'esto_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstname, lastname, email, level_id, username, password', 'required','message'=>'กรุณาใส่ข้อมูล'),
                        array('firstname, lastname', 'length', 'max'=>42),
                        array('level_id', 'numerical', 'integerOnly'=>true),
                        array('email', 'email'),
                        array('username', 'unique'),
			array('username, password', 'length', 'max'=>20),

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
			'orders' => array(self::HAS_MANY, 'Order', 'student_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'testRecords' => array(self::HAS_MANY, 'TestRecord', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'firstname' => 'ชื่อ',
			'lastname' => 'นามสกุล',
                        'email' => 'Email',
                        'level_id' => 'ระดับชั้น',
                        'username' => 'ชื่อผู้ใช้',
			'password' => 'รหัสผ่าน',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
}