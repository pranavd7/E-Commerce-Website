<?php
require 'includes/common.php';
$email=$_POST['email'];
$password= $_POST['password'];
$check_database_query="SELECT id,email FROM users WHERE email='$email' AND password='$password'";
$result= mysqli_query($con, $check_database_query);
if(mysqli_num_rows($result)==0){
    header('location:login.php?error=enter correct email/password');
}
else{
    $user=mysqli_fetch_array($result);
    $_SESSION['id']=$user['id'];
    $_SESSION['email']=$user['email'];
    header('location:products.php');
}
?>