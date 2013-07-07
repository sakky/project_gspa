<?php

class ReportController extends Controller
{
	public function actionIndex()
	{
             if(isset($_GET['type_id'])){
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND report_type_id ='.$_GET['type_id'];                
                    $criteria->order = 'sort_order';
                    $total = Report::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);
                    
                    $model = Report::model()->findAll($criteria);    
                    
                    $type = ReportType::model()->findByPK($_GET['type_id']);  
                    $this->render('index',array('model'=>$model,'type'=>$type,'pages'=> $pages));
                    
                }else if(isset($_GET['id'])){
                    $model=Report::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1';                
                    $criteria->order = 'sort_order';
                    $total = Report::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);                    
                    $model = Report::model()->findAll($criteria);    
                    $this->render('index',array('model'=>$model,'pages'=> $pages));
                }

	}               
        
        
        public function actionDetail()
	{
		$this->render('index');
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