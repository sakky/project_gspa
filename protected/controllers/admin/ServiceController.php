<?php

class ServiceController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $upload_path;
        public $user_group_menu;
        public $menu_use = array();         
        
        public function init() {
                $this->upload_path = Yii::app()->basePath . '/../uploads/services/';
                $this->user_group_menu = $this->getUserGroupMenu(Yii::app()->user->id);                                
                $user_menu = explode(',', $this->user_group_menu);
                foreach ($user_menu as $key => $value) {

                    $this->menu_use[$value] = $value;
                }                    
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
            if($this->menu_use[8]){              
		$model=new Document;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $doc_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND doc_group=\'service\'';
		$criteria->params=array(':status'=>1,);
                $criteria->order = 'name_th';
                $doc_type = DocumentType::model()->findAll($criteria);
                
                foreach($doc_type as $type) {
			$doc_type_list[$type->doc_type_id] = $type->name_th;
		}
		if(isset($_POST['Document']))
		{
                        $_POST['Document']['user_id'] = Yii::app()->user->id;
                        $_POST['Document']['doc_group'] = 'service';
                         list($day,$month,$year) = explode('/', $_POST['Document']['last_update']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['Document']['last_update'] = $create_date;
                        
			$model->attributes=$_POST['Document'];
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
                        'doc_type_list'=>$doc_type_list
		));
            }else{
                $this->redirect(array('site/index'));
            }                    
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            if($this->menu_use[8]){            
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $doc_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND doc_group=\'service\'';
		$criteria->params=array(':status'=>1,);
                $criteria->order = 'name_th';
                $doc_type = DocumentType::model()->findAll($criteria);
                
                foreach($doc_type as $type) {
			$doc_type_list[$type->doc_type_id] = $type->name_th;
		}
                
		if(isset($_POST['Document']))
		{
                        $record_file_en = $model->pdf_en;
                        $record_file_th = $model->pdf_th;
                        $_POST['Document']['user_id'] = Yii::app()->user->id;
                        $_POST['Document']['doc_group'] = 'service';
                        list($day,$month,$year) = explode('/', $_POST['Document']['last_update']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['Document']['last_update'] = $create_date;
                        
			$model->attributes=$_POST['Document'];
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
                        'doc_type_list'=>$doc_type_list
		));
            }else{
                $this->redirect(array('site/index'));
            }                 
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
            if($this->menu_use[8]){             
                $doc_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND doc_group=\'service\'';
		$criteria->params=array(':status'=>1,);
                $criteria->order = 'name_th';
                $doc_type = DocumentType::model()->findAll($criteria);
                
                foreach($doc_type as $type) {
			$doc_type_list[$type->doc_type_id] = $type->name_th;
		}
		$model=new Document('searchService');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Document']))
			$model->attributes=$_GET['Document'];

		$this->render('admin',array(
			'model'=>$model,
                        'doc_type_list'=>$doc_type_list
		));
            }else{
                $this->redirect(array('site/index'));
            }                 
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            if($this->menu_use[8]){            
                $doc_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND doc_group=\'service\'';
		$criteria->params=array(':status'=>1,);
                $criteria->order = 'name_th';
                $doc_type = DocumentType::model()->findAll($criteria);
                
                foreach($doc_type as $type) {
			$doc_type_list[$type->doc_type_id] = $type->name_th;
		}
		$model=new Document('searchService');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Document']))
			$model->attributes=$_GET['Document'];

		$this->render('admin',array(
			'model'=>$model,
                        'doc_type_list'=>$doc_type_list
		));
            }else{
                $this->redirect(array('site/index'));
            }                   
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Document the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Document::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Document $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='document-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
