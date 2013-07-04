<?php

class PageController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $upload_path;
        public $upload_path_images;
        public $upload_path_thumb;
        public $upload_path_pdf;
        public $user_group_menu;
        public $menu_use = array();


        public function init() {
                $this->upload_path = Yii::app()->basePath . '/../uploads/pdf/';
                $this->upload_path_images = Yii::app()->basePath . '/../uploads/pages/images/';
                $this->upload_path_thumb = Yii::app()->basePath . '/../uploads/pages/thumbnail/';
                $this->upload_path_pdf = Yii::app()->basePath . '/../uploads/pages/pdf/';
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
		$model=new Page;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                
		$page_type_list = array();
		
                $type = PageType::model()->findAll('status=1');
                
                foreach($type as $page_type) {
			$page_type_list[$page_type->page_type_id] = $page_type->name_th;
		}
                
		if(isset($_POST['Page']))
		{
                        $_POST['Page']['user_id'] = Yii::app()->user->id;
                        
                        list($day,$month,$year) = explode('/', $_POST['Page']['create_date']);
                        $create_date = $year.'-'.$month.'-'.$day;
                        $_POST['Page']['create_date'] = $create_date;
                        
			$model->attributes=$_POST['Page'];
                        $images = CUploadedFile::getInstance($model, 'images');	
                        $thumbnail = CUploadedFile::getInstance($model, 'thumbnail');
                        
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
	
			if($images) {

				$genName = 'img_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path_images . $saveName . '.' . $images->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->images = $saveName . '.' . $images->getExtensionName();
			}
                        
                        if($thumbnail) {

				$genName = 'thumb_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path_thumb . $saveName . '.' . $thumbnail->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->thumbnail = $saveName . '.' . $thumbnail->getExtensionName();
			}
			if($model->save()){
                            if($file_en) {
                                    $file_en->saveAs($this->upload_path . $model->pdf_en);
                            }
                            if($file_th) {
                                    $file_th->saveAs($this->upload_path . $model->pdf_th);
                            }
                            if($images) {
                                    $images->saveAs($this->upload_path_images . $model->images);
                            }
                            if($thumbnail) {
                                    $thumbnail->saveAs($this->upload_path_thumb . $model->thumbnail);
                            }
                            $this->redirect(array('index'));
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
                        'page_type_list'=>$page_type_list,
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
                $page_type_list = array();
		
                $type = PageType::model()->findAll('status=1');
                
                foreach($type as $page_type) {
			$page_type_list[$page_type->page_type_id] = $page_type->name_th;
		}

		if(isset($_POST['Page']))
		{
                    $record_file_en = $model->pdf_en;
                    $record_file_th = $model->pdf_th;
                    $record_image = $model->images;
                    $record_thumb = $model->thumbnail;
                    $_POST['Page']['user_id'] = Yii::app()->user->id;
		    list($day,$month,$year) = explode('/', $_POST['Page']['create_date']);
                    $create_date = $year.'-'.$month.'-'.$day;
                    $_POST['Page']['create_date'] = $create_date;
                    
                    $model->attributes=$_POST['Page'];
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
                    
                    $images = CUploadedFile::getInstance($model, 'images');
                    if($images) {			
                            $genName = 'img_' . date('YmdHis');
                            $saveName = $genName;

                            while(file_exists($this->upload_path_images . $saveName . '.' . $images->getExtensionName())) {
                                    $saveName = $genName . '-' . rand(0,99);
                            }

                            $model->images = $saveName . '.' . $images->getExtensionName();
                    }
                    
                    $thumbnail = CUploadedFile::getInstance($model, 'thumbnail');
                    if($thumbnail) {

                            $genName = 'thumb_' . date('YmdHis');
                            $saveName = $genName;

                            while(file_exists($this->upload_path_thumb . $saveName . '.' . $thumbnail->getExtensionName())) {
                                    $saveName = $genName . '-' . rand(0,99);
                            }

                            $model->thumbnail = $saveName . '.' . $thumbnail->getExtensionName();
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
                        if($images) {
                                if(file_exists($this->upload_path_images . $record_image)) {
                                        @unlink($this->upload_path_images . $record_image);
                                }

                                $images->saveAs($this->upload_path_images . $model->images);
                        }
                        if($thumbnail) {
                                if(file_exists($this->upload_path_thumb . $record_thumb)) {
                                        @unlink($this->upload_path_thumb . $record_thumb);
                                }

                                $thumbnail->saveAs($this->upload_path_thumb . $model->thumbnail);
                        }
                        $this->redirect(array('index'));
                    }
				
		}

		$this->render('update',array(
			'model'=>$model,
                        'page_type_list'=>$page_type_list,
		));
	}

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
//		$dataProvider=new CActiveDataProvider('Page');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
                if($this->menu_use[1]){
                $model=new Page('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Page']))
			$model->attributes=$_GET['Page'];

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
               if($this->menu_use[1]){
                    $model=new Page('search');
                    $model->unsetAttributes();  // clear any default values
                    if(isset($_GET['Page']))
                            $model->attributes=$_GET['Page'];

                    $this->render('admin',array(
                            'model'=>$model,
                    ));
               }else{
                    $this->redirect(array('site/index'));
               }
	}
        
        public function actionEdit($id)
	{    
            if($this->menu_use[1]||$this->menu_use[13]){           
		$model=$this->loadModel($id);
                if(isset($_POST['Page']))
		{
                    $_POST['Page']['user_id'] = Yii::app()->user->id; 
                    $model->attributes=$_POST['Page'];
                      if($model->save()){
                            $this->redirect(array('edit','id'=>$id));
                      }
                }
                
		$this->render('edit',array(
			'model'=>$model,
		));
            }else{
                 $this->redirect(array('site/index'));
            }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Page::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='page-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function getPageByPageTypeId($id)
	{
                $command = Yii::app()->db->createCommand();
                $result = $command->select('*')
                                  ->from('gs_page')
                                  ->where('page_type_id=:page_type_id', array(':page_type_id'=>$id))
                                  ->queryAll();

                return $result;
	}
}
