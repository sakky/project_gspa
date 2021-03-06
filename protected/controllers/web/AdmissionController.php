<?php

class AdmissionController extends Controller
{
	public function actionIndex()
	{
            
                $model=new Admission;
                $location_list = array();
                $location = AdmissionLocation::model()->findAll();
                
                foreach($location as $locate) {
			$location_list[$locate->location_id] = $locate->name;
		}
                $program_list = array();
                $programs = AdmissionProgram::model()->findAll();
                
                foreach($programs as $pro) {
			$program_list[$pro->program_id] = $pro->name;
		}                
                
                if(isset($_POST['Admission']))
		{
                        list($d, $m, $y) = explode("/", $_POST['Admission']['birthday']);
                        $birthday = ($y - 543) . "-" . $m . "-" . $d;
                        $_POST['Admission']['birthday'] = $birthday;
			$model->attributes=$_POST['Admission'];
		

			if($model->save()){
                            	Yii::app()->user->setFlash('admission','ส่งใบสมัครเรียนออนไลน์เรียบร้อยแล้ว ทางเราจะติดต่อกลับไปในภายหลัง ขอบคุณค่ะ');
				$this->refresh();
                                //$this->redirect(array('index'));
                        }
				
		}
		$this->render('index',array(
			'model'=>$model,
                        'location_list'=>$location_list,
                        'program_list'=>$program_list
                    ));
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