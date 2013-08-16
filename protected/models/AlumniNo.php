<?php

/**
 * This is the model class for table "gs_alumni_no".
 *
 * The followings are the available columns in table 'gs_alumni_no':
 * @property integer $alumni_no_id
 * @property string $name_en
 * @property string $name_th
 * @property string $alumni_group
 * @property integer $sort_order
 * @property integer $status
 */
class AlumniNo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AlumniNo the static model class
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
		return 'gs_alumni_no';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_en, name_th, alumni_group, sort_order, status', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('sort_order, status', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th', 'length', 'max'=>255),
			array('alumni_group', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('alumni_no_id, name_en, name_th, alumni_group, sort_order, status', 'safe', 'on'=>'search'),
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
			'alumni_no_id' => 'รหัส',
                        'name_en' => 'ชื่อรุ่น (ภาษาอังกฤษ)',
			'name_th' => 'ชื่อรุ่น (ภาษาไทย)',
			'alumni_group' => 'ระดับ',
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

		$criteria->compare('alumni_no_id',$this->alumni_no_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('alumni_group',$this->alumni_group,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}