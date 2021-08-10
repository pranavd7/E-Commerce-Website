<?php

require 'includes/common.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
$password = $_POST['newpassword'];
$password2 = $_POST['newpassword2'];
$oldpassword = $_POST['oldpassword'];
if (strlen($password) < 6) {
    header('location:setting.php?passsword_error=enter valid password');
}
if (strlen($password) != strlen($password2)) {
    header('location:setting.php?retype password carefully');
}
$user_id = $_SESSION['id'];
$check_database_query = "SELECT email,password FROM users WHERE id='$user_id'";
$result = mysqli_query($con, $check_database_query);
$user = mysqli_fetch_array($result);
if ($user['password'] == $oldpassword) {
    $update_query = "UPDATE users SET password='$password' WHERE id='$user_id'";
    mysqli_query($con, $update_query);
} else {
    header('location:setting.php?error=incorrect password');
}