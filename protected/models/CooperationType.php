<?php

/**
 * This is the model class for table "gs_cooperation_type".
 *
 * The followings are the available columns in table 'gs_cooperation_type':
 * @property integer $co_type_id
 * @property string $name_en
 * @property string $name_th
 * @property string $group
 * @property string $sort_order
 * @property integer $status
 */
class CooperationType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CooperationType the static model class
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
		return 'gs_cooperation_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_en, name_th, group, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th', 'length', 'max'=>255),
			array('group', 'length', 'max'=>8),
			array('sort_order', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('co_type_id, name_en, name_th, group, sort_order, status', 'safe', 'on'=>'search'),
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
			'co_type_id' => 'รหัส',
			'name_en' => 'ชื่อประเภท (ภาษาอังกฤษ)',
			'name_th' => 'ชื่อประเภท (ภาษาไทย)',
			'group' => 'กลุ่มความร่วมมือ',
			'sort_order' => 'การเรียงลำดับ',
			'status' => 'สถานะ',
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

		$criteria->compare('co_type_id',$this->co_type_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('group',$this->group,true);
		$criteria->compare('sort_order',$this->sort_order,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20),
		));
	}
}