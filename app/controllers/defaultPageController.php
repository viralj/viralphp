<?php

/*
	This is index page class. This page will load when user is not requesting specific page to view.
*/

/*
	#Include view file for header, head and footer. This file will need to be included in every controller
*/
include (CONFIG.'views.php');

/*
	@ Include index model file to display content of this page.
	
	# Each controller and its methods has their own models. So change models and classes from library
	  first to edit application site.
*/
include (MODELS.'defaultModel.php');

class DefaultPage extends Exception{
	
	/*
		@public header variable for header contents.
	*/
	public $header;

	
	
	function __construct(){
		
		$this->header = '<title>Welcome to your custom PHP script like MVC.</title>';
		
		//view header, head and footer to load
		echo Views::header($this->header);
		echo Views::head();
		
		DefaultModel::body();
		
		echo Views::footer();
	
	}
}

?>