<?php

/**
 * This is the model class for table "gs_program".
 *
 * The followings are the available columns in table 'gs_program':
 * @property integer $program_id
 * @property string $program_type
 * @property string $name_en
 * @property string $name_th
 * @property string $desc_en
 * @property string $desc_th
 * @property string $pdf_en
 * @property string $pdf_th
 * @property integer $sort_order
 * @property integer $status
 * @property integer $user_id
 * @property string $time_stamp
 *
 * The followings are the available model relations:
 * @property GsUser $user
 */
class Program extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Program the static model class
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
		return 'gs_program';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('program_type, name_en, name_th', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('sort_order, status, user_id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th, pdf_en, pdf_th', 'length', 'max'=>255),
			array('desc_en, desc_th', 'safe'),
                        array('pdf_en, pdf_th', 'file', 'types'=>'pdf', 'maxSize'=>1024 * 1024 * 10, 'tooLarge'=>'File has to be smaller than 10MB','allowEmpty'=>true) ,
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('program_id, program_type, name_en, name_th, desc_en, desc_th, pdf_en, pdf_th, sort_order, status, user_id, time_stamp', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'program_id' => 'รหัส',
			'program_type' => 'ประเภทหลักสูตร',
			'name_en' => 'ชื่อหลักสูตร (ภาษาอังกฤษ)',
			'name_th' => 'ชื่อหลักสูตร (ภาษาไทย)',
			'desc_en' => 'รายละเอียด (ภาษาอังกฤษ)',
			'desc_th' => 'รายละเอียด (ภาษาไทย)',
			'pdf_en' => 'ไฟล์ PDF (ภาษาอังกฤษ)',
			'pdf_th' => 'ไฟล์ PDF(ภาษาไทย)',
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

		$criteria->compare('program_id',$this->program_id);
		$criteria->compare('program_type',$this->program_type,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('desc_th',$this->desc_th,true);
		$criteria->compare('pdf_en',$this->pdf_en,true);
		$criteria->compare('pdf_th',$this->pdf_th,true);
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