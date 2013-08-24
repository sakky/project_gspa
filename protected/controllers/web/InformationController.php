<?php

class InformationController extends Controller
{
        public $thai_month_arr=array(  
                                "0"=>"",  
                                "1"=>"ม.ค.",  
                                "2"=>"ก.พ.",  
                                "3"=>"มี.ค.",  
                                "4"=>"เม.ย.",  
                                "5"=>"พ.ค.",  
                                "6"=>"มิ.ย.",   
                                "7"=>"ก.ค.",  
                                "8"=>"ส.ค.",  
                                "9"=>"ก.ย.",  
                                "10"=>"ต.ค.",  
                                "11"=>"พ.ย.",  
                                "12"=>"ธ.ค."                    
                            );  
	
	public function actionIndex()
	{
                 if(isset($_GET['id'])){
                    $model=Document::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else if($_GET['type_id']){
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND doc_group=\'service\' AND doc_type_id='.$_GET['type_id'];                
                    $criteria->order = 'sort_order';
                    
                    $total = Document::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);                      

                    $model = Document::model()->findAll($criteria); 
                    $type=DocumentType::model()->findByPk($_GET['type_id']);                     
                    $this->render('index',array('model'=>$model,'type'=>$type,'pages'=> $pages,));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND doc_group=\'service\'';                
                    $criteria->order = 'sort_order';
                    
                    $total = Document::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);

                    $model = Document::model()->findAll($criteria);

                    $this->render('index',array('model'=>$model,'pages'=> $pages,));
                }
	}

        public function actionDownload()
	{
                if(isset($_GET['id'])){
                    $model=Document::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND doc_group=\'service\' AND doc_type_id = 5';                
                    $criteria->order = 'sort_order';
                    $total = Document::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);
                    $model = Document::model()->findAll($criteria);

                    $this->render('download',array('model'=>$model,'pages'=> $pages,));
                }
	}
        
        public function actionLibrary()
	{
                if(isset($_GET['id'])){
                    $model=Document::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND doc_group=\'service\' AND doc_type_id = 6';                
                    $criteria->order = 'sort_order';
                    $total = Document::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);                    

                    $model = Document::model()->findAll($criteria);

                    $this->render('library',array('model'=>$model,'pages'=> $pages,));
                }
	}
        
        public function thai_date($time){  

            $thai_date_return = date("j",$time)." ".$this->thai_month_arr[date("n",$time)]." ".(date("Y",$time)+543);  
            return $thai_date_return;  
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
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Information the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=  Document::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}