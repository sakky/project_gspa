<?php

/**
 * This is the model class for table "gs_directline".
 *
 * The followings are the available columns in table 'gs_directline':
 * @property integer $direct_id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 */
class Directline extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Directline the static model class
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
		return 'gs_directline';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, subject, message', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('name, subject', 'length', 'max'=>255),
			array('email', 'length', 'max'=>100),
                        array('email', 'email','message'=>'{attribute} รูปแบบอีเมล์ไม่ถูกต้อง'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('direct_id, name, email, subject, message', 'safe', 'on'=>'search'),
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
			'direct_id' => 'Direct',
			'name' => 'ชื่อผู้ติดต่อ',
			'email' => 'อีเมล์ผู้ติดต่อ',
			'subject' => 'ชื่อเรื่องที่ติดต่อ',
			'message' => 'ข้อความ',
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

		$criteria->compare('direct_id',$this->direct_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message',$this->message,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20),
		));
	}
}