<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
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
        
        
        
/**
 * Checks if the current route matches with given routes
 * @param array $routes
 * @return bool
 */        
    public function isActive($routes = array())
    {
        $routeCurrent = '';
        if ($this->module !== null) {
            $routeCurrent .= sprintf('%s/', $this->module->id);
        }
        $routeCurrent .= sprintf('%s/%s', $this->id, $this->action->id);
        foreach ($routes as $route) {
            $pattern = sprintf('~%s~', preg_quote($route));
            //print $pattern.'  ||  '. $routeCurrent;
            //print '<br>';
            if (preg_match($pattern, $routeCurrent)) {
                return true;
            }
        }
        return false;
    }        
    
        
        public function getThaiDate($datetime,$format = 'dmYHis'){  
        $thai_month_short_name=array(  
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
            //print $datetime;
            $time = strtotime($datetime);
            switch($format){
                case 'dmY':
                    $thai_date_return = date("j",$time)." ".$thai_month_short_name[date("n",$time)]." ".(date("Y",$time)+543);
                    break;
                case 'dmYHis':
                    $thai_date_return = date("j",$time)." ".$thai_month_short_name[date("n",$time)]." ".(date("Y",$time)+543)." ".(date("H:i:s",$time));
                    break;
                case 'dMYHis':
                    $thai_date_return = date("j",$time)." ".$thai_month_full_name[date("n",$time)]." ".(date("Y",$time)+543);
                    break;
                default :
                    $thai_date_return = $time;
                    
            }
            return $thai_date_return;  
        }   

        public function showIcon($value){  

            $icon = '';
            if ($value) {
                $icon = ' <span style="display:inline"><img src="'.Yii::app()->request->baseUrl.'/images/front/icon_'.$value.'.gif" style="vertical-align:middle;"></span>';
            } 
            return $icon;  
        }            
}