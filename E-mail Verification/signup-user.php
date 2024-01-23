<?php require_once "code.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <?php

            if (isset($_SESSION['status'])) {
                ?>
                <div class="center alert alert-success">
                    <h5>
                        <?= $_SESSION['status']; ?>
                    </h5>
                </div>
                <?php
                unset($_SESSION['status']);
            }

            ?>
        </div>
        <div class="col-md-4 offset-md-4 form">
            <form action="code.php" method="POST">
                <h2 class="text-center">Signup Form</h2>
                <p class="text-center">It's quick and easy.</p>
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                
                <div class="form-group">
                    <input class="form-control button" type="submit" name="register_btn" value="Signup">
                </div>
                <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
            </form>
        </div>
    </div>
    </div>

</body>

</html>