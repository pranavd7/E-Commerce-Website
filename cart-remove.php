<?php

require 'includes/common.php';
$user_id = $_SESSION['id'];
$item_id = $_GET['id'];
$delete_query = "DELETE FROM users_items WHERE user_id=$user_id AND item_id=$item_id";
mysqli_query($con, $delete_query);
header('location:products.php');
