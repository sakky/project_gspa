<?php

class StudentServiceTypeController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new StudentServiceType;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $ser_group_list = array();
                $criteria = new CDbCriteria();
                $criteria->order = 'ser_group';
                $ser_group = StudentServiceGroup::model()->findAll($criteria);
                
                foreach($ser_group as $type) {
			$ser_group_list[$type->ser_group] = $type->ser_name;
		}
		if(isset($_POST['StudentServiceType']))
		{
			$model->attributes=$_POST['StudentServiceType'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
                        'ser_group_list'=>$ser_group_list
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $ser_group_list = array();
                $criteria = new CDbCriteria();
                $criteria->order = 'ser_group';
                $ser_group = StudentServiceGroup::model()->findAll($criteria);
                
                foreach($ser_group as $type) {
			$ser_group_list[$type->ser_group] = $type->ser_name;
		}
		if(isset($_POST['StudentServiceType']))
		{
			$model->attributes=$_POST['StudentServiceType'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
                        'ser_group_list'=>$ser_group_list
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new StudentServiceType('search');
                $ser_group_list = array();
                $criteria = new CDbCriteria();
                $criteria->order = 'ser_group';
                $ser_group = StudentServiceGroup::model()->findAll($criteria);
                
                foreach($ser_group as $type) {
			$ser_group_list[$type->ser_group] = $type->ser_name;
		}
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentServiceType']))
			$model->attributes=$_GET['StudentServiceType'];

		$this->render('admin',array(
			'model'=>$model,
                        'ser_group_list'=>$ser_group_list
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentServiceType('search');
                $ser_group_list = array();
                $criteria = new CDbCriteria();
                $criteria->order = 'ser_group';
                $ser_group = StudentServiceGroup::model()->findAll($criteria);
                
                foreach($ser_group as $type) {
			$ser_group_list[$type->ser_group] = $type->ser_name;
		}
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentServiceType']))
			$model->attributes=$_GET['StudentServiceType'];

		$this->render('admin',array(
			'model'=>$model,
                        'ser_group_list'=>$ser_group_list
		));
	}
        public function actionOrder()
        {
            // Handle the POST request data submission
            if (isset($_POST['Order']))
            {
                // Since we converted the Javascript array to a string,
                // convert the string back to a PHP array
                $models = explode(',', $_POST['Order']);

                for ($i = 0; $i < sizeof($models); $i++)
                {
                    if ($model = StudentServiceType::model()->findbyPk($models[$i]))
                    {
                        $model->sort_order = $i;

                        $model->save();
                    }
                }
            }
            // Handle the regular model order view
            else
            {
                $dataProvider = new CActiveDataProvider('StudentServiceType', array(
                    'pagination' => false,
                    'criteria' => array(
                        'order' => 'sort_order ASC, ser_type_id ASC',
                    ),
                ));

                $this->render('order',array(
                    'dataProvider' => $dataProvider,
                ));
            }
        }
        
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return StudentServiceType the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=StudentServiceType::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param StudentServiceType $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-service-type-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
