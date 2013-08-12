<?php

class AdminController extends CController
{

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
        public $head_menu = "Operations";
	public $showMenu = true;
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

        
        public $thai_month_short_name=array(  
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
        public $thai_month_full_name=array(  
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
        
        
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','view','create','update','admin','delete','order','type','edit','excel'),
				'roles'=>array('top_admin', 'admin'),
			),
			array('allow',
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('logout'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('error'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('page'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        public function getUserGroupMenu($id)
	{
                $model=User::model()->findByPk($id);
                $group_id = $model->user_group_id;
                $menu = UserGroup::model()->findByPk($group_id);
                return $menu->user_menu;
        }
        
        public function getUserRole($id)
	{
                $model=User::model()->findByPk($id);
                $group_id = $model->user_group_id;
                $menu = UserGroup::model()->findByPk($group_id);
                return $menu->role;
        }
        
        public function getUserProfile($id)
	{
                $model=User::model()->findByPk($id);
                return $model;
        }
        
        public function getThaiDate($datetime,$format = 'dmYHis'){  

            //print $datetime;
            $time = strtotime($datetime);
            switch($format){
                case 'dmY':
                    $thai_date_return = date("j",$time)." ".$this->thai_month_short_name[date("n",$time)]." ".(date("Y",$time)+543);
                    break;
                case 'dmYHis':
                    $thai_date_return = date("j",$time)." ".$this->thai_month_short_name[date("n",$time)]." ".(date("Y",$time)+543)." ".(date("H:i:s",$time));
                    break;
                case 'dMYHis':
                    $thai_date_return = date("j",$time)." ".$this->thai_month_full_name[date("n",$time)]." ".(date("Y",$time)+543);
                    break;
                default :
                    $thai_date_return = $time;
                    
            }
            return $thai_date_return;  
        }          
}

?>