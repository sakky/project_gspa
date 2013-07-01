<?php
class JobsController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $upload_path_pdf;
        
        public $user_group_menu;
        public $menu_use = array();
	
	public function init() {
                $this->upload_path_pdf = Yii::app()->basePath . '/../uploads/news/pdf/';
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
            if($this->menu_use[2]){            
		$model=new News;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
                        $_POST['News']['user_id'] = Yii::app()->user->id;
                        $_POST['News']['news_group_id'] = 0;
                        list($day,$month,$year) = explode('/', $_POST['News']['create_date']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['News']['create_date'] = $create_date;
                        
			$model->attributes=$_POST['News'];
                        //Upload pdf_file EN
                        $file_en = CUploadedFile::getInstance($model, 'pdf_en');	
			if($file_en) {

				$genName = 'en_pdf_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path_pdf . $saveName . '.' . $file_en->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->pdf_en = $saveName . '.' . $file_en->getExtensionName();
			}
                        //Upload pdf_file TH
                        $file_th = CUploadedFile::getInstance($model, 'pdf_th');	
			if($file_th) {

				$genName = 'th_pdf_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path_pdf . $saveName . '.' . $file_th->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->pdf_th = $saveName . '.' . $file_th->getExtensionName();
			}
			if($model->save()){
                                if($file_en) {
                                        $file_en->saveAs($this->upload_path_pdf . $model->pdf_en);
                                }
                                if($file_th) {
                                        $file_th->saveAs($this->upload_path_pdf . $model->pdf_th);
                                }
                                $this->redirect(array('index'));
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
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
            if($this->menu_use[2]){            
		
                $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
                        $_POST['News']['user_id'] = Yii::app()->user->id;
                        $_POST['News']['news_group_id'] = 0;
                        $record_file_en = $model->pdf_en;
                        $record_file_th = $model->pdf_th;
                        list($day,$month,$year) = explode('/', $_POST['News']['create_date']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['News']['create_date'] = $create_date;
                        
			$model->attributes=$_POST['News'];
                        $file_en = CUploadedFile::getInstance($model, 'pdf_en');
                        if($file_en) {			
                                $genName = 'en_pdf_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path_pdf . $saveName . '.' . $file_en->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->pdf_en = $saveName . '.' . $file_en->getExtensionName();
                        }
                        $file_th = CUploadedFile::getInstance($model, 'pdf_th');
                        if($file_th) {			
                                $genName = 'th_pdf_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path_pdf . $saveName . '.' . $file_th->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->pdf_th = $saveName . '.' . $file_th->getExtensionName();
                        }
			if($model->save()){
                                if($file_en) {
                                        if(file_exists($this->upload_path_pdf . $record_file_en)) {
                                                @unlink($this->upload_path_pdf . $record_file_en);
                                        }

                                        $file_en->saveAs($this->upload_path_pdf . $model->pdf_en);
                                }
                                if($file_th) {
                                        if(file_exists($this->upload_path_pdf . $record_file_th)) {
                                                @unlink($this->upload_path_pdf . $record_file_th);
                                        }

                                        $file_th->saveAs($this->upload_path_pdf . $model->pdf_th);
                                }
                                $this->redirect(array('index'));
                        }
				
		}

		$this->render('update',array(
			'model'=>$model,
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
            if($this->menu_use[2]){            
		$model=new News('searchJobs');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
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
            if($this->menu_use[2]){            
		$model=new News('searchJobs');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
		));
            }else{
                $this->redirect(array('site/index'));
            }  
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return News the loaded model
	 * @throws CHttpException
	 */
        
        public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param News $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
