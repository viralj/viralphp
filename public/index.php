<?php

date_default_timezone_set('America/Chicago');

try{

ob_start();
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
	
	//require router file
	require '../app/config/router.php';
	
	
	new Router(@$_GET['url']);
	

	
	
}

catch(Exception $e){
	echo $e->getMessage();
	die();
}