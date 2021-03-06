<?php

class DocumentController extends Controller
{
        public $thai_month_arr=array(  
                                "0"=>"",  
                                "1"=>"ม.ค.",  
                                "2"=>"ก.พ.",  
                                "3"=>"มี.ค.",  
                                "4"=>"เม.ย.",  
                                "5"=>"พ.ค.",  
                                "6"=>"มิ.ย.",   
                                "7"=>"ก.ค.",  
                                "8"=>"ส.ค.",  
                                "9"=>"ก.ย.",  
                                "10"=>"ต.ค.",  
                                "11"=>"พ.ย.",  
                                "12"=>"ธ.ค."                    
                            );  
	public function actionIndex()
	{
		if(isset($_GET['id'])){
                    $model=Document::model()->findByPk($_GET['id']);
                    $this->render('detail',array('model'=>$model));

$cfg = require  dirname(__FILE__).'/../../config/main.php';
//print '<pre>';
//print_r($cfg['components']['db']);

if (preg_match("/^mysql:host=(\w.*);dbname=(\w.*)/i", $cfg['components']['db']['connectionString'],$match))
{
    //print_r($match);    
}
//$db_name = "myphotos";
//$db_server = "localhost";
//$db_user = "root";
//$db_pass = "";

$db_name = $match[2];
$db_server = $match[1];

$db_user = $cfg['components']['db']["username"];
$db_pass = $cfg['components']['db']["password"];
                    
                    $sql = "UPDATE gs_document SET counter=counter+1 WHERE doc_id='".$_GET['id']."'";
                    //print $sql;
                    //$command = Yii::app()->db->createCommand($sql);
                    //$command->execute();
                    $dbh = new PDO('mysql:host='.$db_server.';port=3306;dbname='.$db_name, $db_user, $db_pass, array( PDO::ATTR_PERSISTENT => false));
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();

                    
                    
                }else{
                $criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'status = 1';                
                $criteria->order = 'sort_order ASC ,last_update DESC';

		
		$model = Document::model()->findAll($criteria);                              
                $this->render('index',array('model'=>$model));
                }
	}
        
        public function actionType($id)
	{
                $criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'status = 1 AND doc_type_id ='.$id;                
                $criteria->order = 'sort_order ASC ,last_update DESC';

		
		$model = Document::model()->findAll($criteria);    
               

		
		$type = DocumentType::model()->findByPK($id);  
                $this->render('index',array('model'=>$model,'type'=>$type));

	}
        
        public function thai_date($time){  

            $thai_date_return = date("j",$time)." ".$this->thai_month_arr[date("n",$time)]." ".(date("Y",$time)+543);  
            return $thai_date_return;  
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