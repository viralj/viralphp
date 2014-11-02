<?php

/*
	This is error page class. This page will load when user is trying to access a page which is not available or system
	can not find requested page.
*/

//Include view file for header, head and footer. This file will need to be included in every controller and just for once in ERROR file.
include_once (CONFIG.'views.php');


class ErrorPage extends Exception{
	
	public function IndexAction(){
		
		$header = '<title>Page not found.</title>';
		
		//view header, head and footer to load
		echo Views::header($header);
		echo Views::head();

		echo 'This is error page';
	
		echo Views::footer();
	}

}

?>