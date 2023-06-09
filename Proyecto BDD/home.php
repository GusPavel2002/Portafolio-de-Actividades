<?php
session_start();

	if(isset($_SESSION['ID_Admin']) && isset($_SESSION['UserName'])){
	?>
	
	<!DOCTYPE html>
	<html>
	<head>
	<title>HOME</title>
	<link rel="stylesheet" href="style/StyleHome.css">
	<body>
		<h1>Hello MR, <?php echo $_SESSION['UserName']; ?></h1>
		<div class="Students"><a href= "Student.html ">Student Registration</a></div>
		<div class="Teachers"><a href= "Teacher.html ">Teacher Registration</a></div>
		<div class="Group"><a href= "Admin.html ">Admins</a></div>
		<div class="Group"><a href= "Print.html ">View Registration</a></div>
		<a href= "Logout.php">LogOut</a>
	</body>
	</html>
	
	<?php
	}
	else{
		header("Location: index.html");
		exit();
	}
	?>