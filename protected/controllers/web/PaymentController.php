<?php

class PaymentController extends Controller
{
        public $label = array();

        
	public function actionIndex()
	{    
              $this->render('index');         
	}

        public function actionBank()
	{
               $model = new Order;
               $field = array();

                  


               //GET Student Info
               $student = new Student;
               $student_id = Yii::app()->user->id;
               $rows = $student->getStudentById($student_id);
               foreach ($rows as $row){
                    $firstname = $row['firstname'];
                    $lastname  = $row['lastname'];
                    $email     = $row['email'];
                }

               
               if(isset($_POST['credit_point'])){
                   $credit = $_POST['credit_point'];
               }else{
                   $credit = 0;
               }
//                  echo "<br> ===> ";
//		  echo "<pre>";
//		  print_r($_POST);
//		  echo "</pre>";
                  //exit;

               $field['inv_id']             = $_POST['inv'];
               $field['student_id']         = Yii::app()->user->id;
               $field['firstname']          = $firstname;
               $field['lastname']           = $lastname;
               $field['email']              = $email;
               $field['payment_method']     = $_POST['payment_method'];
               $field['total']              = $_POST['amt'];
               $field['credit']             = $credit;
               $field['order_status_id']    = 3;
               $field['date_added']         = date("Y-m-d H:i:s");
             //$field['date_modified']      = date("Y-m-d H:i:s");
               $field['ip']                 = $_SERVER['REMOTE_ADDR'];

               
//                  echo "<br> ===> ";
//		  echo "<pre>";
//		  print_r($field);
//		  echo "</pre>";
//                  exit;

                $model->attributes = $field;
                if($model->save())
                     $this->render('bank_transfer');
	}

        public function actionResult()
	{
               /* echo "<br> ===> ";
		  echo "<pre>";
		  print_r($_POST);
		  echo "</pre>";*/

            if (isset($_POST['result'])){
                $result = $_POST['result'];
                $inv_id = substr($result, 2, 9);
                $result = substr($result, 0, 2);

                //$result = "02";
                $apCode = $_POST['apCode'];
                $amt = $_POST['amt'];
                $fee = $_POST['fee'];
                $method = $_POST['method'];

               //Set Credit from Amount
               switch ($_POST['amt']) {
                case 1:
                    $credit = 200;
                    break;
                case 2:
                    $credit = 500;
                    break;
                case 3:
                    $credit = 1000;
                    break;
                case 4:
                    $credit = 2000;
                    break;
                default:
                    $credit = 0;
               }


                if($method=="01"){
                    $payment_method = "Paysbuy";
                }else if ($method=="02"){
                    $payment_method = "Credit Card";
                }else if ($method=="06"){
                    $payment_method = "Counter Service";
                }
                if(isset($_POST['confirm_cs'])){
                  $confirm_cs = strtolower(trim($_POST['confirm_cs']));
                }


               //GET Student Info
               if(Yii::app()->user->id){
               $student = new Student;
               $student_id = Yii::app()->user->id;
               $rows = $student->getStudentById($student_id);
               foreach ($rows as $row){
                    $firstname = $row['firstname'];
                    $lastname  = $row['lastname'];
                    $email     = $row['email'];
                }
               }


                /* status result
                00=Success
                99=Fail
                02=Process
                */
                if ($result == "00") {

                    //Start Case Pay by Counter Service
                    if ($method == "06") {

                        //Prepare data
                        $order = new Order;
                        $row_order = $order->getOrderByInvoice($inv_id);
                        foreach ($row_order as $row){
                            $credit = $row['credit'];
                            $id_student  = $row['student_id'];
                        }

                        $today = date("Y-m-d H:i:s");
                        $connection = yii::app()->db;



                        if ($confirm_cs == "true") {
                           $text = "รายการของคุณชำระเงินเรียบร้อยแล้วคะ";
                           $color = "#FF7E2F";

                           //Update Order Status to complete
                           $sql = "UPDATE esto_order SET order_status_id = '2',date_modified = '".$today."' WHERE inv_id= '".$inv_id."'";
                           $command=$connection->createCommand($sql);
                           $result = $command->execute();


                           $student = new Student;
                           $rec = $student->getStudentById($id_student);
                           foreach ($rec as $v){
                                $old_credit = $v['credit'];
                           }
                           //Set New Credit
                           $new_credit = $credit+$old_credit;

                           //Update New Credit in table student
                           $sql2 = "UPDATE esto_student SET credit = '".$new_credit."' WHERE student_id= '".$id_student."'";
                           $command2=$connection->createCommand($sql2);
                           $result2 = $command2->execute();
                        } else if ($confirm_cs == "false") {
                            $text = "รายการของคุณไม่ได้ชำระเงินตามเวลาที่กำหนดค่ะ";
                            $color = "#FF6666";

                            $sql = "UPDATE esto_order SET order_status_id = '1',date_modified = '".$today."' WHERE inv_id= '".$inv_id."'";
                            //echo $sql."<br/>";
                            $command=$connection->createCommand($sql);
                            $result = $command->execute();
                        } else {
                            $text = "รายการของคุณอยู่ระหว่างรอการชำระเงินค่ะ";
                            $color = "#FF7E2F";
                        }
                        
                    } //end case pay by counter service
                    else {
                        $text = "รายการของคุณเสร็จเรียบร้อยแล้วคะ";
                        $color = "#FF7E2F";
                        $model = new Order;
                           //Save Order into DB
                           $field = array();
                           $field['inv_id']             = $inv_id;
                           $field['student_id']         = Yii::app()->user->id;
                           $field['firstname']          = $firstname;
                           $field['lastname']           = $lastname;
                           $field['email']              = $email;
                           $field['payment_method']     = $payment_method;
                           $field['total']              = $amt;
                           $field['credit']             = $credit;
                           $field['order_status_id']    = 2;
                           $field['date_added']         = date("Y-m-d H:i:s");
                         //$field['date_modified']      = date("Y-m-d H:i:s");
                           $field['ip']                 = $_SERVER['REMOTE_ADDR'];


                         $model->attributes = $field;
                         $model->save();

                        //Update Credit in DB
                         $student = $this->loadStudentById($student_id);

                         $record = array();
                         $record['credit']    = ($student->credit) + $credit;

                         $student->attributes = $record;
                         $student->save();
                         //-----------------------------------------------

                      
                    }//end if case 00

                } else if ($result == "99") {
                    $text = "ขออภัยค่ะ คุณทำรายการไม่สำเร็จ กรุณาทำรายการใหม่ค่ะ";
                    $color = "#FF6666";
                } else if ($result == "02") {
                    $text = "รายการของคุณอยู่ระหว่างรอการชำระเงินค่ะ";
                    $color = "#FF7E2F";
                    $model = new Order;
                    //Save Order into DB
                       $field = array();
                       $field['inv_id']             = $inv_id;
                       $field['student_id']         = Yii::app()->user->id;
                       $field['firstname']          = $firstname;
                       $field['lastname']           = $lastname;
                       $field['email']              = $email;
                       $field['payment_method']     = $payment_method;
                       $field['total']              = $amt;
                       $field['credit']             = $credit;
                       $field['order_status_id']    = 5;
                       $field['date_added']         = date("Y-m-d H:i:s");
                     //$field['date_modified']      = date("Y-m-d H:i:s");
                       $field['ip']                 = $_SERVER['REMOTE_ADDR'];


                     $model->attributes = $field;
                     $model->save();
                } else {
                    $text = "เกิดความผิดพลาด กรุณาทำรายการใหม่ค่ะ";
                    $color = "#FF6666";
                }

                $this->render('result',array('text'=>$text,'color'=>$color));

            }//end if $_POST['result']
            else{

                $this->redirect(array('index'));
            }
          

        }

        
        public function send_curl($invoice,$account,$description,$price,$postURL)
        {
            $curlurl ="https://www.paysbuy.com/paynow.aspx?psb=true";
            $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
            $params = "psb=psb&biz=".$account."&inv=".$invoice."&itm=".$description."&amt=".$price."&postURL=".$postURL;


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST,1); // method ที่เราจะส่ง เป็น get หรือ post
            curl_setopt($ch, CURLOPT_POSTFIELDS,$params); // paremeter สำหรับส่งไปยังไฟล์ ที่กำหนด
            curl_setopt($ch, CURLOPT_URL,$curlurl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
            

            $result = curl_exec($ch); // ผลการ execute กลับมาเป็น ข้อมูลใน url ที่เรา ส่งคำร้องขอไป

            curl_close ($ch);

            return $result;



        }

        public function actionGetinvoice()
	{
            $model = new Order;
            $totalOrder = $model->getTotalOrder();

            if($totalOrder>0){

                // Get Last Invoice Number
                $order = $model->getOrder(0,1);
                foreach ($order as $value){
                    $last_inv_id = $value['inv_id'];
                }

                $last_inv_id = substr($last_inv_id,3,6);
                $last_inv_id = (int)$last_inv_id;
                
                // Set New Invoice Number
                $inv_id = "INV".($last_inv_id + 1);

            }else{
                // Set Default Invoice Number
                $inv_id = "INV100001";
            }
            echo $inv_id;

        }

        public function actionReq()
	{

           /* $_POST['result'] = '00INV100005';
            $_POST["apCode"] = '33880';
            $_POST["amt"] = '1.00';
            $_POST["method"] = '06';
            $_POST["fee"] = '0.00';
            $_POST["confirm_cs"] = 'false';*/



            if (isset($_POST['result'])){
            $result = $_POST["result"];
            $inv_id = substr($result, 2, 9);
            $result = substr($result, 0, 2);
            $apCode = $_POST["apCode"];
            $amt = $_POST["amt"];
            $fee = $_POST["fee"];
            $method = $_POST["method"];
            $confirm_cs = strtolower(trim($_POST["confirm_cs"]));
            /* status result
            00=Success
            99=Fail
            02=Process
            */
            if ($result == "00") {
                if ($method == "06") {
                    $order = new Order;
                    $row_order = $order->getOrderByInvoice($inv_id);
                       foreach ($row_order as $row){
                            $credit = $row['credit'];
                            $id_student  = $row['student_id'];
                       }
                       /*echo "<br> ===> ";
                       echo "<pre>";
                       print_r($row_order);
                       echo "</pre>";*/

                       //Update Order Status to Completed
                       $today = date("Y-m-d H:i:s");
                       $connection = yii::app()->db;


                    if ($confirm_cs == "true") {
                        echo "Success";

                        
                           $sql = "UPDATE esto_order SET order_status_id = '2',date_modified = '".$today."' WHERE inv_id= '".$inv_id."'";
                           $command=$connection->createCommand($sql);
                           $result = $command->execute();


                           $student = new Student;
                           $rec = $student->getStudentById($id_student);
                           foreach ($rec as $v){
                                $old_credit = $v['credit'];
                           }
                           $new_credit = $credit+$old_credit;
                           
                           //Update New Credit in table student
                           $sql2 = "UPDATE esto_student SET credit = '".$new_credit."' WHERE student_id= '".$id_student."'";
                           $command2=$connection->createCommand($sql2);
                           $result2 = $command2->execute();
                     
                    } else if ($confirm_cs == "false") {
                        echo "Fail";
                        $sql = "UPDATE esto_order SET order_status_id = '1',date_modified = '".$today."' WHERE inv_id= '".$inv_id."'";
                        $command=$connection->createCommand($sql);
                        $result = $command->execute();

                           
                    } else {
                        echo "Process";
                    }
                } else {
                    echo "Success";
                }
                //end if method=06
            } //end if result=00
              else if ($result == "99") {
                echo "Fail";
            } else if ($result == "02") {
                echo "Process";
            } else {
                echo "Error";
            }

            }//end if $_POST['result']

               
	}


        public function loadOrderByInoiveId($inv_id)
	{
                $condition = array(
                            'condition'=>'inv_id=:inv_id',
                            'params'=>array(':inv_id'=>'$inv_id'),
                );

		$model = Order::model()->findAll($condition);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

         public function loadStudentById($id)
	{
                $model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
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

