<?php 

	/*
		@Defined variables for directories and other files
		
		# In this file we had to use $_SERVER['DOCUMENT_ROOT'] because some OS that
		we tried, it did not work with other options. So we suggest you to check your server and its
		configurations before your launch your production website.
		
		We suggest you to use 
		
		define ('MODELS',  __DIR__ . '/../models/');
		define ('CONFIG',  __DIR__ . '/');
		define ('LIBRARY', __DIR__ . '/../library/');
		define ('CONTROLLERS', __DIR__ . '/../controllers/');
		
		if your server configurations allows you to.
	*/
	
	define ('MODELS',  $_SERVER['DOCUMENT_ROOT'] . '/app/models/');					//model directory 
	define ('CONFIG',  $_SERVER['DOCUMENT_ROOT'] . '/app/config/');					//configuration directory
	define ('LIBRARY', $_SERVER['DOCUMENT_ROOT'] . '/app/library/');				//library directory
	define ('CONTROLLERS', $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/');		//library directory
	define ('SITE', 'http://'.$_SERVER['SERVER_NAME'].'/');							//website name
	
	
	/*
		#This is variable is for user based system. If you want to create a site which is users based dynamic website
		and you want to allow users to access their profile via URL 
		
			for eg. site.name/username
					site.name/UserRocker
				etc
				
		change the variable to 
		
		define ('USER', true);
	*/
	
	define ('USER', false);

	/*
		To use database connection, please change 
		
		define ('DB_CONNECT', true);
	*/
	
	define ('DB_CONNECT', false);
	
	
	
//----------------------------------------------------------------------------------------------------------------------------	
	
/*
	# General functions starts from here
	
	# This function is just to display that how can you define that user is logged in or not
		if you want to allow users to access particular area of website.
		
//this function is to check user is logged in or not
	function user_is_loggedIN(){
		if(isset($_SESSION['USER'])){
			return true;
		}else{
			return false;
		}
	}
	
*/

	
?>