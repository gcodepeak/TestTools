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
	
	public $keywords="美丽主播";
	
	public $description="美丽主播";
	
	protected function beforeAction($obj_action){
		$log_col_arr = array();
		
		$time = date("Y-m-d H:i:s");
		array_push($log_col_arr, $time);
		
		$obj_controller = $obj_action->controller;
		$str_controller = strtolower($obj_controller->id);
		array_push($log_col_arr, $str_controller);
		
		$str_action = strtolower($obj_action->id);
		array_push($log_col_arr, $str_action);
			
		//$cookie = Yii::app()->request->getCookies();
		//print_r($cookie);
		//$name = Yii::app()->user->getName();
	
		//print Yii::app()->request->userHost;
		$ip = $_SERVER["REMOTE_ADDR"];
		//$ip = $this->GetIp();
		array_push($log_col_arr, $ip);
		
		$ua = $_SERVER['HTTP_USER_AGENT'];
		array_push($log_col_arr, $ua);

		$log_msg = implode("\t",$log_col_arr);
		Yii::log($log_msg,'info','visit.controller-action');
		
		return true;
	}
	
	//获得访客真实ip
  	private function GetIp(){
	   if(!empty($_SERVER["HTTP_CLIENT_IP"])){   
	      $ip = $_SERVER["HTTP_CLIENT_IP"];
	   }
	   if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ //获取代理ip
	    $ips = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
	   }
	   if($ip){
	      $ips = array_unshift($ips,$ip); 
	   }
	   
	   $count = count($ips);
	   for($i=0;$i<$count;$i++){   
	     if(!preg_match("/^(10|172\.16|192\.168)\./i",$ips[$i])){//排除局域网ip
	      $ip = $ips[$i];
	      break;    
	      }  
	   }  
	   $tip = empty($_SERVER['REMOTE_ADDR']) ? $ip : $_SERVER['REMOTE_ADDR']; 
	   if($tip=="127.0.0.1"){ //获得本地真实IP
	      return $this->get_onlineip(); 
	   }else{
	      return $tip;
	   }
   }
   
   //获得本地真实IP
   private function get_onlineip() {
	   	$mip = file_get_contents("http://city.ip138.com/city0.asp");
	   	if($mip){
	   		preg_match("/\[.*\]/",$mip,$sip);
	   		$p = array("/\[/","/\]/");
	   		return preg_replace($p,"",$sip[0]);
	   	}else{return "获取本地IP失败！";}
   }
	
	/**
	 * Smarty assign()方法
	 */
	public function assign($key, $value) {
		Yii::app ()->smarty->assign($key, $value);
	}
	
	/**
	 * Smarty display()方法
	 */
	public function display($view) {
		Yii::app()->smarty->display ($view);
	}
	
	/** session **/
	//protected $session = Yii::app()->session;
}