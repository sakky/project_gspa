<?php

/**
 * This is the model class for table "gs_admission".
 *
 * The followings are the available columns in table 'gs_admission':
 * @property integer $admission_id
 * @property string $location
 * @property string $program
 * @property string $firstname_th
 * @property string $lastname_th
 * @property string $firstname_en
 * @property string $lastname_en
 * @property string $title
 * @property string $birthday
 * @property string $address
 * @property string $district
 * @property string $amphur
 * @property string $province
 * @property string $postcode
 * @property string $home_phone
 * @property string $mobile_phone
 * @property string $email
 * @property string $year_end_1
 * @property string $university_1
 * @property string $major_1
 * @property string $degree_1
 * @property string $score_1
 * @property string $year_end_2
 * @property string $university_2
 * @property string $major_2
 * @property string $degree_2
 * @property string $score_2
 * @property string $year_end_3
 * @property string $university_3
 * @property string $major_3
 * @property string $degree_3
 * @property string $score_3
 * @property string $year_end_4
 * @property string $university_4
 * @property string $major_4
 * @property string $degree_4
 * @property string $score_4
 * @property string $year_end_5
 * @property string $university_5
 * @property string $major_5
 * @property string $degree_5
 * @property string $score_5
 * @property string $training_1
 * @property string $training_2
 * @property string $training_3
 * @property string $training_4
 * @property string $training_5
 * @property string $work_experience
 * @property string $career
 * @property string $position
 * @property string $level
 * @property string $salary
 * @property string $period
 * @property string $company_name
 * @property string $company_add
 * @property string $company_road
 * @property string $company_district
 * @property string $ompany_amphur
 * @property string $mpany_province
 * @property string $mpany_postcode
 * @property string $mpany_phone
 * @property string $mpany_department
 * @property string $ref_name_1
 * @property string $ref_position_1
 * @property string $ref_company_1
 * @property string $ref_phone_1
 * @property string $ref_name_2
 * @property string $ref_position_2
 * @property string $ref_company_2
 * @property string $ref_phone_2
 * @property string $ref_name_3
 * @property string $ref_position_3
 * @property string $ref_company_3
 * @property string $ref_phone_3
 * @property string $succeed
 * @property string $reason
 * @property string $goal
 */
class Admission extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Admission the static model class
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
		return 'gs_admission';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location, program, firstname_th, lastname_th, firstname_en, lastname_en, title, birthday, address, district, amphur, province, postcode, mobile_phone, email', 'required','message'=>'{attribute} ห้ามว่าง'),
			array('location, program, firstname_th, lastname_th, firstname_en, lastname_en, title, address, district, amphur, province, postcode, home_phone, mobile_phone, email, year_end_1, university_1, major_1, degree_1, score_1, year_end_2, university_2, major_2, degree_2, score_2, year_end_3, university_3, major_3, degree_3, score_3, year_end_4, university_4, major_4, degree_4, score_4, year_end_5, university_5, major_5, degree_5, score_5, training_1, training_2, training_3, training_4, training_5, career, position, level, salary, period, company_name, company_add, company_road, company_district, company_amphur, company_province, company_postcode, company_phone, company_department, ref_name_1, ref_position_1, ref_company_1, ref_phone_1, ref_name_2, ref_position_2, ref_company_2, ref_phone_2, ref_name_3, ref_position_3, ref_company_3, ref_phone_3', 'length', 'max'=>255),
			array('work_experience, succeed, reason, goal', 'safe'),
                        array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('admission_id, location, program, firstname_th, lastname_th, firstname_en, lastname_en, title, birthday, address, district, amphur, province, postcode, home_phone, mobile_phone, email, year_end_1, university_1, major_1, degree_1, score_1, year_end_2, university_2, major_2, degree_2, score_2, year_end_3, university_3, major_3, degree_3, score_3, year_end_4, university_4, major_4, degree_4, score_4, year_end_5, university_5, major_5, degree_5, score_5, training_1, training_2, training_3, training_4, training_5, work_experience, career, position, level, salary, period, company_name, company_add, company_road, company_district, company_amphur, company_province, company_postcode, company_phone, company_department, ref_name_1, ref_position_1, ref_company_1, ref_phone_1, ref_name_2, ref_position_2, ref_company_2, ref_phone_2, ref_name_3, ref_position_3, ref_company_3, ref_phone_3, succeed, reason, goal', 'safe', 'on'=>'search'),
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
			'admission_id' => 'รหัส',
			'location' => 'ระบุสถานที่เรียน',
			'program' => 'สาขาที่เปิดรับสมัคร',
			'firstname_th' => 'ชื่อ',
			'lastname_th' => 'นามสกุล',
			'firstname_en' => 'Name',
			'lastname_en' => 'Surname',
			'title' => 'คำนำหน้า',
			'birthday' => 'วัน/เดือน/ปีเกิด',
			'address' => 'ที่อยู่ปัจจุบัน',
			'district' => 'ตำบล/แขวง',
			'amphur' => 'อำเภอ/เขต',
			'province' => 'จังหวัด',
			'postcode' => 'รหัสไปรษณีย์',
			'home_phone' => 'โทรศัพท์บ้าน',
			'mobile_phone' => 'โทรศัพท์มือถือ',
			'email' => 'อีเมล์',
			'year_end_1' => 'ปีที่สำเร็จการศึกษา',
			'university_1' => 'ชื่อสถานศึกษา',
			'major_1' => 'สาขาหรือวิชาเอก',
			'degree_1' => 'ชื่อปริญญา',
			'score_1' => 'เกรดเฉลี่ย',
			'year_end_2' => 'Year End 2',
			'university_2' => 'University 2',
			'major_2' => 'Major 2',
			'degree_2' => 'Degree 2',
			'score_2' => 'Score 2',
			'year_end_3' => 'Year End 3',
			'university_3' => 'University 3',
			'major_3' => 'Major 3',
			'degree_3' => 'Degree 3',
			'score_3' => 'Score 3',
			'year_end_4' => 'Year End 4',
			'university_4' => 'University 4',
			'major_4' => 'Major 4',
			'degree_4' => 'Degree 4',
			'score_4' => 'Score 4',
			'year_end_5' => 'Year End 5',
			'university_5' => 'University 5',
			'major_5' => 'Major 5',
			'degree_5' => 'Degree 5',
			'score_5' => 'Score 5',
			'training_1' => 'Training 1',
			'training_2' => 'Training 2',
			'training_3' => 'Training 3',
			'training_4' => 'Training 4',
			'training_5' => 'Training 5',
			'work_experience' => 'ประวัติการรับราชการหรือการทำงานโดยสรุป',
			'career' => 'อาชีพปัจจุบัน',
			'position' => 'ตำแหน่ง',
			'level' => 'ระดับ',
			'salary' => 'ขั้นเงินเดือน',
			'period' => 'ระยะเวลาในการทำงาน',
			'company_name' => 'สถานที่ทำงาน',
			'company_add' => 'เลขที่',
			'company_road' => 'ถนน',
			'company_district' => 'ตำบล/แขวง',
			'company_amphur' => 'อำเภอ/เขต',
			'company_province' => 'จังหวัด',
			'company_postcode' => 'รหัสไปรษณีย์',
			'company_phone' => 'โทรศัพท์(ที่ทำงาน)',
			'company_department' => '(กรม/กอง/แผนก/งาน)',
			'ref_name_1' => '1. ชื่อ',
			'ref_position_1' => 'ตำแหน่ง',
			'ref_company_1' => 'ที่ทำงาน',
			'ref_phone_1' => 'โทร.',
			'ref_name_2' => '2. ชื่อ',
			'ref_position_2' => 'ตำแหน่ง',
			'ref_company_2' => 'ที่ทำงาน',
			'ref_phone_2' => 'โทร.',
			'ref_name_3' => '3. ชื่อ',
			'ref_position_3' => 'ตำแหน่ง',
			'ref_company_3' => 'ที่ทำงาน',
			'ref_phone_3' => 'โทร.',
			'succeed' => 'Succeed',
			'reason' => 'Reason',
			'goal' => 'Goal',
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

		$criteria->compare('admission_id',$this->admission_id);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('program',$this->program,true);
		$criteria->compare('firstname_th',$this->firstname_th,true);
		$criteria->compare('lastname_th',$this->lastname_th,true);
		$criteria->compare('firstname_en',$this->firstname_en,true);
		$criteria->compare('lastname_en',$this->lastname_en,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('amphur',$this->amphur,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('home_phone',$this->home_phone,true);
		$criteria->compare('mobile_phone',$this->mobile_phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('year_end_1',$this->year_end_1,true);
		$criteria->compare('university_1',$this->university_1,true);
		$criteria->compare('major_1',$this->major_1,true);
		$criteria->compare('degree_1',$this->degree_1,true);
		$criteria->compare('score_1',$this->score_1,true);
		$criteria->compare('year_end_2',$this->year_end_2,true);
		$criteria->compare('university_2',$this->university_2,true);
		$criteria->compare('major_2',$this->major_2,true);
		$criteria->compare('degree_2',$this->degree_2,true);
		$criteria->compare('score_2',$this->score_2,true);
		$criteria->compare('year_end_3',$this->year_end_3,true);
		$criteria->compare('university_3',$this->university_3,true);
		$criteria->compare('major_3',$this->major_3,true);
		$criteria->compare('degree_3',$this->degree_3,true);
		$criteria->compare('score_3',$this->score_3,true);
		$criteria->compare('year_end_4',$this->year_end_4,true);
		$criteria->compare('university_4',$this->university_4,true);
		$criteria->compare('major_4',$this->major_4,true);
		$criteria->compare('degree_4',$this->degree_4,true);
		$criteria->compare('score_4',$this->score_4,true);
		$criteria->compare('year_end_5',$this->year_end_5,true);
		$criteria->compare('university_5',$this->university_5,true);
		$criteria->compare('major_5',$this->major_5,true);
		$criteria->compare('degree_5',$this->degree_5,true);
		$criteria->compare('score_5',$this->score_5,true);
		$criteria->compare('training_1',$this->training_1,true);
		$criteria->compare('training_2',$this->training_2,true);
		$criteria->compare('training_3',$this->training_3,true);
		$criteria->compare('training_4',$this->training_4,true);
		$criteria->compare('training_5',$this->training_5,true);
		$criteria->compare('work_experience',$this->work_experience,true);
		$criteria->compare('career',$this->career,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('salary',$this->salary,true);
		$criteria->compare('period',$this->period,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('company_add',$this->company_add,true);
		$criteria->compare('company_road',$this->company_road,true);
		$criteria->compare('company_district',$this->company_district,true);
		$criteria->compare('company_amphur',$this->company_amphur,true);
		$criteria->compare('company_province',$this->company_province,true);
		$criteria->compare('company_postcode',$this->company_postcode,true);
		$criteria->compare('company_phone',$this->company_phone,true);
		$criteria->compare('company_department',$this->company_department,true);
		$criteria->compare('ref_name_1',$this->ref_name_1,true);
		$criteria->compare('ref_position_1',$this->ref_position_1,true);
		$criteria->compare('ref_company_1',$this->ref_company_1,true);
		$criteria->compare('ref_phone_1',$this->ref_phone_1,true);
		$criteria->compare('ref_name_2',$this->ref_name_2,true);
		$criteria->compare('ref_position_2',$this->ref_position_2,true);
		$criteria->compare('ref_company_2',$this->ref_company_2,true);
		$criteria->compare('ref_phone_2',$this->ref_phone_2,true);
		$criteria->compare('ref_name_3',$this->ref_name_3,true);
		$criteria->compare('ref_position_3',$this->ref_position_3,true);
		$criteria->compare('ref_company_3',$this->ref_company_3,true);
		$criteria->compare('ref_phone_3',$this->ref_phone_3,true);
		$criteria->compare('succeed',$this->succeed,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('goal',$this->goal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}