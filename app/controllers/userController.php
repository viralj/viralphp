<?php

/*
	#This is user controller class where user's profile will be shown.
*/

//Include view file for header, head and footer. This file will need to be included in every controller
include (CONFIG.'views.php');


class User extends Exception{

	/*
		Public function to show user's profile on page when requested
	*/
	public function userAccount($var){
		
		$header = '<title>'.$var[0].'</title>';
		
		//view header, head and footer to load
		echo Views::header($header);
		echo Views::head();
		
		
		echo 'This is <b>'.$var[0].'</b>\'s profile.';
		
		echo Views::footer();
	
	}
	
	/*
		Public function to show user's blog on page when requested
	*/
	public function blog($var){
		
		$header = '<title>'.$var[0].' : Blog</title>';
			
		//view header, head and footer to load
		echo Views::header($header);
		echo Views::head();
	
		echo 'This is blog of <b>'.$var.'</b>';
	
		echo Views::footer();
	}
	
}

?>
