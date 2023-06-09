<?php
session_start();
include "db_connection.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;    
}

if(isset($_POST['user']) && isset ($_POST['password'])) {
    $user = validate($_POST['user']);
    $pass = validate($_POST['password']);

    if(empty($user)) {
		$error = "Username is required";
        header ("Location: index.html?error=Username is required");
        exit();
    }
    else if(empty($pass)) {
		$error = "Password is required";
        header ("Location: index.html?error=password is required");
        exit();
    }

    $sql = "SELECT * FROM admin WHERE UserName = '$user' AND Password = '$pass'";
    $result  = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)=== 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['UserName'] === $user && $row['Password']===$pass){
            echo "Let's go Logged in!";
            $_SESSION['UserName'] = $row['UserName'];
            $_SESSION['ID_Admin'] = $row['ID_Admin'];
            header("Location: home.php");
            exit();
        }
        else{
			$error = "Incorrect Username or Password";
            header("Location: index.html?error=Incorrect UserName or Password plese try Loggin again");
            exit();
        }
    }
    else {
        header("Location: index.html");
        exit();
    }
}
