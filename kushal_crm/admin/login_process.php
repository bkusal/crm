<?php
session_start();
include '../include/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];


if($email && $password){
    // $query = "SELECT * FROM admin WHERE email='".$email."'";
    $query = "SELECT * FROM admin WHERE email='{$email}'";
    $final= mysqli_query($con,$query);
    $numrows= mysqli_num_rows($final);

    if($numrows > 0){
        $row= mysqli_fetch_assoc($final);
        $_SESSION['auth_user_id'] = $row['id'];
        $_SESSION['success_message'] = "Logged in successfully";
        header('Location:../admin/indexa.php');
    }else{
        $_SESSION['success_message'] = "Incorrect email or password";
    }
} else{
    $_SESSION['error_message'] = "Email and password cannot be empty.";
}

?> 