<?php

class NewsController extends Controller
{
	public function actionIndex()
	{
                if(isset($_GET['id'])){
                    $model=News::model()->findByPk($_GET['id']);
                    
                    $model_photo=Photo::model()->getPhotoByAlbum($_GET['id']);
                    //print_r($model_photo);
                    $this->render('detail',array('model'=>$model, 'model_photo'=>$model_photo));
                }else if($_GET['type_id']){
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND news_type_id='.$_GET['type_id'];                
                    $criteria->order  = "create_date desc,news_id desc";
                    
                    $total = News::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);                      

                    $model = News::model()->findAll($criteria); 
                    $type=NewsType::model()->findByPk($_GET['type_id']);                     
                    $this->render('index',array('model'=>$model,'type'=>$type,'pages'=> $pages,));
                }else if($_GET['group']){
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'status = 1 AND (news_type_id <> 2 AND news_type_id <> 3) AND news_group_id='.$_GET['group'];                
                    $criteria->order  = "create_date desc,news_id desc";
                    
                    $total = News::model()->count($criteria);                    
                    
                    $pages = new CPagination($total);
                    $pages->setPageSize(20);
                    $pages->applyLimit($criteria);                      

                    $model = News::model()->findAll($criteria); 
                    $group=NewsGroup::model()->findByPk($_GET['group']);                      
                    $this->render('index',array('model'=>$model,'group'=>$group,'pages'=> $pages,));
                }else{
                    $news_criteria = new CDbCriteria();
                    $news_criteria->condition = "status = 1 AND (news_type_id <> 2 AND news_type_id <> 3)";
                    $news_criteria->order = "create_date desc,news_id desc";


                    $news_total = News::model()->count($news_criteria);

                    $pages = new CPagination($news_total);
                    $pages->setPageSize(10);
                    $pages->applyLimit($news_criteria);

                    $model = News::model()->findAll($news_criteria);

                    $this->render('index',array('model'=>$model,'pages'=> $pages,));
                }
                
	}
	public function actionInside()
	{
                if(isset($_GET['id'])){
                    $model=News::model()->findByPk($_GET['id']);
                    
                    $model_photo=Photo::model()->getPhotoByAlbum($_GET['id']);
                    //print_r($model_photo);
                    $this->render('detail',array('model'=>$model, 'model_photo'=>$model_photo));
                }else{
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "status = 1 AND news_type_id = 5";
                $news_criteria->order = "create_date desc,news_id desc";
                
                
                $news_total = News::model()->count($news_criteria);
	
		$pages = new CPagination($news_total);
                $pages->setPageSize(10);
                $pages->applyLimit($news_criteria);
                
                $news = News::model()->findAll($news_criteria);
                
		$this->render('news',array('news'=>$news,'pages'=> $pages,));
                }
                
	}        
        public function actionMedia()
	{
                if(isset($_GET['id'])){
                    $model=News::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "status = 1 AND news_type_id = 1";
                $news_criteria->order = "create_date desc,news_id desc";
                
                $news_total = News::model()->count($news_criteria);
	
		$pages = new CPagination($news_total);
                $pages->setPageSize(10);
                $pages->applyLimit($news_criteria);
                
                $news = News::model()->findAll($news_criteria);
                
		$this->render('media',array('news'=>$news,'pages'=> $pages,));
                }
                
	}
        public function actionGroup($id)
	{
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "status = 1 AND news_group_id =".$id;
                $news_criteria->order = "create_date desc,news_id desc";
                                
                $news_total = News::model()->count($news_criteria);
                
                $newsGroup = NewsGroup::model()->findByPk($id);
		
                $pages = new CPagination($news_total);
                $pages->setPageSize(10);
                $pages->applyLimit($news_criteria);
                
                $news = News::model()->findAll($news_criteria);
                
		$this->render('news',array('news'=>$news,'pages'=> $pages,'newsGroup'=> $newsGroup));
                
	}
        
        public function actionGroupMedia($id)
	{
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "status = 1 AND news_group_id =".$id;
                $news_criteria->order = "create_date desc,news_id desc";
                                
                $news_total = News::model()->count($news_criteria);
                
                $newsGroup = NewsGroup::model()->findByPk($id);
	
		$pages = new CPagination($news_total);
                $pages->setPageSize(10);
                $pages->applyLimit($news_criteria);
                
                $news = News::model()->findAll($news_criteria);
                
		$this->render('media',array('news'=>$news,'pages'=> $pages,'newsGroup'=> $newsGroup));
                
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