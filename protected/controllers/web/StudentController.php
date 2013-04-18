<?php

class StudentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $label = array();
        public $upload_path;

	public function init() {
		$this->upload_path = Yii::app()->basePath . '/../uploads/student/';
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{

                if(Yii::app()->user->id){
                    $id = Yii::app()->user->id;
                    $model = $this->loadModel($id);

                    if(isset($_GET['level'])){
                        $level_id = $_GET['level'];

                    }else{
                        $level_id = $model->level_id;
                    }

                    if(isset($_GET['subject'])){
                        $subject_id = $_GET['subject'];

                    }else{
                        $subject_id = 0;
                    }

                    //echo $level_id;
                    $subject = Yii::app()->db->createCommand()
                                ->select('s.name, t.exam_type')
                                ->from('esto_subject s')
                                ->join('esto_type t', 's.type_id=t.type_id')
                                ->where('subject_id=:subject_id', array(':subject_id'=>$subject_id))
                                ->queryRow();


                    $type_criteria = new CDbCriteria();
                    $type_criteria->select = '*';
                    $type_criteria->condition = 'status=:status AND level_id=:level_id AND exam_type=:exam_type';
                    $type_criteria->params=array(':status'=>1,':level_id'=>$level_id,':exam_type'=>'Exam');
                    $type_criteria->order='sort_order';
                    $TypesExam = Type::model()->findAll($type_criteria);


                    $ex_criteria = new CDbCriteria();
                    $ex_criteria->select = '*';
                    $ex_criteria->condition = 'status=:status AND level_id=:level_id AND exam_type=:exam_type';
                    $ex_criteria->params=array(':status'=>1,':level_id'=>$level_id,':exam_type'=>'Exercise');
                    $ex_criteria->order='sort_order';
                    $TypesExercise= Type::model()->findAll($ex_criteria);

                    $test = new TestRecord();
                    $TestRecord = $test->getTestRecordByStudentID($id);


//                    $test_criteria = new CDbCriteria();
//                    $test_criteria->select = '*';
//                    $test_criteria->condition = 'student_id=:student_id';
//                    $test_criteria->params=array(':student_id'=>$id);
//                    $test_criteria->order='date_attended desc';
//                    $test_criteria->offset='0';
//                    $test_criteria->limit='3';
//                    $TestRecord= TestRecord::model()->findAll($test_criteria);

                    $this->render('view',array(
                                'model'=>$model,
                                'TypesExam'=> $TypesExam,
                                'TypesExercise'=> $TypesExercise,
                                'level_id'=> $level_id,
                                'subject_id'=> $subject_id,
                                'subject'=> $subject,
                                'TestRecord'=> $TestRecord,
                        ));
                }else{
                    $this->redirect(Yii::app()->createUrl('site/login'));
                }

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$password_confirm=0;
                $password_not_match=0;

                $option_levels = $this->levelOption();

                // Define label
		$this->label['firstname'] = 'ชื่อ';
		$this->label['lastname'] = 'นามสกุล';
		$this->label['username'] = 'ชื่อผู้ใช้งาน';
		$this->label['password'] = 'รหัสผ่าน';
                $this->label['button_login'] = 'สมัครสมาชิก';
                $this->label['confirm_pass_label'] = 'กรุณายืนยันรหัสผ่าน';
                $this->label['pass_not_match_label'] = 'รหัสผ่านไม่ตรงกัน';

		$model=new SignupForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['SignupForm']))
		{
                        $_POST['SignupForm']['id_number'] = '0000000000000';
			$_POST['SignupForm']['school'] = '';
                        $_POST['SignupForm']['phone'] = '';
                        $_POST['SignupForm']['image'] = '';
                        $_POST['SignupForm']['credit'] = 0;

                        //echo "<pre>", print_r($_POST), "</pre>";
                        if($_POST['password_confirm']==''){
                            $password_confirm = 1;
                        }else if($_POST['password_confirm']!=$_POST['SignupForm']['password']){
                            $password_not_match = 1;
                        }else{
                            $model->attributes=$_POST['SignupForm'];
                            //exit;
                            if($model->save())
                                $this->redirect(array('index'));
                        }

		}
		// display the login form

		$this->render('create',array(
                        'model'=>$model,
                        'password_confirm'=>$password_confirm,
                        'password_not_match'=>$password_not_match,
                        'option_levels'=>$option_levels,
                    ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
               $password_confirm=0;
               $password_not_match=0;

               $this->label['confirm_pass_label'] = 'กรุณายืนยันรหัสผ่าน';
               $this->label['pass_not_match_label'] = 'รหัสผ่านไม่ตรงกัน';

               if(!Yii::app()->user->id){
                    $this->redirect(Yii::app()->createUrl('site/login'));
                }else{
                    $id = Yii::app()->user->id;
                    $model=$this->loadModel($id);

                    $id_number = array();
                    for($i=0;$i<13;$i++){
                        $id_number[$i] = substr($model->id_number, $i,1);
                    }
                    
                    $model->id_number = $id_number;
                    $option_levels = $this->levelOption();
                    if(isset($_POST['Student']))
                    {
                            // Define image's location
                            $imageLocation = Yii::app()->basePath."/../uploads/student/";

                            // query table where ID = currnet ID
                            $studentInfo = Student::model()->find("student_id = ".$model->student_id);
                            $imageInfo = CUploadedFile::getInstance($model,'image');
                            // if patientPic(image) field in table is not empty
                            // delete images
                            if($imageInfo && !empty($studentInfo->image)){

                                if(is_dir($imageLocation.$studentInfo->image)){
                                    unlink($imageLocation.$studentInfo->image);
                                }

                            }
                            // get fileuploaded info
                            $imageInfo = CUploadedFile::getInstance($model,'image');
                            if($imageInfo){
                                // Adding yearmonthdate_time to file name
                                $imageName = "Student_".$model->student_id.'.' . $imageInfo->getExtensionName();
                                // ready to update database with new filename
                                $model->image=$imageName;
                                $_POST['Student']['image']     = $imageName;
                            }else{
                                 $_POST['Student']['image']     = $model->image;

                            }
                          $_POST['Student']['id_number'] = $_POST['number1'].$_POST['number2'].$_POST['number3'].$_POST['number4'].$_POST['number5'].$_POST['number6'].$_POST['number7'].$_POST['number8'].$_POST['number9'].$_POST['number10'].$_POST['number11'].$_POST['number12'].$_POST['number13'];
                          list($d,$m,$y) = explode("/",$_POST['Student']['birthday']);
                          $birthday = $y."-".$m."-".$d;
                          $_POST['Student']['birthday']  = $birthday;

                          if(($_POST['new_password'])&&($_POST['password_retype']=='')){
                             $password_confirm = 1;
                          }else if($_POST['new_password'] != $_POST['password_retype']){
                             $password_not_match = 1;
                          }else{

                              if($_POST['new_password']){
                                   $_POST['Student']['password']     = $_POST['new_password'];
                              }

                             $model->attributes = $_POST['Student'];
                             //$model->save();
                             if($model->save()) {
                                // can't use $imageName since it only contain file name
                                // saveAs need $imageInfo -> tempName
                                if($imageInfo){
                                    $imageInfo->saveAs($imageLocation.$imageName);
                                }
                                 $this->redirect(array('view'));

                             }


                          }
    
                    }
                        $this->render('update',array(
			'model'=>$model,
			'option_levels'	=> $option_levels,
                        'password_confirm'=>$password_confirm,
                        'password_not_match'=>$password_not_match,
		));
                    
                }//end if
               
                
	}//end function

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Student');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
                if(Yii::app()->user->id){
                     $id = Yii::app()->user->id;
                        $this->render('view',array(
                                'model'=>$this->loadModel($id),
                        ));
                }else{
                    $this->redirect(Yii::app()->createUrl('site/index'));
                }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

        public function actionHistory()
	{
                if(Yii::app()->user->id){
                    $id = Yii::app()->user->id;
                    

                    $test = new TestRecord;
                    $history =$test->getTestRecordByStudentID($id);


                    $this->render('history',array(
                            'model'=>$this->loadModel($id),
                            'history'=>$history
                    ));
                }else{
                    $this->redirect(Yii::app()->createUrl('site/login'));
                }
                
                
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function levelOption()
	{
                $condition = array(
                                    'condition'=>'status=:status',
                                    'params'=>array(':status'=>1),
                                    'order'=>'level_id',
                            );
		$levels=  Level::model()->findAll($condition);
                
                $option_levels = array();
                
		if(is_array($levels)){
                    foreach($levels as $level) {
                        $option_levels[$level->level_id] = $level->name;
                    }	
                    return $option_levels;
                }
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
