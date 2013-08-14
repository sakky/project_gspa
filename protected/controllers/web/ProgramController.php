<?php

class ProgramController extends Controller
{
	public function actionIndex()
	{
		if(isset($_GET['id'])){
                    $model=Program::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'program_type=:program_type AND status = 1';                
		$criteria->params=array(':program_type'=>'Master');
                $criteria->order = 'sort_order';
		
		$master = Program::model()->findAll($criteria);
                
                $criteria2 = new CDbCriteria();
		$criteria2->select = '*';
		$criteria2->condition = 'program_type=:program_type AND status = 1';
		$criteria2->params=array(':program_type'=>'Doctor');
                $criteria2->order = 'sort_order';
		
		$doctor = Program::model()->findAll($criteria2);
                
                $this->render('index',array('master'=>$master,'doctor'=>$doctor));
                }
	}
        public function actionMaster()
	{
                if(isset($_GET['id'])){
                    $model=Program::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND program_type=\'Master\'';                
                    $criteria->order = 'sort_order';
                    $total = Program::model()->count($criteria); 
                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);                
		
                    $model = Program::model()->findAll($criteria);

                    $this->render('master',array('model'=>$model,'pages'=> $pages));
                }
	}
        
        public function actionDoctor()
	{
                if(isset($_GET['id'])){
                    $model=Program::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND program_type=\'Doctor\'';                
                    $criteria->order = 'sort_order';
                    $total = Program::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);                   
		
                    $model = Program::model()->findAll($criteria);

                    $this->render('doctor',array('model'=>$model,'pages'=> $pages));
                }
	}
//        public function actionAdmission()
//	{
//		
//                    $model=Page::model()->findByPk($_GET['id']);
//                    $this->render('admission',array('model'=>$model));
//               
//	}

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