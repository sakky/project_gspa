<?php

class UserController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        
        public $user_role;
        
        public function init() {

                $this->user_role = $this->getUserRole(Yii::app()->user->id);
 
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
             if($this->user_role=='top_admin'){             
		$user_groups= UserGroup::model()->findAll();
		$user_group_data = array();
		foreach($user_groups as $user_group) {
			$user_group_data[$user_group->user_group_id] = $user_group->name;
		}
	
		$user=new User;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$_POST['User']['credate_date'] = date('Y-m-d H:i:s');

			$user->attributes=$_POST['User'];
			if($user->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'user'=>$user,
			'user_group_data'=>$user_group_data,
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
             if($this->user_role=='top_admin'){             
		$user_groups= UserGroup::model()->findAll();
		$user_group_data = array();
		foreach($user_groups as $user_group) {
			$user_group_data[$user_group->user_group_id] = $user_group->name;
		}	
	
		$user=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
                        $_POST['User']['last_login'] = date('Y-m-d H:i:s');
			$user->attributes=$_POST['User'];
                        
			if($user->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'user'=>$user,
			'user_group_data'=>$user_group_data,
		));
            }else{
                $this->redirect(array('site/index'));
            }                    
	}
        
        public function actionEdit($id)
	{          
		$user_groups= UserGroup::model()->findAll();
		$user_group_data = array();
		foreach($user_groups as $user_group) {
			$user_group_data[$user_group->user_group_id] = $user_group->name;
		}	
	
		$user=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
                        $_POST['User']['last_login'] = date('Y-m-d H:i:s');
			$user->attributes=$_POST['User'];
                        
			if($user->save())
				$this->redirect(array('site/index'));
		}

		$this->render('edit',array(
			'user'=>$user,
			'user_group_data'=>$user_group_data,
		));                
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		try {
			$this->loadModel($id)->delete();
		} catch(Exception $e) {
			//Do something
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
             if($this->user_role=='top_admin'){
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
             if($this->user_role=='top_admin'){
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
