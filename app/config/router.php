<?php
/*
	#This is routing class. We will route user's requests from this class where we can use custom MVC.
	
	DO NOT MAKE ANY CHANGES HERE. YOU MAY START ZOMBIE WAR.
*/

	
//include configuration file for database connection
include_once('connect.php');

//include general function file
include_once('genFunc.php');


class Router extends Exception {
		
	/*
		@Protected variable URL to set url
	*/
	protected $url;
	
	/*
		@Protected variable file to check controller file
	*/
	protected $file;
	
	/*
		@Protected variable controller
	*/
	protected $controller;
	
	/*
		@Private variable db
	*/
	private $db;
		
	
	function Router($var = array()){
		
		$this->db = new connect();
		$this->db = $this->db->dbConnect();
		
		$this->url = isset($var) ? explode('/', rtrim($var, '/')) : null;
		
		if($this->url != null){
			foreach($this->url as $key => $value){
				$this->url[$key] = htmlentities($value, ENT_QUOTES | ENT_IGNORE, "UTF-8");
			}
		}
		
		self::routeURL($this->url);
		
	}
	
	/*
		#Routing url from here for custom MVC
		For eg.
				www.site.name/controller/method/methodValue
	*/
	protected function routeURL($var = array()){
		
		/*
			#In this function we will check for controller which is passed by URL
			
			#In this function, we will process url passing in few steps.
			
			1) First we will check for third value is set in url or not. If it is set then we will look for controller first
			   and the method/function in that controller and we will pass the third value of variable (url)

			2) Second we will check for 2nd value of url variable. If this function is exists in controller then we will process it.
			
			3) Third step is to check that it is only controller that user is looking for or not and also it is user profile or not.
			   If it is controller then we will show controller or move to check if it is uesername or not. For that we have
			   created separate function which will check for user's profile. 
			   
			   Function name to check user's profile is "getUserProfile()"	
		
			before we process, we will need to check that if we have that controller file or not.
		*/
		
		if($var[0] != null){
						
			
			$this->file = CONTROLLERS.$var[0].'Controller.php';
		
			if(file_exists($this->file)){
				
				include $this->file;
				
				
				//from here we will check those three steps
				
				if((isset($var[2])) AND (method_exists($var[0], $var[1]))){
					
					$this->controller = new $var[0];
					$this->controller->{$var[1]}($var[2]);
					return true;
					
				}else
				if(isset($this->url[1])){
							
					if((method_exists($var[0], $var[1]))){
						$this->controller = new $var[0];
						$this->controller->{$var[1]}();
						return true;
					}
					else{
						self::Error404();
						return true;
					}
						
				}
				$this->controller = new $var[0];
				$this->controller->IndexAction();
			
			}else{
				if(USER == true){
					self::getUserProfile($var);
				} else{
					self::Error404();
					return true;
				}
			}
		}else{
			$this->file = CONTROLLERS.'defaultPageController.php';
			include $this->file;
			$this->controller = new DefaultPage;
			
		}
		
	}
	
	/*
		#This function is to get username from url just like social networking sites
		For eg. www.site.name/user,
				www.site.name/user.lastname
			etc
			
			
		# Also in this function we will show uer's blogs, and if user is teacher then courses etc
		For eg. www.site.name/user/blog
				www.site.name/user/blog/how-i-became-teacher
			etc
	*/
	protected function getUserProfile($var = array()){
	
		
		$query = $this->db->prepare("SELECT `id` FROM `users` WHERE BINARY `uname` = :uname");
		$query->execute(array(':uname'=>$var[0]));	
		
		if(isset($var[0]) AND $query->fetchColumn() > 0){
			$this->file = CONTROLLERS.'/userController.php';
			include $this->file;
			$this->controller = new User;
			
			if((isset($var[2])) AND (method_exists($this->controller, $var[1]))){
					
					$this->controller = new $this->controller;
					$this->controller->{$var[1]}($var[2]);
					return true;
					
				}else
					if(isset($this->url[1])){
								
						if((method_exists($this->controller, $var[1]))){
							$this->controller = new $this->controller;
							$this->controller->{$var[1]}($var[0]);
							return true;
						}
						else{
							self::Error404();
							return true;
						}
							
					}
			$this->controller = new User;
			$this->controller->userAccount($var);
			return true;
		
		}
		else{
			self::Error404();
			return true;
		}
			
	}
	
	/*
		#This function is to show error page if system can not find any relevant page
	*/
	
	protected function Error404(){
		
		$this->file = CONTROLLERS.'errorPageController.php';
		include $this->file;
		$this->controller = new ErrorPage;
		$this->controller->IndexAction();
		return true;
	}

}

?>
