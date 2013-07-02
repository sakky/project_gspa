<?php

class SiteController extends Controller
{
	public $label = array();
	
	public $layout;

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		$this->layout = '//layouts/information_view';
	
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
	
		$Criteria = new CDbCriteria();
                $Criteria->condition = "status = 1";
                $Criteria->order = "sort_order";
                $Criteria->offset = 0;
                $Criteria->limit = 4;            
                $model = Slide::model()->findAll($Criteria);
                
                $condition = new CDbCriteria();
                $condition->condition = "news_type_id =4 AND status = 1";
                $condition->order = "create_date desc,news_id desc";
                $condition->offset = 0;
                $condition->limit = 3; 
                $news_ads = News::model()->findAll($condition);
                
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "news_type_id =1 AND status = 1";
                $news_criteria->order = "create_date desc,news_id desc";
                $news_criteria->offset = 0;
                $news_criteria->limit = 10; 
                $news = News::model()->findAll($news_criteria);
                
                $job_criteria = new CDbCriteria();
                $job_criteria->condition = "news_type_id =3 AND status = 1";
                $job_criteria->order = "create_date desc,news_id desc";
                $job_criteria->offset = 0;
                $job_criteria->limit = 3; 
                $job_news = News::model()->findAll($job_criteria);
                
                $pr_criteria = new CDbCriteria();
                $pr_criteria->condition = "news_type_id =5 AND status = 1";
                $pr_criteria->order = "create_date desc,news_id desc";
                $pr_criteria->offset = 0;
                $pr_criteria->limit = 3; 
                $pr_news = News::model()->findAll($pr_criteria);
                
                $vdo_criteria = new CDbCriteria();
                $vdo_criteria->condition = "page_id = 3 AND status = 1";
                $vdo = Page::model()->find($vdo_criteria);
                

                
//                 echo "<br> ===> ";
//                 echo "<pre>";
//                 print_r($vdo);
//                 echo "</pre>";
//                 exit;
                        
                $this->render('index',array(
                                'model'=>$model,
                                'news'=>$news,
                                'news_ads'=>$news_ads,
                                'job'=>$job_news,
                                'pr_news'=>$pr_news,
                                'vdo'=>$vdo,
                        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


        public function validate() {
            if($_POST['password_confirm']==''){
                $password_confirm = 1;
                return false;
            }else if($_POST['password_confirm']!=$_POST['SignupForm']['password']){
                $password_not_match = 1;
                return false;
            } else {
                return true;
            }
        }

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
                $model=Page::model()->findByPk(7);
                $email_admin = $model->title_en;
                
		$model=new ContactForm;

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{                            
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail($email_admin,$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','ส่งข้อความเรียบร้อยแล้ว ทางเราจะติดต่อกลับไปยังท่านโดยเร็วที่สุด ขอบคุณค่ะ');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}       

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		// Define label
		$this->label['heading_title'] = 'เข้าสู่ระบบ';	
		$this->label['entry_username'] = 'ชื่อผู้ใช้';
		$this->label['entry_password'] = 'รหัสผ่าน';
		$this->label['entry_remember'] = 'บันทึกการใช้งานของฉัน';		
		$this->label['button_login'] = 'เข้าสู่ระบบ';
	
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
                                $this->redirect(Yii::app()->createUrl('student/view'));

		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
        
        
        public function actionCheckLogin()
	{
                // Define label
		$this->label['heading_title'] = 'เข้าสู่ระบบ';
		$this->label['entry_username'] = 'ชื่อผู้ใช้';
		$this->label['entry_password'] = 'รหัสผ่าน';
		$this->label['entry_remember'] = 'บันทึกการใช้งานของฉัน';
		$this->label['button_login'] = 'เข้าสู่ระบบ';
		$model=new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
                            //$this->redirect(Yii::app()->user->returnUrl);
                            $this->redirect(Yii::app()->createUrl('student/view'));
                        }else{
                            $this->render('login',array('model'=>$model));
                        }				

		}else{
                     $this->render('login',array('model'=>$model));

                }

	}



	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
}