<?php

class LogController extends AdminController
{
        public $user_role;
        
        public function init() {

                $this->user_role = $this->getUserRole(Yii::app()->user->id);
 
	}
	public function actionIndex()
	{
             if($this->user_role=='top_admin'){ 
                $model=new LogLogin;
		$this->render('index',array(
			'model'=>$model,
		));
             }else{
                $this->redirect(array('site/index'));
            }  
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}