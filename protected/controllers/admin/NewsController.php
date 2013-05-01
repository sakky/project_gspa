<?php

class NewsController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $upload_path;
        public $upload_path_pdf;
	
	public function init() {
                $this->upload_path = Yii::app()->basePath . '/../uploads/news/';
                $this->upload_path_pdf = Yii::app()->basePath . '/../uploads/news/pdf/';
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
		$model=new News;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $news_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'sort_order';
                $news_type = NewsType::model()->findAll($criteria);
                
                foreach($news_type as $type) {
			$news_type_list[$type->news_type_id] = $type->name_th;
		}

		if(isset($_POST['News']))
		{
			$_POST['News']['user_id'] = Yii::app()->user->id;
                        
                        list($day,$month,$year) = explode('/', $_POST['News']['create_date']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['News']['create_date'] = $create_date;
                        
                        $model->attributes=$_POST['News'];
                        $image = CUploadedFile::getInstance($model, 'image');
                        if($image) {

				$genName = 'thumb_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->image = $saveName . '.' . $image->getExtensionName();
			}
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
                            if($image) {
                                    $image->saveAs($this->upload_path . $model->image);
                            }
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
                        'news_type_list'=>$news_type_list,
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
                $news_type_list = array();
		$criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'sort_order';
                $news_type = NewsType::model()->findAll($criteria);
                
                foreach($news_type as $type) {
			$news_type_list[$type->news_type_id] = $type->name_th;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$_POST['News']['user_id'] = Yii::app()->user->id;
                        $record_image = $model->image;
                        $record_file_en = $model->pdf_en;
                        $record_file_th = $model->pdf_th;
                        list($day,$month,$year) = explode('/', $_POST['News']['create_date']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['News']['create_date'] = $create_date;
                        
                        $model->attributes=$_POST['News'];
                        $image = CUploadedFile::getInstance($model, 'image');
                        if($image) {			
                                $genName = 'thumb_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->image = $saveName . '.' . $image->getExtensionName();
                        }
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
                            if($image) {
                                    if(file_exists($this->upload_path . $record_image)) {
                                            @unlink($this->upload_path . $record_image);
                                    }

                                    $image->saveAs($this->upload_path . $model->image);
                            }
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
                        'news_type_list'=>$news_type_list,
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
//		$dataProvider=new CActiveDataProvider('News');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
                $model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
		));
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
