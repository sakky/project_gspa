<?php

class UserGroupController extends AdminController
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
		$model=new UserGroup;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'sort_order';
                $menu_list = UserMenu::model()->findAll($criteria);
		if(isset($_POST['UserGroup']))
		{
                        $sep = "";
                        $user_menu = "";
                        if(isset($_POST['user_menu'])){
                        // echo "<pre>".print_r($_POST['user_menu'])."</pre>";
                            $count_menu = count($_POST['user_menu']);
                            $menu_list = array();
                            $menu_list = $_POST['user_menu'];

                            foreach ($menu_list as $key=>$value){
                                $user_menu .= $sep.$value;
                                $sep = ",";
                            }
                        }

                        $_POST['UserGroup']['user_menu'] = $user_menu;
			$model->attributes=$_POST['UserGroup'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
                        'menu_list' => $menu_list
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
		$model=$this->loadModel($id);
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status';
		$criteria->params=array(':status'=>1);
                $criteria->order = 'sort_order';
                $menu_list = UserMenu::model()->findAll($criteria);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserGroup']))
		{
                   $sep = "";
                   $user_menu = "";
                   if(isset($_POST['user_menu'])){
                       // echo "<pre>".print_r($_POST['user_menu'])."</pre>";
                        $count_menu = count($_POST['user_menu']);
                        $menu_list = array();
                        $menu_list = $_POST['user_menu'];

                        foreach ($menu_list as $key=>$value){
                            $user_menu .= $sep.$value;
                            $sep = ",";
                        }
                    }

                        $_POST['UserGroup']['user_menu'] = $user_menu;
                
			$model->attributes=$_POST['UserGroup'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
                        'menu_list' => $menu_list
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
             if($this->user_role=='top_admin'){              
		$model=new UserGroup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserGroup']))
			$model->attributes=$_GET['UserGroup'];

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
		$model=new UserGroup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserGroup']))
			$model->attributes=$_GET['UserGroup'];

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
	 * @return UserGroup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserGroup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserGroup $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-group-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
