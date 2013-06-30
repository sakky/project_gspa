<?php

class KnowledgeController extends AdminController
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
		$model=new Knowledge;
                
                $group = $model->know_group;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $know_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND t.know_group=:know_group';
		$criteria->params=array(':status'=>1,':know_group'=>$group);
                $criteria->order = 'name_th';
                $know_type = KnowledgeType::model()->findAll($criteria);
                
                foreach($know_type as $type) {
			$know_type_list[$type->know_type_id] = $type->name_th;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Knowledge']))
		{
                        $_POST['Knowledge']['user_id'] = Yii::app()->user->id;
			$model->attributes=$_POST['Knowledge'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
                        'know_type_list'=>$know_type_list
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
                $group = $model->know_group;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $know_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND t.know_group=:know_group';
		$criteria->params=array(':status'=>1,':know_group'=>$group);
                $criteria->order = 'name_th';
                $know_type = KnowledgeType::model()->findAll($criteria);
                
                foreach($know_type as $type) {
			$know_type_list[$type->know_type_id] = $type->name_th;
		}
		if(isset($_POST['Knowledge']))
		{
                        $_POST['Knowledge']['user_id'] = Yii::app()->user->id;
			$model->attributes=$_POST['Knowledge'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
                        'know_type_list'=>$know_type_list
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
		$model=new Knowledge('search');
                $group = $model->know_group;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $know_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND t.know_group=:know_group';
		$criteria->params=array(':status'=>1,':know_group'=>$group);
                $criteria->order = 'name_th';
                $know_type = KnowledgeType::model()->findAll($criteria);
                
                foreach($know_type as $type) {
			$know_type_list[$type->know_type_id] = $type->name_th;
		}
                
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Knowledge']))
			$model->attributes=$_GET['Knowledge'];

		$this->render('admin',array(
			'model'=>$model,
                        'know_type_list'=>$know_type_list
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Knowledge('search');
                $group = $model->know_group;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $know_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND t.know_group=:know_group';
		$criteria->params=array(':status'=>1,':know_group'=>$group);
                $criteria->order = 'name_th';
                $know_type = KnowledgeType::model()->findAll($criteria);
                
                foreach($know_type as $type) {
			$know_type_list[$type->know_type_id] = $type->name_th;
		}
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Knowledge']))
			$model->attributes=$_GET['Knowledge'];

		$this->render('admin',array(
			'model'=>$model,
                        'know_type_list'=>$know_type_list
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
                    if ($model = Knowledge::model()->findbyPk($models[$i]))
                    {
                        $model->sort_order = $i;

                        $model->save();
                    }
                }
            }
            // Handle the regular model order view
            else
            {
                $dataProvider = new CActiveDataProvider('Knowledge', array(
                    'pagination' => false,
                    'criteria' => array(
                        'order' => 'sort_order ASC, know_id ASC',
                    ),
                ));

                $this->render('order',array(
                    'dataProvider' => $dataProvider,
                ));
            }
        }
        
        public function actionType()
        {
               $group =  (!empty($_POST['know_group'])) ? $_POST['know_group']: '';
               $data=KnowledgeType::model()->findAll('t.know_group=:know_group',
                                array(':know_group'=>$group));

                $data=CHtml::listData($data,'know_type_id','name_th');
                foreach($data as $value=>$name_th)
                {
                echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name_th),true);
                }

        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Knowledge the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Knowledge::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Knowledge $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='knowledge-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
