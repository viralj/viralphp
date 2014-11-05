<?php 

/*
	# This is default page model. Here we will write some codes that will use classes from library.
	
	# Each controller and its methods has its own model. So make changes in models and classes first
	  to update any page on application site.
*/

class DefaultModel extends Exception {
	
	public function body(){
		include LIBRARY . 'welcome.php';
		
		echo   '<div class="container">
				<div class="row">
				<h1>This is default page.</h1>
				<h3>If you are seeing this page, it means you can go <span style="color:red;">Viral</span> with <span style="color:green;">viralphp</span>.<br>
				Not exactly MVC but your own custom PHP Script like MVC.</h3>
				<p>And do you want to know what is good about it?<br>
				Good thing about this script is that you don\'t need any knowledge of any PHP Framework. Pure PHP knowledge and HTML, CSS, JS, JQUERY.
				</p>';
				
		Welcome::welcomeMsg();
		
		echo '</div></div>';
	}	
	
	
}

?>
