<?php

/*
	# This file is main configuration file where database connection information is stored.
	
	# We are going to use PDO to connect with mysql in php
	
	# You can change your mysql connection details. For more information please readme.txt file
	
	@@ Use 127.0.0.1 instead of localhost if database is hosted on local server 
	   as ip is much efficient and faster.
*/

//Including general function file to check database connection is allowed or not
include_once 'genFunc.php';

class connect{

	public function dbConnect(){
		
		if(DB_CONNECT == true){
			
			try {

				//preparing to connect with mysql with details
				$db = new PDO('mysql:host=127.0.0.1;dbname=db', 'root', '');
				
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
			}
			//catch PDO error if database is not connected.
			catch(PDOException $e){
				echo $e->getMessage();
				die();
			}
			return $db;
		
		}else{
			return true;
		}
	}
}
?>