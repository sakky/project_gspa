<?php

class AlumniController extends Controller
{
	public function actionIndex()
	{
                if(isset($_GET['id'])){
                    $model=Alumni::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else if(isset($_GET['type_id'])){
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND alumni_no_id='.$_GET['type_id'];                
                    $criteria->order = 'sort_order';
                    $model = Alumni::model()->findAll($criteria);
                    $this->render('index',array('model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1';                
                    $criteria->order = 'sort_order';
                    $model = Alumni::model()->findAll($criteria);
                    $this->render('index',array('model'=>$model));
                }
	}
        
        public function actionMaster()
	{
                if(isset($_GET['id'])){
                    $model=Alumni::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'status = 1 AND alumni_group=\'Master\'';                
                $criteria->order = 'sort_order';
		
		$model = Alumni::model()->findAll($criteria);
                
                $this->render('master',array('model'=>$model));
                }
	}
        
        public function actionDoctor()
	{
                if(isset($_GET['id'])){
                    $model=Alumni::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'status = 1 AND alumni_group=\'Doctor\'';                
                $criteria->order = 'sort_order';
		
		$model = Alumni::model()->findAll($criteria);
                
                $this->render('doctor',array('model'=>$model));
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