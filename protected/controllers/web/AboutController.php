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
                    $model = $this->getAllBoard();
                    $this->render('board',array(
                            'model'=>$model));
                }
	}
        
        public function actionExecutive()
	{
                if(isset($_GET['id'])){
                     $model =$this->loadExecutiveModel($_GET['id']);
                     $this->render('executive_detail',array(
                            'model'=>$model));
                }else{
                    $model = $this->getAllExeutive();
                    $this->render('executive',array(
                            'model'=>$model));
                }
	}
        public function actionStructure()
	{
                
                $model = $this->getAllStructureType();
                $this->render('structure',array(
                        'model'=>$model));

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
        
        public function getAllExeutive()
	{
		$Criteria = new CDbCriteria();
                $Criteria->condition = 'status = 1';
                $Criteria->order = 'sort_order';
            
                $model=  Executive::model()->findAll($Criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');	
		return $model;
	}
        public function getAllBoard()
	{
		$Criteria = new CDbCriteria();
                $Criteria->condition = 'status = 1';
                $Criteria->order = 'sort_order';
            
                $model=Board::model()->findAll($Criteria);
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