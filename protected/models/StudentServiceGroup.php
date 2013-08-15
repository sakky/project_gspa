<?php

/**
 * This is the model class for table "gs_student_service_group".
 *
 * The followings are the available columns in table 'gs_student_service_group':
 * @property integer $ser_group
 * @property string $ser_name
 */
class StudentServiceGroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentServiceGroup the static model class
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
		return 'gs_student_service_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ser_name,ser_name_en', 'required'),
			array('ser_name,ser_name_en', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ser_group, ser_name,ser_name_en', 'safe', 'on'=>'search'),
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
			'ser_group' => 'รหัสเมนูหลัก',
			'ser_name' => 'ชื่อเมนูหลัก (ภาษาไทย)',
                        'ser_name_en' => 'ชื่อเมนูหลัก (ภาษาอังกฤษ)',
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

		$criteria->compare('ser_group',$this->ser_group);
		$criteria->compare('ser_name',$this->ser_name,true);
                $criteria->compare('ser_name_en',$this->ser_name_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20),
		));
	}
}