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
				'height'=>40,
				'width'=>100,
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
            $intro =Page::model()->findByPk(10);
            if($intro->status==1){
                 $this->redirect(Yii::app()->createUrl('site/intro'));
            }else{                
                $this->redirect(Yii::app()->createUrl('site/home'));

            }
	}
	public function actionHome()
	{
	
		$Criteria = new CDbCriteria();
                $Criteria->condition = "status = 1";
                $Criteria->order = "sort_order";
                $Criteria->offset = 0;
                $Criteria->limit = 4;            
                $model = Slide::model()->findAll($Criteria);
                
                $condition = new CDbCriteria();
                $condition->condition = "news_type_id =2 AND status = 1";
                $condition->order = "create_date desc,news_id desc";
                $condition->offset = 0;
                $condition->limit = 6; 
                $student_news = News::model()->findAll($condition);
                
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "news_type_id <>2 AND news_type_id <>3 AND status = 1";
                $news_criteria->order = "create_date desc,news_id desc";
                $news_criteria->offset = 0;
                $news_criteria->limit = 6; 
                $news = News::model()->findAll($news_criteria);
                
                $job_criteria = new CDbCriteria();
                $job_criteria->condition = "news_type_id =3 AND status = 1";
                $job_criteria->order = "create_date desc,news_id desc";
                $job_criteria->offset = 0;
                $job_criteria->limit = 6; 
                $job = News::model()->findAll($job_criteria);
                
                $event_criteria = new CDbCriteria();
                $event_criteria->condition = "event_start >= ".date('Y-m-d')." AND event_status = 1";
                $event_criteria->order = "event_start ,event_id";
                $event_criteria->offset = 0;
                $event_criteria->limit = 5; 
                $events = Event::model()->findAll($event_criteria);
                
//                $pr_criteria = new CDbCriteria();
//                $pr_criteria->condition = "news_type_id =5 AND status = 1";
//                $pr_criteria->order = "create_date desc,news_id desc";
//                $pr_criteria->offset = 0;
//                $pr_criteria->limit = 4; 
//                $newsInSide = News::model()->findAll($pr_criteria);
                
                $link_criteria = new CDbCriteria();
                $link_criteria->condition = "status = 1";
                $link_criteria->order = "sort_order";
                $links = Link::model()->findAll($link_criteria);
                
                $vdo_criteria = new CDbCriteria();
                $vdo_criteria->condition = "page_id = 3 AND status = 1";
                $vdo = Page::model()->find($vdo_criteria);
                

                
//                 echo "<br> ===> ";
//                 echo "<pre>";
//                 print_r($vdo);
//                 echo "</pre>";
//                 exit;
                if ($_GET['page']=='new')
                {
                    $this->render('index_new',array(
                                    'model'=>$model,
                                    'news'=>$news,
                                   // 'newsInSide'=>$newsInSide,
                                    'job'=>$job,
                                    'student_news'=>$student_news,
                                    'links'=>$links,
                                    'vdo'=>$vdo,
                                    'events'=>$events,
                            ));
                }
                else
                {
                    $this->render('index',array(
                                    'model'=>$model,
                                    'news'=>$news,
                                   // 'newsInSide'=>$newsInSide,
                                    'job'=>$job,
                                    'student_news'=>$student_news,
                                    'links'=>$links,
                                    'vdo'=>$vdo,
                                    'events'=>$events,
                            ));
                }
	}        

        
	public function actionHomenew()
	{
	
		$Criteria = new CDbCriteria();
                $Criteria->condition = "status = 1";
                $Criteria->order = "sort_order";
                $Criteria->offset = 0;
                $Criteria->limit = 4;            
                $model = Slide::model()->findAll($Criteria);
                
                $condition = new CDbCriteria();
                $condition->condition = "news_type_id =2 AND status = 1";
                $condition->order = "create_date desc,news_id desc";
                $condition->offset = 0;
                $condition->limit = 6; 
                $student_news = News::model()->findAll($condition);
                
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "news_type_id <>2 AND news_type_id <>3 AND status = 1";
                $news_criteria->order = "create_date desc,news_id desc";
                $news_criteria->offset = 0;
                $news_criteria->limit = 6; 
                $news = News::model()->findAll($news_criteria);
                
                $job_criteria = new CDbCriteria();
                $job_criteria->condition = "news_type_id =3 AND status = 1";
                $job_criteria->order = "create_date desc,news_id desc";
                $job_criteria->offset = 0;
                $job_criteria->limit = 6; 
                $job = News::model()->findAll($job_criteria);
                
                $event_criteria = new CDbCriteria();
                $event_criteria->condition = "event_start >= ".date('Y-m-d')." AND event_status = 1";
                $event_criteria->order = "event_start ,event_id";
                $event_criteria->offset = 0;
                $event_criteria->limit = 5; 
                $events = Event::model()->findAll($event_criteria);
                
//                $pr_criteria = new CDbCriteria();
//                $pr_criteria->condition = "news_type_id =5 AND status = 1";
//                $pr_criteria->order = "create_date desc,news_id desc";
//                $pr_criteria->offset = 0;
//                $pr_criteria->limit = 4; 
//                $newsInSide = News::model()->findAll($pr_criteria);
                
                $link_criteria = new CDbCriteria();
                $link_criteria->condition = "status = 1";
                $link_criteria->order = "sort_order";
                $links = Link::model()->findAll($link_criteria);
                
                $vdo_criteria = new CDbCriteria();
                $vdo_criteria->condition = "page_id = 3 AND status = 1";
                $vdo = Page::model()->find($vdo_criteria);
                

                
//                 echo "<br> ===> ";
//                 echo "<pre>";
//                 print_r($vdo);
//                 echo "</pre>";
//                 exit;
                        
                $this->render('index_new',array(
                                'model'=>$model,
                                'news'=>$news,
                               // 'newsInSide'=>$newsInSide,
                                'job'=>$job,
                                'student_news'=>$student_news,
                                'links'=>$links,
                                'vdo'=>$vdo,
                                'events'=>$events,
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
                $page =Page::model()->findByPk(7);
                $email_admin = $page->title_en;
                
		$model = new ContactForm;

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

				$email = explode(",",$email_admin);
                                if (count($email)>0)
                                {
                                    foreach($email as $mail)
                                    {
                                        $mail = trim($mail);
                                        if ($mail) @mail($mail,$subject,$model->body,$headers);
                                    }
                                }
				Yii::app()->user->setFlash('contact','ส่งข้อความเรียบร้อยแล้ว ทางเราจะติดต่อกลับไปยังท่านโดยเร็วที่สุด ขอบคุณค่ะ');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model,'page'=>$page));
	}
        /**
	 * Displays the privacy page
	 */
	public function actionPrivacy()
	{
                $model =Page::model()->findByPk(8);
                
		$this->render('privacy',array('model'=>$model));
	}
        
        /**
	 * Displays the faq page
	 */
	public function actionFaq()
	{
                $model =Page::model()->findByPk(9);
		$this->render('privacy',array('model'=>$model));
	}
        public function actionIntro()
        {
                $this->layout = '//layouts/intro';
                $model =Page::model()->findByPk(10);
		$this->render('intro',array('model'=>$model));
        }        
        
        public function actionSitemap()
	{         
                $condition = new CDbCriteria();
                $condition->condition = "news_type_id =2 AND status = 1";
                $condition->order = "create_date desc,news_id desc";
                $condition->offset = 0;
                $condition->limit = 6; 
                $student_news = News::model()->findAll($condition);
                
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "news_type_id =1 AND status = 1";
                $news_criteria->order = "create_date desc,news_id desc";
                $news_criteria->offset = 0;
                $news_criteria->limit = 3; 
                $news = News::model()->findAll($news_criteria);
                
                $job_criteria = new CDbCriteria();
                $job_criteria->condition = "news_type_id =3 AND status = 1";
                $job_criteria->order = "create_date desc,news_id desc";
                $job_criteria->offset = 0;
                $job_criteria->limit = 6; 
                $job_news = News::model()->findAll($job_criteria);
                
                $pr_criteria = new CDbCriteria();
                $pr_criteria->condition = "news_type_id =5 AND status = 1";
                $pr_criteria->order = "create_date desc,news_id desc";
                $pr_criteria->offset = 0;
                $pr_criteria->limit = 3; 
                $newsInSide = News::model()->findAll($pr_criteria);
                
                $link_criteria = new CDbCriteria();
                $link_criteria->condition = "status = 1";
                $link_criteria->order = "sort_order";
                $links = Link::model()->findAll($link_criteria);
                
                $criteria = new CDbCriteria();
                $criteria->condition = "status = 1 AND doc_group ='download'";
                $criteria->order = "sort_order";
                $doc = DocumentType::model()->findAll($criteria);
                
                $criteria = new CDbCriteria();
                $criteria->condition = "status = 1";
                $criteria->order = "sort_order";
                $org = Organization::model()->findAll($criteria);
                
                $criteria = new CDbCriteria();
                $criteria->condition = "status = 1";
                $criteria->order = "sort_order";
                $report = ReportType::model()->findAll($criteria);
                
                $vdo_criteria = new CDbCriteria();
                $vdo_criteria->condition = "page_id = 3 AND status = 1";
                $vdo = Page::model()->find($vdo_criteria);
                

                
//                 echo "<br> ===> ";
//                 echo "<pre>";
//                 print_r($vdo);
//                 echo "</pre>";
//                 exit;
                        
                $this->render('sitemap',array(  
                                'news'=>$news,
                                'newsInSide'=>$newsInSide,
                                'job'=>$job_news,
                                'student_news'=>$student_news,
                                'doc'=>$doc,
                                'org'=>$org,
                                'links'=>$links,
                                'report'=>$report,
                                'vdo'=>$vdo,
                        ));
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

        
	public function actionSearch()
	{

		$keyword=trim($_GET['q']);
                
		if(isset($keyword))
		{
                    $condition = new CDbCriteria();
                    $condition->condition = "name_th LIKE '%$keyword%' OR name_en LIKE '%$keyword%' OR desc_th LIKE '%$keyword%' OR desc_en LIKE '%$keyword%'";
                    $condition->order = "create_date desc";
                    $condition->offset = 0;
                    $condition->limit = 20; 
                    $model_news = News::model()->findAll($condition);

                    $condition = new CDbCriteria();
                    $condition->condition = "name_th LIKE '%$keyword%' OR name_en LIKE '%$keyword%'";
                    $condition->order = "last_update desc";
                    $condition->offset = 0;
                    $condition->limit = 20; 
                    $model_document = Document::model()->findAll($condition);

                    $condition = new CDbCriteria();
                    $condition->condition = "name_th LIKE '%$keyword%' OR name_en LIKE '%$keyword%'";
                    $condition->order = "know_id desc";
                    $condition->offset = 0;
                    $condition->limit = 20; 
                    $model_knowledge = Knowledge::model()->findAll($condition);
                    
                    $condition = new CDbCriteria();
                    $condition->condition = "name_th LIKE '%$keyword%' OR name_en LIKE '%$keyword%' OR desc_th LIKE '%$keyword%' OR desc_en LIKE '%$keyword%'";
                    $condition->order = "last_update desc";
                    $condition->offset = 0;
                    $condition->limit = 20; 
                    $model_student = StudentService::model()->findAll($condition);
                    
                    //print_r($model);
                    $this->render('search',array(
                        'model_news'=>$model_news,
                        'model_document'=>$model_document,
                        'model_knowledge'=>$model_knowledge,
                        'model_student'=>$model_student,
                            ));
		}
	}       
        
	/**
	 * Displays the Direct Line page
	 */
	public function actionDirectline()
	{
                
		$model=new Directline;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Directline']))
		{
			$model->attributes=$_POST['Directline'];
			if($model->save()){
                                Yii::app()->user->setFlash('contact','ส่งข้อความเรียบร้อยแล้ว ทางเราจะติดต่อกลับไปยังท่านโดยเร็วที่สุด ขอบคุณค่ะ');
				$this->refresh();
                        }
		}

		$this->render('directline',array('model'=>$model));
	}        
}