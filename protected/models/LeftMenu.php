<?php

/**
 * This is the model class for table "gs_left_menu".
 *
 * The followings are the available columns in table 'gs_left_menu':
 * @property integer $left_menu_id
 * @property integer $page_type_id
 * @property string $name_en
 * @property string $name_th
 * @property integer $sort_order
 * @property integer $status
 * @property integer $user_id
 * @property string $time_stamp
 *
 * The followings are the available model relations:
 * @property GsUser $user
 * @property GsPageType $pageType
 */
class LeftMenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LeftMenu the static model class
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
		return 'gs_left_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_type_id, name_en, name_th, show_type', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('page_type_id, sort_order, status, user_id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th,link', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('left_menu_id, page_type_id, name_en, name_th, show_type, sort_order, status, user_id, time_stamp', 'safe', 'on'=>'search'),
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
                    'pageType' => array(self::BELONGS_TO, 'PageType', 'page_type_id', 'joinType'=>'INNER JOIN'),
                    'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'left_menu_id' => 'ID',
			'page_type_id' => 'Page Type',
			'name_en' => 'Name (English)',
			'name_th' => 'Name (Thai)',
			'show_type' => 'Show Type',
			'page_id' => 'Page Select',
			'link' => 'Link',
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

		$criteria->compare('left_menu_id',$this->left_menu_id);
		$criteria->compare('page_type_id',$this->page_type_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('show_type',$this->show_type,true);
		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('link',$this->link,true);
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