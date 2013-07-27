<?php

class AdmissionController extends Controller
{
	public function actionIndex()
	{
            
                $model=new Admission;
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
			'model'=>$model));
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