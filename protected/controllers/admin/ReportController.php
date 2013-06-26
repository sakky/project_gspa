<?php

class ReportController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        
        public $upload_path;
        
        public function init() {
                $this->upload_path = Yii::app()->basePath . '/../uploads/reports/';
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
		$model=new Report;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $report_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'name_th';
                $report_type = ReportType::model()->findAll($criteria);
                
                foreach($report_type as $type) {
			$report_type_list[$type->report_type_id] = $type->name_th;
		}
		if(isset($_POST['Report']))
		{
                        $_POST['Report']['user_id'] = Yii::app()->user->id;
			$model->attributes=$_POST['Report'];
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
                        'report_type_list'=>$report_type_list
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
                $report_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'name_th';
                $report_type = ReportType::model()->findAll($criteria);
                
                foreach($report_type as $type) {
			$report_type_list[$type->report_type_id] = $type->name_th;
		}
		if(isset($_POST['Report']))
		{
                        $record_file_en = $model->pdf_en;
                        $record_file_th = $model->pdf_th;
                        $_POST['Report']['user_id'] = Yii::app()->user->id;
			$model->attributes=$_POST['Report'];
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
                        'report_type_list'=>$report_type_list
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
                $report_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'name_th';
                $report_type = ReportType::model()->findAll($criteria);
                
                foreach($report_type as $type) {
			$report_type_list[$type->report_type_id] = $type->name_th;
		}
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
                        'report_type_list'=>$report_type_list
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                $report_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'name_th';
                $report_type = ReportType::model()->findAll($criteria);
                
                foreach($report_type as $type) {
			$report_type_list[$type->report_type_id] = $type->name_th;
		}
                
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
                        'report_type_list'=>$report_type_list
		));
	}
        
        public function actionOrder()
        {
            // Handle the POST request data submission
            if (isset($_POST['Order']))
            {
                // Since we converted the Javascript array to a string,
                // convert the string back to a PHP array
                $models = explode(',', $_POST['Order']);

                for ($i = 0; $i < sizeof($models); $i++)
                {
                    if ($model = Report::model()->findbyPk($models[$i]))
                    {
                        $model->sort_order = $i;

                        $model->save();
                    }
                }
            }
            // Handle the regular model order view
            else
            {
                $dataProvider = new CActiveDataProvider('Report', array(
                    'pagination' => false,
                    'criteria' => array(
                        'order' => 'sort_order ASC, report_id DESC',
                    ),
                ));

                $this->render('order',array(
                    'dataProvider' => $dataProvider,
                ));
            }
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Report the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Report::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Report $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
