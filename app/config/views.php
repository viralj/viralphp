<?php 

/*
	This is view class where basic html5 codes are located for header and footer.
*/

class Views extends Exception{
	
	/*
		Protected header variable
	*/
	protected $header;
	
	/*
		Protected footer variable
	*/
	protected $footer;
	
	public function header($var = null){
		$this->header  = '<!doctype html>';
		$this->header .= '<html lang="en">';
		$this->header .= '<head>';
		$this->header .= '<meta charset="utf-8" />';
		$this->header .= '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
		$this->header .= '<link rel="stylesheet" type="text/css" href="'.SITE.'css/bootstrap.css" />';
		$this->header .= '<link rel="stylesheet" type="text/css" href="'.SITE.'css/bootstrap.min.css" />';
		$this->header .= $var;
		
		return $this->header;
	}
	
	public function head($var = null){
		return $var.'</head><body>';
	}
	
	public function footer($var = null){
		
		$this->footer  = $var;
		$this->footer .= '<script language="JavaScript" type="text/javascript" src="'.SITE.'js/bootstrap.js"></script>';
		$this->footer .= '<script language="JavaScript" type="text/javascript" src="'.SITE.'js/bootstrap.min.js"></script>';
		$this->footer .= '</body>';
		$this->footer .= '
		
		<!-- Created with viralphp, a custom PHP Script like MVC Framework. 
			Download this script from github.
			
			https://github.com/viralj/viralphp
			
		     Learn more about viralphp at
		     	http://www.viralphp.com
		-->
		
		</html>';
		
		return $this->footer;
	}

}
?>
