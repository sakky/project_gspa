<?php

/**
 * This is the model class for table "gs_slide".
 *
 * The followings are the available columns in table 'gs_slide':
 * @property integer $slide_id
 * @property string $short_name_en
 * @property string $short_name_th
 * @property string $title_en
 * @property string $title_th
 * @property string $desc_en
 * @property string $desc_th
 * @property string $link_en
 * @property string $link_th
 * @property string $image
 * @property integer $sort_order
 * @property integer $status
 * @property integer $user_id
 * @property string $time_stamp
 */
class Slide extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Slide the static model class
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
		return 'gs_slide';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_en, title_th, sort_order,status', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('sort_order, status, user_id', 'numerical', 'integerOnly'=>true),
			array('title_en, title_th', 'length', 'max'=>100),
			array('desc_en, desc_th, link_en, link_th, image', 'length', 'max'=>255),
                        array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('slide_id, title_en, title_th, desc_en, desc_th, link_en, link_th, image, sort_order, status', 'safe', 'on'=>'search'),
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
			'slide_id' => 'ID',
			'title_en' => 'Title (English)',
			'title_th' => 'Title (Thai)',
			'desc_en' => 'Description (English)',
			'desc_th' => 'Description (Thai)',
			'link_en' => 'Link (English)',
			'link_th' => 'Link (Thai)',
			'image' => 'Image',
			'sort_order' => 'Sort Order',
			'status' => 'Status',
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

		$criteria->compare('slide_id',$this->slide_id);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('title_th',$this->title_th,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('desc_th',$this->desc_th,true);
		$criteria->compare('link_en',$this->link_en,true);
		$criteria->compare('link_th',$this->link_th,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('time_stamp',$this->time_stamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}
}