<?php

class KnowledgeController extends Controller
{
	public function actionIndex()
	{
		if(isset($_GET['id'])){
                    $model=Knowledge::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else if($_GET['type_id']){
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND know_type_id='.$_GET['type_id'];                
                    $criteria->order = 'sort_order';

                    $model = Knowledge::model()->findAll($criteria);                              
                    $this->render('index',array('model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1';                
                    $criteria->order = 'sort_order';


                    $model = Knowledge::model()->findAll($criteria);                              
                    $this->render('index',array('model'=>$model));
                }
	}
        
        public function actionGroup1()
	{
		    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND know_group=1';                
                    $criteria->order = 'sort_order';

                    $model = Knowledge::model()->findAll($criteria);                              
                    $this->render('index',array('model'=>$model));
	}
        
        public function actionGroup2()
	{
		    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND know_group=2';                
                    $criteria->order = 'sort_order';

                    $model = Knowledge::model()->findAll($criteria);                              
                    $this->render('index',array('model'=>$model));
	}
        
        public function actionGroup3()
	{
		    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND know_group=3';                
                    $criteria->order = 'sort_order';

                    $model = Knowledge::model()->findAll($criteria);                              
                    $this->render('index',array('model'=>$model));
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