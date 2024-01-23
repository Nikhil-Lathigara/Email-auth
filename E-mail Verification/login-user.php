<?php require "code.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <?php

                if (isset($_SESSION['status'])) {
                    ?>
                    <div class="alert alert-success">
                        <h5>
                            <?= $_SESSION['status']; ?>
                        </h5>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }

                ?>
                <form action="logincode.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login_btn" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>