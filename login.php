<?php
require 'includes/common.php';
if (isset($_SESSION['email'])) {
    header('location:products.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <?php
        include 'includes/header.php';
        ?>
        <div class="container">
            <div class="row_style">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>Login</h2>
                    </div>
                    <div class="panel-body">
                        <p class="text-warning">Login to make a purchase</p>
                        <form method= "POST" action="login_submit.php">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button typre="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        Don't have an account?
                        <a href="signup.php">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>
