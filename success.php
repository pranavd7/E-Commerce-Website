<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
$ids = $_GET['id'];
$id = explode(',', $ids);
foreach ($id as $value) {
    $update_query = "UPDATE users_items SET status='Confirmed' WHERE item_id=$value";
    mysqli_query($con, $update_query);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lifestyle Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>

    <body>
        <?php include 'includes/header.php'; ?>
        <div class="container" style="padding-top: 10%; text-align: center">
            <h3>Your order is confirmed. Thank you for shopping with us.<br>
                <a href="products.php">Click here</a> to purchase any other item.</h3>
        </div>
<?php include 'includes/footer.php'; ?>
    </body>
</html>
