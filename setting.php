<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
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
        <div class="container">
            <div class="row_style">
                <h2>Change Password</h2>
                <form method="POST" action="setting_script.php">
                    <div class="form-group">
                        <input type="password" class="form-control" name="oldpassword" placeholder="Old Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="newpassword" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="newpassword2" placeholder="Re-type New Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </body>
</html>
