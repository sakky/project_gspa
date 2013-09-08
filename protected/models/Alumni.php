<?php

/**
 * This is the model class for table "gs_alumni".
 *
 * The followings are the available columns in table 'gs_alumni':
 * @property integer $alumni_id
 * @property string $name_en
 * @property string $name_th
 * @property string $sex
 * @property string $image
 * @property string $major_en
 * @property string $major_th
 * @property string $campus_en
 * @property string $campus_th
 * @property string $position_en
 * @property string $position_th
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
class Alumni extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Alumni the static model class
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
		return 'gs_alumni';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_en, name_th, sex, alumni_group, alumni_no_id', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('sort_order, status, user_id, alumni_no_id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th, major_en, major_th, campus_en, campus_th, position_en, position_th', 'length', 'max'=>255),
			array('desc_en, desc_th, alumni_group, address', 'safe'),
			array('email', 'email'),
                        array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('alumni_id, name_en, name_th, sex, image, major_en, major_th, campus_en, campus_th, position_en, position_th, desc_en, desc_th, sort_order, status, email, address, user_id, time_stamp', 'safe', 'on'=>'search'),
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
                        'alumniType' => array(self::BELONGS_TO, 'AlumniNo', 'alumni_no_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'alumni_id' => 'รหัส',
                        'alumni_group' => 'ระดับ',
                        'alumni_no_id' => 'รุ่นที่จบ',
			'name_en' => 'ชื่อ-นามสกุล (ภาษาอังกฤษ)',
			'name_th' => 'ชื่อ-นามสกุล (ภาษาไทย)',
			'sex' => 'เพศ',
			'image' => 'รูปประจำตัว',
			'major_en' => 'สาขาวิชาที่จบ (ภาษาอังกฤษ)',
			'major_th' => 'สาขาวิชาที่จบ (ภาษาไทย)',
			'campus_en' => 'ศูนย์การศึกษา (ภาษาอังกฤษ)',
			'campus_th' => 'ศูนย์การศึกษา (ภาษาไทย)',
			'position_en' => 'ตำแหน่งงานปัจจุบัน (ภาษาอังกฤษ)',
			'position_th' => 'ตำแหน่งงานปัจจุบัน (ภาษาไทย)',
			'desc_en' => 'ประวัติโดยย่อ (ภาษาอังกฤษ)',
			'desc_th' => 'ประวัติโดยย่อ (ภาษาไทย)',
			'sort_order' => 'การเรียงลำดับ',
			'status' => 'สถานะ',
			'email' => 'อีเมล์',
			'address' => 'ที่อยู่',
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

		$criteria->compare('alumni_id',$this->alumni_id);
                $criteria->compare('alumni_group',$this->alumni_group,true);
                $criteria->compare('alumni_no_id',$this->alumni_no_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('major_en',$this->major_en,true);
		$criteria->compare('major_th',$this->major_th,true);
		$criteria->compare('campus_en',$this->campus_en,true);
		$criteria->compare('campus_th',$this->campus_th,true);
		$criteria->compare('position_en',$this->position_en,true);
		$criteria->compare('position_th',$this->position_th,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('desc_th',$this->desc_th,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('time_stamp',$this->time_stamp,true);

                
                
                
                $data = new CActiveDataProvider(get_class($this), array(
                        'pagination'=>array('pageSize'=> Yii::app()->user->getState('pageSize',
                                                                        Yii::app()->params['itemsPerPage']),),
                        
                        
                        'criteria'=>$criteria,
                ));

                $_SESSION['Filtered_Excel']=$data; // get all data and filtered data :)

               return $data;
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//                        'pagination'=>array('pageSize'=> 20),
//		));
	}
}