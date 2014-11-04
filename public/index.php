<?php
ob_start();

//default timezone is America/Chicago
date_default_timezone_set('America/Chicago');

try{

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
	
	//require router file to start routing application
	require '../app/config/router.php';

	//starting router class with get method from URL
	new Router(@$_GET['url']);
	
}

//if there is any error/exception sent by application, catch it
//show the error and kill the page
catch(Exception $e){
	echo $e->getMessage();
	die();
}
