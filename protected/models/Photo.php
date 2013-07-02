<?php

/**
 * This is the model class for table "gs_photo".
 *
 * The followings are the available columns in table 'gs_gallery':
 * @property integer $gallery_id
 * @property string $name_en
 * @property string $name_th
 * @property string $desc_en
 * @property string $desc_th
 * @property string $image
 * @property integer $sort_order
 * @property integer $status
 * @property integer $user_id
 * @property string $time_stamp
 */
class Photo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gallery the static model class
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
		return 'gs_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
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
			'gallery_id' => 'รหัส',
			'name_en' => 'ชื่ออัลบั้ม (ภาษาอังกฤษ)',
			'name_th' => 'ชื่ออัลบั้ม (ภาษาไทย)',
			'desc_en' => 'รายละเอียดอัลบั้ม (ภาษาอังกฤษ)',
			'desc_th' => 'รายละเอียดอัลบั้ม (ภาษาไทย)',
			'image' => 'ภาพหน้าปก',
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
	public function getPhotoByAlbum($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

                $criteria = new CDbCriteria();
                $criteria->condition = "album_id = '$id'";
                $criteria->order = "id asc";
                $model = Photo::model()->findAll($criteria);

		return $model;
	}

}