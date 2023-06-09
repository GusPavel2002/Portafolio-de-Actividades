<?php

	$hostname= "localhost";
	$username = "root";
	$password = "";
	$db_name = "School";
	
	$conn = mysqli_connect($hostname, $username, $password, $db_name);
	
	
	if(!$conn){
		die("Connection Failed: ".mysql_connect_error());
	}
	if($conn){
		echo "Database connected successfully!";
} 	else{
		echo "Failed to connect to the database!";
}
