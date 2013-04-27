<?php

class SlideController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $upload_path;

	public function init() {
		$this->upload_path = Yii::app()->basePath . '/../uploads/slide/';
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
		$model=new Slide;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $order_list = array();
                for($i=1;$i<=4;$i++){
                    $order_list[$i] = $i;
                }

		if(isset($_POST['Slide']))
		{
                    $_POST['Slide']['user_id'] = Yii::app()->user->id;
		
		    $model->attributes=$_POST['Slide'];   
                    
                    //echo'<pre>'.print_r($_POST['Slide']).'</pre>';
                    
                    $image = CUploadedFile::getInstance($model, 'image');
	
			if($image) {

				$genName = 'slide_' . date('YmdHis');
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
                        'order_list'=>$order_list,
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
                
                $order_list = array();
                for($i=1;$i<=4;$i++){
                    $order_list[$i] = $i;
                }
		if(isset($_POST['Slide']))
		{
                        $record_image = $model->image;
                        $model->attributes=$_POST['Slide'];
			
			$image = CUploadedFile::getInstance($model, 'image');	
		
			if($image) {			
				$genName = 'slide_' . date('YmdHis');
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
				
                        }
				
		}

		$this->render('update',array(
			'model'=>$model,
                        'order_list'=>$order_list,
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
//		$dataProvider=new CActiveDataProvider('Slide');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
                $model=new Slide('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slide']))
			$model->attributes=$_GET['Slide'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Slide('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slide']))
			$model->attributes=$_GET['Slide'];

		$this->render('admin',array(
			'model'=>$model,
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
                    if ($model = Slide::model()->findbyPk($models[$i]))
                    {
                        $model->sort_order = $i;

                        $model->save();
                    }
                }
            }
            // Handle the regular model order view
            else
            {
                $dataProvider = new CActiveDataProvider('Slide', array(
                    'pagination' => false,
                    'criteria' => array(
                        'order' => 'sort_order ASC, slide_id DESC',
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
	 * @return Slide the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Slide::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Slide $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='slide-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
