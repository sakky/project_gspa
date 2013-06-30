<?php

class ExecutiveController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $upload_path;
        public $user_group_menu;
        public $menu_use = array();
	
	public function init() {
		$this->upload_path = Yii::app()->basePath . '/../uploads/executives/';
                $this->user_group_menu = $this->getUserGroupMenu(Yii::app()->user->id);
                
                
                $user_menu = explode(',', $this->user_group_menu);
                foreach ($user_menu as $key => $value) {

                    $this->menu_use[$value] = $value;
                }
	}

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
            if($this->menu_use[1]){
		$model=new Executive;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Executive']))
		{
			$_POST['Executive']['user_id'] = Yii::app()->user->id;
                        $model->attributes=$_POST['Executive'];
                        $image = CUploadedFile::getInstance($model, 'image');	
		
			if($image) {

				$genName = 'executive_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->image = $saveName . '.' . $image->getExtensionName();
			}
			if($model->save()){
                                if($image) {
					$image->saveAs($this->upload_path . $model->image);
				}
                                $this->redirect(array('index'));
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
            }else{
                    $this->redirect(array('site/index'));
                }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            if($this->menu_use[1]){
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Executive']))
		{
                        $_POST['executive_']['user_id'] = Yii::app()->user->id;
                        $record_image = $model->image;
			$model->attributes=$_POST['Executive'];
                        $image = CUploadedFile::getInstance($model, 'image');	
		
			if($image) {			
				$genName = 'executive_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->image = $saveName . '.' . $image->getExtensionName();
			}
			if($model->save()){
                             if($image) {
					if(file_exists($this->upload_path . $record_image)) {
						@unlink($this->upload_path . $record_image);
					}
				
					$image->saveAs($this->upload_path . $model->image);
				}
                                $this->redirect(array('index'));
                        }else {
				$model->image = $record_image;
			}
				
		}

		$this->render('update',array(
			'model'=>$model,
		));
            }else{
                    $this->redirect(array('site/index'));
                }
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
            if($this->menu_use[1]){
		$model=new Executive('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Executive']))
			$model->attributes=$_GET['Executive'];

		$this->render('admin',array(
			'model'=>$model,
		));
            }else{
                $this->redirect(array('site/index'));
            }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	    if($this->menu_use[1]){
		$model=new Executive('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Executive']))
			$model->attributes=$_GET['Executive'];

		$this->render('admin',array(
			'model'=>$model,
		));
            }else{
                $this->redirect(array('site/index'));
            }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Executive the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Executive::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Executive $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='executive-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * Handles the ordering of models.
     */
    public function actionOrder()
    {        
        if($this->menu_use[1]){
        // Handle the POST request data submission
        if (isset($_POST['Order']))
        {
            // Since we converted the Javascript array to a string,
            // convert the string back to a PHP array
            $models = explode(',', $_POST['Order']);

            for ($i = 0; $i < sizeof($models); $i++)
            {
                if ($model = Executive::model()->findbyPk($models[$i]))
                {
                    $model->sort_order = $i;

                    $model->save();
                }
            }
        }
        // Handle the regular model order view
        else
        {
            $dataProvider = new CActiveDataProvider('Executive', array(
                'pagination' => false,
                'criteria' => array(
                    'order' => 'sort_order ASC, exec_id DESC',
                ),
            ));

            $this->render('order',array(
                'dataProvider' => $dataProvider,
            ));
        }
        }else{
            $this->redirect(array('site/index'));
        }
    }	        
}
