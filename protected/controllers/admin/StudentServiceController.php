<?php

class StudentServiceController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        
        public $upload_path;
        
        public function init() {
                $this->upload_path = Yii::app()->basePath . '/../uploads/student_services/';
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new StudentService;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $ser_group_list = array();
                $criteria = new CDbCriteria();
                $criteria->order = 'ser_group';
                $ser_group = StudentServiceGroup::model()->findAll($criteria);
                
                foreach($ser_group as $type) {
			$ser_group_list[$type->ser_group] = $type->ser_name;
		}
                
                $group = $model->ser_group;
                $ser_type_list = array();
                $criteria1 = new CDbCriteria();
                $criteria1->condition = 'status=:status AND t.ser_group=:ser_group';
		$criteria1->params=array(':status'=>1,':ser_group'=>$group);
                $criteria1->order = 'name_th';
                $ser_group = StudentServiceType::model()->findAll($criteria1);
                
                foreach($ser_group as $type) {
			$ser_type_list[$type->ser_type_id] = $type->name_th;
		}
		if(isset($_POST['StudentService']))
		{
                        $_POST['StudentService']['user_id'] = Yii::app()->user->id;
                        list($day,$month,$year) = explode('/', $_POST['StudentService']['last_update']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['StudentService']['last_update'] = $create_date;
                        
			$model->attributes=$_POST['StudentService'];
                        
                        //Upload pdf_file EN
                        $file_en = CUploadedFile::getInstance($model, 'pdf_en');	
			if($file_en) {

				$genName = 'en_pdf_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $file_en->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->pdf_en = $saveName . '.' . $file_en->getExtensionName();
			}
                        //Upload pdf_file TH
                        $file_th = CUploadedFile::getInstance($model, 'pdf_th');	
			if($file_th) {

				$genName = 'th_pdf_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $file_th->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->pdf_th = $saveName . '.' . $file_th->getExtensionName();
			}
			if($model->save()){
                                if($file_en) {
                                        $file_en->saveAs($this->upload_path . $model->pdf_en);
                                }
                                if($file_th) {
                                        $file_th->saveAs($this->upload_path . $model->pdf_th);
                                }
                                $this->redirect(array('index'));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'ser_group_list'=>$ser_group_list,
                        'ser_type_list'=>$ser_type_list
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $ser_group_list = array();
                $criteria = new CDbCriteria();
                $criteria->order = 'ser_group';
                $ser_group = StudentServiceGroup::model()->findAll($criteria);
                
                foreach($ser_group as $type) {
			$ser_group_list[$type->ser_group] = $type->ser_name;
		}
                
                $group = $model->ser_group;
                $ser_type_list = array();
                $criteria1 = new CDbCriteria();
                $criteria1->condition = 'status=:status AND t.ser_group=:ser_group';
		$criteria1->params=array(':status'=>1,':ser_group'=>$group);
                $criteria1->order = 'name_th';
                $ser_group = StudentServiceType::model()->findAll($criteria1);
                
                foreach($ser_group as $type) {
			$ser_type_list[$type->ser_type_id] = $type->name_th;
		}
		if(isset($_POST['StudentService']))
		{
                        $record_file_en = $model->pdf_en;
                        $record_file_th = $model->pdf_th;
                        $_POST['StudentService']['user_id'] = Yii::app()->user->id;
                        list($day,$month,$year) = explode('/', $_POST['StudentService']['last_update']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['StudentService']['last_update'] = $create_date;
			$model->attributes=$_POST['StudentService'];
                        $file_en = CUploadedFile::getInstance($model, 'pdf_en');
                        if($file_en) {			
                                $genName = 'en_pdf_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path . $saveName . '.' . $file_en->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->pdf_en = $saveName . '.' . $file_en->getExtensionName();
                        }
                        $file_th = CUploadedFile::getInstance($model, 'pdf_th');
                        if($file_th) {			
                                $genName = 'th_pdf_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path . $saveName . '.' . $file_th->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->pdf_th = $saveName . '.' . $file_th->getExtensionName();
                        }
			if($model->save()){
                                if($file_en) {
                                        if(file_exists($this->upload_path . $record_file_en)) {
                                                @unlink($this->upload_path . $record_file_en);
                                        }

                                        $file_en->saveAs($this->upload_path . $model->pdf_en);
                                }
                                if($file_th) {
                                        if(file_exists($this->upload_path . $record_file_th)) {
                                                @unlink($this->upload_path . $record_file_th);
                                        }

                                        $file_th->saveAs($this->upload_path . $model->pdf_th);
                                }
                                $this->redirect(array('index'));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
                        'ser_group_list'=>$ser_group_list,
                        'ser_type_list'=>$ser_type_list
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new StudentService('search');
                $ser_group_list = array();
                $criteria = new CDbCriteria();
                $criteria->order = 'ser_group';
                $ser_group = StudentServiceGroup::model()->findAll($criteria);
                
                foreach($ser_group as $type) {
			$ser_group_list[$type->ser_group] = $type->ser_name;
		}
                
                $group = $model->ser_group;
                $ser_type_list = array();
                $criteria1 = new CDbCriteria();
                $criteria1->condition = 'status=:status AND t.ser_group=:ser_group';
		$criteria1->params=array(':status'=>1,':ser_group'=>$group);
                $criteria1->order = 'name_th';
                $ser_group = StudentServiceType::model()->findAll($criteria1);
                
                foreach($ser_group as $type) {
			$ser_type_list[$type->ser_type_id] = $type->name_th;
		}
                
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentService']))
			$model->attributes=$_GET['StudentService'];

		$this->render('admin',array(
			'model'=>$model,
                        'ser_group_list'=>$ser_group_list,
                        'ser_type_list'=>$ser_type_list
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentService('search');
                $ser_group_list = array();
                $criteria = new CDbCriteria();
                $criteria->order = 'ser_group';
                $ser_group = StudentServiceGroup::model()->findAll($criteria);
                
                foreach($ser_group as $type) {
			$ser_group_list[$type->ser_group] = $type->ser_name;
		}
                
                $group = $model->ser_group;
                $ser_type_list = array();
                $criteria1 = new CDbCriteria();
                $criteria1->condition = 'status=:status AND t.ser_group=:ser_group';
		$criteria1->params=array(':status'=>1,':ser_group'=>$group);
                $criteria1->order = 'name_th';
                $ser_group = StudentServiceType::model()->findAll($criteria1);
                
                foreach($ser_group as $type) {
			$ser_type_list[$type->ser_type_id] = $type->name_th;
		}
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentService']))
			$model->attributes=$_GET['StudentService'];

		$this->render('admin',array(
			'model'=>$model,
                        'ser_group_list'=>$ser_group_list,
                        'ser_type_list'=>$ser_type_list
		));
	}
        
        public function actionType()
        {
               $group =  (!empty($_POST['ser_group'])) ? $_POST['ser_group']: '';
               $data=StudentServiceType::model()->findAll('t.ser_group=:ser_group',
                                array(':ser_group'=>$group));

                $data=CHtml::listData($data,'ser_type_id','name_th');
                foreach($data as $value=>$name_th)
                {
                echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name_th),true);
                }

        }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return StudentService the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=StudentService::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param StudentService $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-service-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
