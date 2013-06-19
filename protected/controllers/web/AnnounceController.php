<?php

class AnnounceController extends Controller
{
	public function actionIndex()
	{               
		$this->render('index');
	}

        public function actionAdmission()
	{
                if(isset($_GET['id'])){
                    $model=News::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "status = 1 AND news_type_id = 2";
                $news_criteria->order = "create_date desc,news_id desc";
                
                $news_total = News::model()->count($news_criteria);
	
		$pages = new CPagination($news_total);
                $pages->setPageSize(20);
                $pages->applyLimit($news_criteria);
                
                $news = News::model()->findAll($news_criteria);
                
		$this->render('admission',array('news'=>$news,'pages'=> $pages,));
                }
	}
        
        public function actionJob()
	{
                if(isset($_GET['id'])){
                    $model=News::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "status = 1 AND news_type_id = 3";
                $news_criteria->order = "create_date desc,news_id desc";
                
                $news_total = News::model()->count($news_criteria);
	
		$pages = new CPagination($news_total);
                $pages->setPageSize(20);
                $pages->applyLimit($news_criteria);
                
                $news = News::model()->findAll($news_criteria);
                
		$this->render('job',array('news'=>$news,'pages'=> $pages,));
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