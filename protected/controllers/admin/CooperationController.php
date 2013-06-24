<?php

class CooperationController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';


	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */

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
		$model=new Cooperation;
                $group = $model->group;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $co_type_list = array();
                $criteria = new CDbCriteria();
                 $criteria->condition = 'status=:status AND t.group=:group';
		$criteria->params=array(':status'=>1,':group'=>$group);
                $criteria->order = 'name_th';
                $co_type = CooperationType::model()->findAll($criteria);
                
                foreach($co_type as $type) {
			$co_type_list[$type->co_type_id] = $type->name_th;
		}
		if(isset($_POST['Cooperation']))
		{       
                        $_POST['Cooperation']['user_id'] = Yii::app()->user->id;
			$model->attributes=$_POST['Cooperation'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
                        'co_type_list'=>$co_type_list
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
                
                $group = $model->group;
                
                $co_type_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND t.group=:group';
		$criteria->params=array(':status'=>1,':group'=>$group);
                $criteria->order = 'name_th';
                $co_type = CooperationType::model()->findAll($criteria);
                
                foreach($co_type as $type) {
			$co_type_list[$type->co_type_id] = $type->name_th;
		}

		if(isset($_POST['Cooperation']))
		{
                        $_POST['Cooperation']['user_id'] = Yii::app()->user->id;
			$model->attributes=$_POST['Cooperation'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
                        'co_type_list'=>$co_type_list
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
            if(isset($_GET['group'])&&$_GET['group']==1){
                $model=new Cooperation('search');
            }else{
                $model=new Cooperation('search2');
            }
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cooperation']))
			$model->attributes=$_GET['Cooperation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cooperation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cooperation']))
			$model->attributes=$_GET['Cooperation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionType()
        {
               $group =  (!empty($_POST['group'])) ? $_POST['group']: '';
               $data=CooperationType::model()->findAll('t.group=:group',
                                array(':group'=>$group));

                $data=CHtml::listData($data,'co_type_id','name_th');
                foreach($data as $value=>$name_th)
                {
                echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name_th),true);
                }

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
                    if ($model = Cooperation::model()->findbyPk($models[$i]))
                    {
                        $model->sort_order = $i;

                        $model->save();
                    }
                }
            }
            // Handle the regular model order view
            else
            {
                $dataProvider = new CActiveDataProvider('Cooperation', array(
                    'pagination' => false,
                    'criteria' => array(
                        'order' => 'sort_order ASC, co_id ASC',
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
	 * @return Cooperation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cooperation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cooperation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cooperation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
