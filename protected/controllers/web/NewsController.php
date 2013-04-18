<?php

class NewsController extends Controller
{
	public function actionIndex()
	{
                if(isset($_GET['id'])){
                    $model=News::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));
                }else{
                $news_criteria = new CDbCriteria();
                $news_criteria->condition = "status = 1";
                $news_criteria->order = "create_date desc,news_id desc";
                $news = News::model()->findAll($news_criteria);
                
		$this->render('index',array('news'=>$news));
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