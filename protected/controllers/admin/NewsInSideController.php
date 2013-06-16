<?php

class NewsInSideController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $upload_path;
        
        public function init() {
                $this->upload_path = Yii::app()->basePath . '/../uploads/news/';
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
		//$this->performAjaxValidation($model);
                $news_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'sort_order';
                $news_type = NewsGroup::model()->findAll($criteria);
                
                foreach($news_type as $type) {
			$news_type_list[$type->news_group_id] = $type->name_th;
		}

		if(isset($_POST['News']))
		{
                        $_POST['News']['news_type_id'] = 5;
                        $_POST['News']['user_id'] = Yii::app()->user->id;
                        
                        list($day,$month,$year) = explode('/', $_POST['News']['create_date']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['News']['create_date'] = $create_date;
			$model->attributes=$_POST['News'];
                        $image = CUploadedFile::getInstance($model, 'image');
                        if($image) {

				$genName = 'img_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->image = $saveName . '.' . $image->getExtensionName();
			}
                        //upload thumbnail
                        $thumbnail = CUploadedFile::getInstance($model, 'thumbnail');
                        if($thumbnail) {

				$genName = 'thumb_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $thumbnail->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->thumbnail = $saveName . '.' . $thumbnail->getExtensionName();
			}
			if($model->save()){
                                if($image) {
                                        $image->saveAs($this->upload_path . $model->image);
                                }
                                if($thumbnail) {
                                        $thumbnail->saveAs($this->upload_path . $model->thumbnail);
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
                $news_type = NewsGroup::model()->findAll($criteria);
                
                foreach($news_type as $type) {
			$news_type_list[$type->news_group_id] = $type->name_th;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
                        $_POST['News']['news_type_id'] = 5;
                        $_POST['News']['user_id'] = Yii::app()->user->id;
                        
                        list($day,$month,$year) = explode('/', $_POST['News']['create_date']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['News']['create_date'] = $create_date;
			$model->attributes=$_POST['News'];
                        
                        $image = CUploadedFile::getInstance($model, 'image');
                        if($image) {			
                                $genName = 'img_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->image = $saveName . '.' . $image->getExtensionName();
                        }
                        $thumbnail = CUploadedFile::getInstance($model, 'thumbnail');
                        if($thumbnail) {			
                                $genName = 'thumb_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path . $saveName . '.' . $thumbnail->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->thumbnail = $saveName . '.' . $thumbnail->getExtensionName();
                        }
			if($model->save()){
                                if($image) {
                                        if(file_exists($this->upload_path . $record_image)) {
                                                @unlink($this->upload_path . $record_image);
                                        }

                                        $image->saveAs($this->upload_path . $model->image);
                                }
                                if($thumbnail) {
                                        if(file_exists($this->upload_path . $record_thumb)) {
                                                @unlink($this->upload_path . $record_thumb);
                                        }

                                        $thumbnail->saveAs($this->upload_path . $model->thumbnail);
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
		$model=new News('searchInSide');
                $news_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'sort_order';
                $news_type = NewsGroup::model()->findAll($criteria);
                
                foreach($news_type as $type) {
			$news_type_list[$type->news_group_id] = $type->name_th;
		}
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
                        'news_type_list'=>$news_type_list,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new News('searchInSide');
                $news_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'sort_order';
                $news_type = NewsGroup::model()->findAll($criteria);
                
                foreach($news_type as $type) {
			$news_type_list[$type->news_group_id] = $type->name_th;
		}
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
                        'news_type_list'=>$news_type_list,
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