<?php

class CooperationController extends Controller
{
	public function actionIndex()
	{
                if(isset($_GET['type_id'])){
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND co_type_id ='.$_GET['type_id'];                
                    $criteria->order = 'sort_order ASC ,co_id ASC';
                    
                    $co_total = Cooperation::model()->count($criteria);                    
                    
                    $pages = new CPagination($co_total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);
                    
                    $model = Cooperation::model()->findAll($criteria);                                        

                    $this->render('index',array('model'=>$model,'pages'=> $pages,));
                }else if(isset($_GET['id'])){
                    $model=Cooperation::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1';                
                    $criteria->order = 'sort_order ASC ,co_id ASC';
                    
                    $co_total = Cooperation::model()->count($criteria);                    
                    
                    $pages = new CPagination($co_total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);
                    
                    $model = Cooperation::model()->findAll($criteria);                              
                    $this->render('index',array('model'=>$model,'pages'=> $pages,));
                }

	}
        
        public function actionInbound()
	{
                if(isset($_GET['id'])){
                    $model=Cooperation::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $criteria = new CDbCriteria();
		$criteria->select = '*';
                $criteria->condition = 'status=:status AND t.group=:group';
                $criteria->params=array(':status'=>1,':group'=>'inbound');               
                $criteria->order = 'sort_order ASC ,co_id ASC';	
                
                $co_total = Cooperation::model()->count($criteria);                    

                $pages = new CPagination($co_total);
                $pages->setPageSize(20);
                $pages->applyLimit($criteria);
                
		$model = Cooperation::model()->findAll($criteria);                              
                $this->render('inbound',array('model'=>$model,'pages'=> $pages,));
                }

	}
        
        public function actionOutbound()
	{
                if(isset($_GET['id'])){
                    $model=Cooperation::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $criteria = new CDbCriteria();
		$criteria->select = '*';
                $criteria->condition = 'status=:status AND t.group=:group';
                $criteria->params=array(':status'=>1,':group'=>'outbound');               
                $criteria->order = 'sort_order ASC ,co_id ASC';	
                
                $co_total = Cooperation::model()->count($criteria);                    

                $pages = new CPagination($co_total);
                $pages->setPageSize(20);
                $pages->applyLimit($criteria);
                
		$model = Cooperation::model()->findAll($criteria);                              
                $this->render('outbound',array('model'=>$model,'pages'=> $pages,));
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