<?php

/*
	This is accounts controller class where we will perform some actions like sign up, login, value check, settings etc.
*/

//Include view file for header, head and footer. This file will need to be included in every controller
include (CONFIG.'views.php');


//include configuration file for database connection
include_once (CONFIG.'connect.php');


class Accounts extends Exception{	
	
	/*
		@protected database variable to hold database connection.
	*/
	protected $db;
	
	
	public function IndexAction(){
		
		//view header, head and footer to load
		echo Views::header();
		echo Views::head();
		
		echo 'This is account page.';
		
		echo Views::footer();
	}
	
	public function login(){
		
		//preparing database connection
		$this->db = new connect();
		$this->db = $this->db->dbConnect();
		
		//view header, head and footer to load
		echo Views::header();
		echo Views::head();
		
		echo 'This is login page.';
		
		echo Views::footer();
	}
	

}

?>