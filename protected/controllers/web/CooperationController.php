<?php

class CooperationController extends Controller
{
	public function actionIndex()
	{
                if(isset($_GET['id'])){
                    $model=Cooperation::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'status = 1';                
                $criteria->order = 'sort_order ASC ,co_id ASC';

		
		$model = Cooperation::model()->findAll($criteria);                              
                $this->render('index',array('model'=>$model));
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