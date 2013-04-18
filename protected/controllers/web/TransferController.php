<?php

class TransferController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

        public $upload_path;

	public function init() {
		$this->upload_path = Yii::app()->basePath . '/../uploads/slip/';
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	public function actionIndex()
	{
		$model=new Transfer;
                $student_id = Yii::app()->user->id;
                $student = $this->loadModelStudent($student_id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		if(isset($_POST['Transfer']))
		{

                        $_POST['Transfer']['status'] = 'N';
                        $_POST['Transfer']['send_email'] = 'N';

                        $model->attributes=$_POST['Transfer'];
                        $images = CUploadedFile::getInstance($model, 'images');

                        if($images){

                                $genName = 'slip_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path . $saveName . '.' . $images->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->images = $saveName . '.' . $images->getExtensionName();
                        }


                        /*echo "<br> ===> ";
                        echo "<pre>";
                        print_r($_POST['Transfer']);
                        echo "</pre>";*/
                             $data = array();
                             $data =  $_POST['Transfer'];
                             $data['images'] = $model->images;

                             if($model->save()){
                                    if($images) {
                                         $images->saveAs($this->upload_path . $model->images);
                                     }

                                     $send_mail = $this->sendMail($data);
                                     if($send_mail){
                                         $this->render('complete',array('model'=>$model));
                                     }else{
                                        $this->render('error',array('model'=>$model));
                                     }
                            }
                            $this->render('index',array(
                                            'model'=>$model,
                                            'student'=>$student,
                                    ));
                             
		}

		$this->render('index',array(
			'model'=>$model,
                        'student'=>$student,
		));
	}

	
        public function sendMail($data)
	{          
            // recipients
            // $to  = "endrophine_nok@hotmail.com";
            $to = "payment@e-studio.co.th";
            $bcc  = "endrophine_nok@hotmail.com";
            $from = $data['email'];

            // subject
            $subject = "แจ้งการโอนเงินผ่านบัญชีธนาคาร :: eStidio.com";

            // message
            $message = '
            <html>
            <head>
              <title>แจ้งการโอนเงินผ่านบัญชีธนาคาร</title>
            </head>
            <body>
              <h3>แจ้งการโอนเงินผ่านบัญชีธนาคาร</h3>
              <table border="0" width="100%">
                <tr>
                    <td><b>เลขที่สั่งซื้อ</b> :</td>
                    <td>'.$data['inv_id'].'</td>
                </tr>
                <tr>
                    <td><b>ชื่อผู้โอน</b> :</td>
                    <td>'.$data['name'].'</td>
                </tr>
                <tr>
                    <td><b>E-mail</b> :</td>
                    <td>'.$data['email'].'</td>
                </tr>
                <tr>
                    <td><b>เบอร์โทรศัพท์</b> :</td>
                    <td>'.$data['phone'].'</td>
                </tr>
                <tr>
                    <td><b>จำนวนเงินที่โอน</b> :</td>
                    <td>'.number_format($data['amount'],2).' บาท</td>
                </tr>
                <tr>
                    <td><b>โอนเข้าบัญชีธนาคาร</b> :</td>
                    <td>'.$data['bank'].'</td>
                </tr>
                <tr>
                    <td><b>วันเวลาที่โอน</b> :</td>
                    <td>'.$data['date'].'</td>
                </tr>
                <tr>
                    <td><b>รายละเอียดการสั่งซื้อ</b> :</td>
                    <td>'.$data['detail'].'</td>
                </tr>';
            if($data['images']){
            $message .= '
                <tr>
                    <td valign="top"><b>หลักฐานการโอนเงิน</b> :</td>
                    <td><img src="http://www.e-pretest.com/uploads/slip/'.$data['images'].'"/></td>
                </tr>';
            }
            $message .= '
              </table>
            </body>
            </html>
            ';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            // Additional headers
            $headers .= 'To: ' .$to. "\r\n";
            $headers .= 'From: '.$data['name'].'<'.$from.'>'. "\r\n";
            $headers .= 'Bcc: '.$bcc. "\r\n";
            

            // Mail it
            $flgSend = @mail($to, $subject, $message, $headers);
            return $flgSend;
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Transfer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


        public function loadModelStudent($id)
	{
		$model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='transfer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
