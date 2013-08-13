<?php

class DirectlineController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $user_group_menu;
        public $menu_use = array(); 

        public function init() {
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
            if($this->menu_use[15]){  
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
            }else{
                $this->redirect(array('site/index'));
            }   
                
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            if($this->menu_use[15]){  
		$model=new Directline;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Directline']))
		{
			$model->attributes=$_POST['Directline'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->direct_id));
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
            if($this->menu_use[15]){             
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Directline']))
		{
			$model->attributes=$_POST['Directline'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->direct_id));
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
            if($this->menu_use[15]){              
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }else{
                $this->redirect(array('site/index'));
            }  
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            if($this->menu_use[15]){ 
//		$dataProvider=new CActiveDataProvider('Directline');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
		$model=new Directline('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Directline']))
			$model->attributes=$_GET['Directline'];

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
            if($this->menu_use[15]){             
		$model=new Directline('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Directline']))
			$model->attributes=$_GET['Directline'];

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
	 * @return Directline the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Directline::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Directline $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='directline-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
