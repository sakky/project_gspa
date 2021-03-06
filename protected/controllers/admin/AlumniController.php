<?php

class AlumniController extends AdminController
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
		$this->upload_path = Yii::app()->basePath . '/../uploads/alumni/';
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
            if($this->menu_use[11]){                 
		$model=new Alumni;
                $group = $model->alumni_group;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $alumni_no_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND alumni_group=:alumni_group';
		$criteria->params=array(':status'=>1,':alumni_group'=>$group);
                $criteria->order = 'name_th';
                $co_type = AlumniNo::model()->findAll($criteria);
                
                foreach($co_type as $type) {
			$alumni_no_list[$type->alumni_no_id] = $type->name_th;
		}
                
		if(isset($_POST['Alumni']))
		{
                        $_POST['Alumni']['user_id'] = Yii::app()->user->id;
			$model->attributes=$_POST['Alumni'];
                        $image = CUploadedFile::getInstance($model, 'image');	
		
			if($image) {

				$genName = 'alumni_' . date('YmdHis');
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
                        'alumni_no_list'=>$alumni_no_list
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
            if($this->menu_use[11]){             
		$model=$this->loadModel($id);
                $group = $model->alumni_group;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $alumni_no_list = array();
                $criteria = new CDbCriteria();
                $criteria->condition = 'status=:status AND alumni_group=:alumni_group';
		$criteria->params=array(':status'=>1,':alumni_group'=>$group);
                $criteria->order = 'name_th';
                $co_type = AlumniNo::model()->findAll($criteria);
                
                foreach($co_type as $type) {
			$alumni_no_list[$type->alumni_no_id] = $type->name_th;
		}

		if(isset($_POST['Alumni']))
		{
                        $record_image = $model->image;
                        $_POST['Alumni']['user_id'] = Yii::app()->user->id;
                        
			$model->attributes=$_POST['Alumni'];
                        $image = CUploadedFile::getInstance($model, 'image');	
		
			if($image) {			
				$genName = 'alumni_' . date('YmdHis');
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
                        'alumni_no_list'=>$alumni_no_list,
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
            if($this->menu_use[11]){              
		$model=new Alumni('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Alumni']))
			$model->attributes=$_GET['Alumni'];

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
            if($this->menu_use[11]){              
		$model=new Alumni('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Alumni']))
			$model->attributes=$_GET['Alumni'];

		$this->render('admin',array(
			'model'=>$model,
		));
            }else{
                $this->redirect(array('site/index'));
            }      
	}
        
        public function actionOrder()
        {
            if($this->menu_use[11]){             
                // Handle the POST request data submission
                if (isset($_POST['Order']))
                {
                    // Since we converted the Javascript array to a string,
                    // convert the string back to a PHP array
                    $models = explode(',', $_POST['Order']);

                    for ($i = 0; $i < sizeof($models); $i++)
                    {
                        if ($model = Alumni::model()->findbyPk($models[$i]))
                        {
                            $model->sort_order = $i;

                            $model->save();
                        }
                    }
                }
                // Handle the regular model order view
                else
                {
                    $dataProvider = new CActiveDataProvider('Alumni', array(
                        'pagination' => false,
                        'criteria' => array(
                            'order' => 'sort_order ASC, alumni_id DESC',
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
        
        public function actionType()
        {
               $group =  (!empty($_POST['alumni_group'])) ? $_POST['alumni_group']: '';
               $data=AlumniNo::model()->findAll('t.alumni_group=:alumni_group',
                                array(':alumni_group'=>$group));

                $data=CHtml::listData($data,'alumni_no_id','name_th');
                foreach($data as $value=>$name_th)
                {
                echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name_th),true);
                }

        }
        
        
    public function actionExcel(){

//		  
//		  
//        $model=new Alumni('search');
//        $data = array(
//            1 => array ('ลำดับ', 'Surname'),
//            array('Schwarz', 'Oliver'),
//            array('Test', 'Peter')
//        );
//    
        $issueDataProvider = $_SESSION['Filtered_Excel'];

        $i = 0;
        unset($_SESSION['Filtered_Excel']);
        //fix column header. 
        //Could have used something like this - $data[]=array_keys($issueDataProvider->data[0]->attributes);. 
        //But that would return all attributes which i do not want
        $data[$i]['alumni_id'] = 'ลำดับ';
        $data[$i]['alumni_group'] = 'ระดับ';
        $data[$i]['alumni_no_en'] = 'รุ่นที่จบ (ภาษาอังกฤษ)';
        $data[$i]['alumni_no_th'] = 'รุ่นที่จบ (ภาษาไทย)';
        $data[$i]['name_en'] = 'ชื่อ-นามสกุล (ภาษาอังกฤษ)';
        $data[$i]['name_th'] = 'ชื่อ-นามสกุล (ภาษาไทย)';
        $data[$i]['sex_en'] = 'เพศ (ภาษาอังกฤษ)';
        $data[$i]['sex_th'] = 'เพศ (ภาษาไทย)';
        $data[$i]['image'] = 'รูปประจำตัว';
        $data[$i]['major_en'] = 'สาขาวิชาที่จบ (ภาษาอังกฤษ)';
        $data[$i]['major_th'] = 'สาขาวิชาที่จบ (ภาษาไทย)';
        $data[$i]['campus_en'] = 'ศูนย์การศึกษา (ภาษาอังกฤษ)';
        $data[$i]['campus_th'] = 'ศูนย์การศึกษา (ภาษาไทย)';
        $data[$i]['position_en'] = 'ตำแหน่งงานปัจจุบัน (ภาษาอังกฤษ)';
        $data[$i]['position_th'] = 'ตำแหน่งงานปัจจุบัน (ภาษาไทย)';
        $data[$i]['desc_en'] = 'ประวัติโดยย่อ (ภาษาอังกฤษ)';
        $data[$i]['desc_th'] = 'ประวัติโดยย่อ (ภาษาไทย)';
        $i++;

        //populate data array with the required data elements
        foreach($issueDataProvider->data as $issue)
        {
            if ($issue['alumni_group']=='Master'){
                $alumni_group = 'ปริญญาโท';
            }else{
                $alumni_group = 'ปริญญาเอก';
            }
            
            $AlumniNo = $this->loadModelAlumniNo($issue['alumni_no_id']);
            
            $alumni_no_en = $AlumniNo->name_th;
            $alumni_no_th = $AlumniNo->name_th;
            
            $data[$i]['alumni_id'] = $issue['alumni_id'];
            $data[$i]['alumni_group'] = $alumni_group;
            $data[$i]['alumni_no_en'] = $alumni_no_en;
            $data[$i]['alumni_no_th'] = $alumni_no_th;
            $data[$i]['name_en'] = $issue['name_en'];
            $data[$i]['name_th'] = $issue['name_th'];
            $data[$i]['sex_en'] = ($issue['sex']=='F')? 'Female':'Male';
            $data[$i]['sex_th'] = ($issue['sex']=='F')? 'หญิง':'ชาย';

            $data[$i]['image'] =  $issue['image'];
            $data[$i]['major_en'] = $issue['major_en'];
            $data[$i]['major_th'] = $issue['major_th'];
            $data[$i]['campus_en'] = $issue['campus_en'];
            $data[$i]['campus_th'] = $issue['campus_th'];
            $data[$i]['position_en'] = $issue['position_en'];
            $data[$i]['position_th'] = $issue['position_th'];
            $data[$i]['desc_en'] = $issue['desc_en'];
            $data[$i]['desc_th'] = $issue['desc_th'];
            $i++;
        }
        
        $xls = new JPhpExcel('UTF-8', false, 'Export Alumni');
        $xls->addArray($data);
        $xls->generateXML('alumni_file');

        //*** Insert Picture (2) ***//



        
    }//actionExcel method end
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Alumni the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Alumni::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function loadModelAlumniNo($id)
	{
		$model=AlumniNo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Alumni $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alumni-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
