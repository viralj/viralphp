<?php 

/*
	#This page is to show how you can use Library folder to create custom classes or pieces of mega class by dividing
		a class file into small class files. This is your custom library folder to create your own library.
		
*/

class Welcome extends Exception{

	//This is demo function to show you how you can create your custom library and functions
	
	public function welcomeMsg(){
	
		echo 'This is Welcome Message for you...!<br>
				If you want to know more about this custom MVC Script, please read more about it locally at <a href="'.SITE.'README">here</a> or learn from <a href="http://viralphp.com">viralphp.com</a>, 
				the official website of project.';
	}
}

?>
