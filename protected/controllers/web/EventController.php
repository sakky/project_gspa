<?php

class EventController extends Controller
{
	public function actionIndex()
	{               
                if(isset($_GET['id'])){
                    $model=Event::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $criteria = new CDbCriteria();
		$criteria->select = '*';
                $criteria->condition = "event_start >= ".date('Y-m-d')." AND event_status = 1";
                $criteria->order = "event_start ,event_id";
                
                
                $event_total = Event::model()->count($criteria);
	
		$pages = new CPagination($event_total);
                $pages->setPageSize(10);
                $pages->applyLimit($criteria);
                
                $model = Event::model()->findAll($criteria);
                
		$this->render('index',array('model'=>$model,'pages'=> $pages,));
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