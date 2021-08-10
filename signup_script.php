<?php

require 'includes/common.php';
$email = $_POST['email'];
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
if (!preg_match($regex_email, $email)) {
    header('location:signup.php?email_error=enter correct email');
}
$password = $_POST['password'];
if (strlen($password) < 6) {
    header('location:signup.php?passsword_error=enter correct password');
}
//$email = mysqli_real_escape_string($con, $email);
//$password = md5($password);
//$name = mysqli_real_escape_string($con, $_POST['name']);
//$contact = mysqli_real_escape_string($con, $_POST['contact']);
//$city = mysqli_real_escape_string($con, $_POST['city']);
//$address = mysqli_real_escape_string($con, $_POST['address']);

$name = $_POST['name'];
$contact = $_POST['contact'];
$city = $_POST['city'];
$address = $_POST['address'];
$check_database_query = "SELECT id FROM users WHERE email=$email";
$result = mysqli_query($con, $check_database_query);
if (mysqli_num_rows($result) > 0) {
    header('location:signup.php?email_error=email already in use');
} else {
    $insert_database_query = "INSERT INTO users(name,email,password,contact,city,address) VALUES('$name','$email','$password','$contact','$city','$address')";
    mysqli_query($con, $insert_database_query);
    $id = mysqli_insert_id($con);
    $_SESSION['id'] = $id;
    $_SESSION['email'] = $email;
    header('location:products.php');
}
?>

