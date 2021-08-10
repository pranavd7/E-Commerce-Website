<?php

require 'includes/common.php';
$user_id = $_SESSION['id'];
$item_id = $_GET['id'];
$add_cart_query = "INSERT INTO users_items(user_id, item_id, status) VALUES('$user_id', '$item_id', 'Added to cart')";
mysqli_query($con, $add_cart_query);
header('location:products.php');
?>