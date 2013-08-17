<?php

class AboutController extends Controller
{
	public function actionIndex($id)
	{
                $model=$this->loadModel($id);
		$this->render('index',array(
			'model'=>$model));
	}
        public function actionBoard()
	{
                if(isset($_GET['id'])){
                    $model =$this->loadBoardModel($_GET['id']);
                    $this->render('board_detail',array(
                            'model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1';                
                    $criteria->order = 'sort_order';
                    $total = Board::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(10);
                    $pages->applyLimit($criteria);                    
                    $model = Board::model()->findAll($criteria);
                    $this->render('board',array('model'=>$model,'pages'=> $pages,));

                }
	}
        
        public function actionExecutive()
	{
                if(isset($_GET['id'])){
                     $model =$this->loadExecutiveModel($_GET['id']);
                     $this->render('executive_detail',array(
                            'model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1';                
                    $criteria->order = 'sort_order';
                    $total = Executive::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(10);
                    $pages->applyLimit($criteria);                    
                    $model = Executive::model()->findAll($criteria);
                    $this->render('executive',array('model'=>$model,'pages'=> $pages,));                    
                }
	}
        public function actionStructure()
	{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1';                
                    $criteria->order = 'sort_order';
                    $total = StructureType::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(10);
                    $pages->applyLimit($criteria);                    
                    $model = StructureType::model()->findAll($criteria);
                    $this->render('structure',array('model'=>$model,'pages'=> $pages,));               


	}
        public function actionPersonnel()
	{
                if(isset($_GET['id'])){
                    $model =$this->loadPersonnelModel($_GET['id']);
                    $this->render('personnel_detail',array(
                            'model'=>$model));
                }else if(isset($_GET['type_id'])){
                    $type_id = $_GET['type_id'];
                    $type=PersonnelType::model()->findByPk($_GET['type_id']);
                    $criteria = new CDbCriteria();
                    $criteria->condition = 'status = 1 AND personnel_type_id ='.$type_id;
                    $criteria->order = 'sort_order';
                    $total = Personnel::model()->count($criteria); 
                    $pages = new CPagination($total);
                    $pages->setPageSize(10);
                    $pages->applyLimit($criteria);                    
                    $model = Personnel::model()->findAll($criteria);
                    $this->render('personnel',array(
                            'model'=>$model,'type'=>$type,'pages'=> $pages,));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1';                
                    $criteria->order = 'sort_order';
                    $total = Personnel::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(10);
                    $pages->applyLimit($criteria);                    
                    $model = Personnel::model()->findAll($criteria);
                    $this->render('personnel',array('model'=>$model,'pages'=> $pages,));
                    
                }
	}
        
        public function loadModel($id)
	{
		$model=Page::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function loadBoardModel($id)
	{
		$model=Board::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
     
        public function loadExecutiveModel($id)
	{
		$model=Executive::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function loadPersonnelModel($id)
	{
		$model=  Personnel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}      
        public function getAllStructureType()
	{
		$Criteria = new CDbCriteria();
                $Criteria->condition = 'status = 1';
                $Criteria->order = 'sort_order';
            
                $model=StructureType::model()->findAll($Criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');	
		return $model;
	}
        public function getAllStructure()
	{
		$Criteria = new CDbCriteria();
                $Criteria->condition = 'status = 1';
                $Criteria->order = 'sort_order';
            
                $model=Structure::model()->findAll($Criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');	
		return $model;
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