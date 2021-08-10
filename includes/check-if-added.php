<?php

function check_if_added_to_cart($item_id) {
    require 'common.php';
    $user_id = $_SESSION['id'];
    $check_database_query = "SELECT * FROM users_items WHERE item_id='$item_id' AND user_id ='$user_id' and status='Added to cart'";
    $result = mysqli_query($con, $check_database_query);
    if (mysqli_num_rows($result) > 0) {
        return 1;
    } else {
        return 0;
    }
}

?>