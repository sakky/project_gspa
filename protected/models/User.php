<?php

/**
 * This is the model class for table "esto_user".
 *
 * The followings are the available columns in table 'esto_user':
 * @property integer $user_id
 * @property integer $user_group_id
 * @property integer $student_id
 * @property string $username
 * @property string $password
 * @property string $date_added
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Information[] $informations
 * @property UserGroup $userGroup
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'gs_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_group_id,  username, password, status', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('user_group_id,  status', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('username', 'unique'),
			array('password', 'length', 'max'=>32),
                        array('firstname,lastname', 'length', 'max'=>255),
			array('create_date,last_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, user_group_id,  username, firstname, lastname, create_date, status', 'safe', 'on'=>'search'),
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
			'userGroup' => array(self::BELONGS_TO, 'UserGroup', 'user_group_id', 'joinType'=>'INNER JOIN'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'user_group_id' => 'User Group',
			'username' => 'Username',
			'password' => 'Password',
			'firstname' => 'Firstname',
                        'lastname' => 'Lastname',
			'create_date' => 'Register Date',
                        'last_login' => 'Last Login',
			'status' => 'Status',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_group_id',$this->user_group_id);
                $criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}
}