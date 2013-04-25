<?php

class GalleryController extends Controller
{
	public function actionIndex()
	{
                $criteria = new CDbCriteria();
                $criteria->condition = "status = 1";
                $criteria->order = "sort_order asc,gallery_id asc";
                $model = Gallery::model()->findAll($criteria);

		$this->render('index',array('gallery'=>$model));

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