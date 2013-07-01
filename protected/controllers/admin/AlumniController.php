<?php

class AlumniController extends AdminController
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
		$this->upload_path = Yii::app()->basePath . '/../uploads/alumni/';
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
            if($this->menu_use[11]){                 
		$model=new Alumni;
                $group = $model->alumni_group;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $alumni_no_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND alumni_group=:alumni_group';
		$criteria->params=array(':status'=>1,':alumni_group'=>$group);
                $criteria->order = 'name_th';
                $co_type = AlumniNo::model()->findAll($criteria);
                
                foreach($co_type as $type) {
			$alumni_no_list[$type->alumni_no_id] = $type->name_th;
		}
                
		if(isset($_POST['Alumni']))
		{
                        $_POST['Alumni']['user_id'] = Yii::app()->user->id;
			$model->attributes=$_POST['Alumni'];
                        $image = CUploadedFile::getInstance($model, 'image');	
		
			if($image) {

				$genName = 'alumni_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->image = $saveName . '.' . $image->getExtensionName();
			}
			if($model->save()){
                                if($image) {
					$image->saveAs($this->upload_path . $model->image);
				}
                                $this->redirect(array('index'));
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
                        'alumni_no_list'=>$alumni_no_list
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
            if($this->menu_use[11]){             
		$model=$this->loadModel($id);
                $group = $model->alumni_group;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $alumni_no_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND alumni_group=:alumni_group';
		$criteria->params=array(':status'=>1,':alumni_group'=>$group);
                $criteria->order = 'name_th';
                $co_type = AlumniNo::model()->findAll($criteria);
                
                foreach($co_type as $type) {
			$alumni_no_list[$type->alumni_no_id] = $type->name_th;
		}

		if(isset($_POST['Alumni']))
		{
                        $record_image = $model->image;
                        $_POST['Alumni']['user_id'] = Yii::app()->user->id;
                        
			$model->attributes=$_POST['Alumni'];
                        $image = CUploadedFile::getInstance($model, 'image');	
		
			if($image) {			
				$genName = 'alumni_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->image = $saveName . '.' . $image->getExtensionName();
			}
			if($model->save()){
                                if($image) {
					if(file_exists($this->upload_path . $record_image)) {
						@unlink($this->upload_path . $record_image);
					}
				
					$image->saveAs($this->upload_path . $model->image);
				}
                                $this->redirect(array('index'));
                        }else {
				$model->image = $record_image;
			}
				
		}

		$this->render('update',array(
			'model'=>$model,
                        'alumni_no_list'=>$alumni_no_list,
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
            if($this->menu_use[11]){              
		$model=new Alumni('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Alumni']))
			$model->attributes=$_GET['Alumni'];

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
            if($this->menu_use[11]){              
		$model=new Alumni('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Alumni']))
			$model->attributes=$_GET['Alumni'];

		$this->render('admin',array(
			'model'=>$model,
		));
            }else{
                $this->redirect(array('site/index'));
            }      
	}
        
        public function actionOrder()
        {
            if($this->menu_use[11]){             
                // Handle the POST request data submission
                if (isset($_POST['Order']))
                {
                    // Since we converted the Javascript array to a string,
                    // convert the string back to a PHP array
                    $models = explode(',', $_POST['Order']);

                    for ($i = 0; $i < sizeof($models); $i++)
                    {
                        if ($model = Alumni::model()->findbyPk($models[$i]))
                        {
                            $model->sort_order = $i;

                            $model->save();
                        }
                    }
                }
                // Handle the regular model order view
                else
                {
                    $dataProvider = new CActiveDataProvider('Alumni', array(
                        'pagination' => false,
                        'criteria' => array(
                            'order' => 'sort_order ASC, alumni_id DESC',
                        ),
                    ));

                    $this->render('order',array(
                        'dataProvider' => $dataProvider,
                    ));
                }
            }else{
                $this->redirect(array('site/index'));
            }               
        }
        
        public function actionType()
        {
               $group =  (!empty($_POST['alumni_group'])) ? $_POST['alumni_group']: '';
               $data=AlumniNo::model()->findAll('t.alumni_group=:alumni_group',
                                array(':alumni_group'=>$group));

                $data=CHtml::listData($data,'alumni_no_id','name_th');
                foreach($data as $value=>$name_th)
                {
                echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name_th),true);
                }

        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Alumni the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Alumni::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Alumni $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alumni-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
