<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$user_id = $_SESSION['id'];
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
        <div class="container" style="margin-top: 100px">
            <div class="table-responsive" style="margin-left: 200px; margin-right: 200px; margin-bottom: 50px">
                <table class="table">
                    <tbody>
                        <tr><th>Item Number</th> <th>Item Name</th> <th>Price</th> <th></th></tr>
                        <?php
                        $check_database_query = "SELECT i.name, i.price, i.id FROM users_items ui INNER JOIN users u ON ui.user_id=u.id INNER JOIN items i ON ui.item_id=i.id WHERE u.id=$user_id AND ui.status='Added to cart'";
                        $result = mysqli_query($con, $check_database_query) or die(mysqli_error($con));
                        if (mysqli_num_rows($result) == 0) {
                            echo 'Add a product to cart first.';
                            $total = 0;
                            $item_ids = '';
                        } else {
                            $count = 1;
                            $total = 0;
                            $item_ids = '';
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr><td><?php echo $count++ ?></td> <td><?php echo $row['name']; ?></td> <td><?php echo $row['price'] ?></td> <td><a href=cart-remove.php?id=<?php echo $row['id'] ?> class="remove_item_link"> Remove</a></td></tr>
                                <?php
                                $total = $total + $row['price'];
                                if ($item_ids == '') {
                                    $item_ids = $item_ids . $row['id'];
                                } else {
                                    $item_ids = $item_ids . ',' . $row['id'];
                                }
                            }
                        }
                        ?>
                        <tr><td></td> <td>Total</td> <td>Rs <?php echo $total; ?></td> <td><a href='success.php?id=<?php echo $item_ids; ?>' class="btn btn-primary">Confirm Order</a></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </body>
</html>
