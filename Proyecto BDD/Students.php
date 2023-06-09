<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="school";
$db_table_name="students";
   $db_connection = mysqli_connect($db_host, $db_user, $db_password,$db_name);

if (!$db_connection) {
	die("No se ha podido conectar a la base de datos: ".mysqli_error());
}
$subs_Name = utf8_decode($_POST['Name']);
$subs_SurName = utf8_decode($_POST['SurName']);
$subs_Telephone = utf8_decode($_POST['Telephone']);
$subs_Email = utf8_decode($_POST['Email']);

$resultado=mysqli_query($db_connection,"SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_Email."'" );

if (mysqli_num_rows($resultado)>0)
{

header('Location: Fail.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Name` , `SurName` , `Email`, `Telephone`) VALUES ("' . $subs_Name . '", "' . $subs_SurName . '", "' . $subs_Email . '", "' . $subs_Telephone . '")';

mysqli_select_db($db_connection, $db_name);
$retry_value = mysqli_query($db_connection, $insert_value);

if (!$retry_value) {
   die('Error: ' . mysqli_error($db_connection));
}
	
header('Location: Success.html');

}

mysqli_close($db_connection);

		
?>