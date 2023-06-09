<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="school";
$db_table_name="admin";
   $db_connection = mysqli_connect($db_host, $db_user, $db_password,$db_name);

if (!$db_connection) {
	die("No se ha podido conectar a la base de datos: ".mysqli_error());
}
$subs_UserName = utf8_decode($_POST['UserName']);
$subs_Password = utf8_decode($_POST['Password']);

$resultado=mysqli_query($db_connection,"SELECT * FROM ".$db_table_name." WHERE UserName = '".$subs_UserName."'" );

if (mysqli_num_rows($resultado)>0)
{

header('Location: Fail.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`UserName` , `Password`) VALUES ("' . $subs_UserName . '", "' . $subs_Password . '")';

mysqli_select_db($db_connection, $db_name);
$retry_value = mysqli_query($db_connection, $insert_value);

if (!$retry_value) {
   die('Error: ' . mysqli_error($db_connection));
}
	
header('Location: Success.html');

}

mysqli_close($db_connection);

		
?>