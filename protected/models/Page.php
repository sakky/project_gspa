<?php

/**
 * This is the model class for table "gs_page".
 *
 * The followings are the available columns in table 'gs_page':
 * @property integer $page_id
 * @property integer $page_type_id
 * @property string $name_en
 * @property string $name_th
 * @property string $title_en
 * @property string $title_th
 * @property string $desc_en
 * @property string $desc_th
 * @property string $pdf_en
 * @property string $pdf_th
 * @property string $images
 * @property string $create_date
 * @property integer $sort_order
 * @property integer $status
 * @property integer $user_id
 * @property string $time_stamp
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
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
		return 'gs_page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_type_id, name_en, name_th,create_date, status', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('page_type_id, sort_order, status, user_id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_th, pdf_en, pdf_th, images', 'length', 'max'=>255),
			array('title_en, title_th, desc_en, desc_th, create_date', 'safe'),
                        array('images,thumbnail', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
                        array('pdf_en,pdf_th', 'file', 'types'=>'pdf', 'maxSize'=>1024 * 1024 * 10, 'tooLarge'=>'ไฟล์ควรมีขนาดเล็กกว่า 10 MB','allowEmpty'=>true) ,
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('page_id, page_type_id, name_en, name_th, title_en, title_th, desc_en, desc_th, pdf_en, pdf_th, images, create_date, sort_order, status, user_id, time_stamp', 'safe', 'on'=>'search'),
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
                    'pageType' => array(self::BELONGS_TO, 'PageType', 'page_type_id', 'joinType'=>'INNER JOIN'),
                    'user' => array(self::BELONGS_TO, 'User', 'user_id', 'joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'page_id' => 'ID',
			'page_type_id' => 'Page Type',
			'name_en' => 'Name (English)',
			'name_th' => 'Name (Thai)',
			'title_en' => 'Title (English)',
			'title_th' => 'Title (Thai)',
			'desc_en' => 'Description (English)',
			'desc_th' => 'Description (Thai)',
			'pdf_en' => 'File PDF (English)',
			'pdf_th' => 'File PDF (Thai)',           
			'images' => 'Images',
                        'thumbnail' => 'Thumbnail',
			'create_date' => 'Create Date',
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

		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('page_type_id',$this->page_type_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('title_th',$this->title_th,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('desc_th',$this->desc_th,true);
		$criteria->compare('pdf_en',$this->pdf_en,true);
		$criteria->compare('pdf_th',$this->pdf_th,true);
		$criteria->compare('images',$this->images,true);
                $criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('time_stamp',$this->time_stamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20),
		));
	}
        
        public function getPageByPageTypeId($id)
	{
                $command = Yii::app()->db->createCommand();
                $result = $command->select('*')
                                  ->from('gs_page')
                                  ->where('page_type_id=:page_type_id', array(':page_type_id'=>$id))
                                  ->queryAll();

                return $result;
	}
}