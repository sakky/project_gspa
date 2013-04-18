<?php

class LeftMenuController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	

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
		$model=new LeftMenu;
                $page_type_list = array();
		
                $type = PageType::model()->findAll('status=1');
                
                foreach($type as $page_type) {
			$page_type_list[$page_type->page_type_id] = $page_type->name_th;
		}
                
                $page_id_list = array();
		
                $page = Page::model()->findAll('status=1');
                
                foreach($page as $page_list) {
			$page_id_list[$page_list->page_id] = $page_list->name_th;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LeftMenu']))
		{
			$_POST['LeftMenu']['user_id'] = Yii::app()->user->id;
                        
                        $model->attributes=$_POST['LeftMenu'];
			if($model->save()){
                            $this->redirect(array('index'));
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
                        'page_type_list'=>$page_type_list,
                        'page_id_list'=>$page_id_list,
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
                $page_id_list = array();
		
                $page = Page::model()->findAll('status=1');
                
                foreach($page as $page_list) {
			$page_id_list[$page_list->page_id] = $page_list->name_th;
		}

		if(isset($_POST['LeftMenu']))
		{			
                        $_POST['LeftMenu']['user_id'] = Yii::app()->user->id;                       
                        
                        $model->attributes=$_POST['LeftMenu'];
                        
			if($model->save()){                           
                            $this->redirect(array('index'));
                        }
				
		}

		$this->render('update',array(
			'model'=>$model,
                        'page_type_list'=>$page_type_list,
                        'page_id_list'=>$page_id_list,
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
//		$dataProvider=new CActiveDataProvider('LeftMenu');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
                $model=new LeftMenu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeftMenu']))
			$model->attributes=$_GET['LeftMenu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LeftMenu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeftMenu']))
			$model->attributes=$_GET['LeftMenu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LeftMenu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LeftMenu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LeftMenu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='left-menu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
