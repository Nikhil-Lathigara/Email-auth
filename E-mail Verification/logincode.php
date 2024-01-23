<?php
session_start();
include('connection.php');


if (isset($_POST['login_btn'])) {

    if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $login_query = "SELECT * FROM usertable WHERE email='$email' AND password='$password' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        if (mysqli_num_rows($login_query_run) > 0) {
            $row = mysqli_fetch_array($login_query_run);
            if ($row['verify_status'] == "1") {
                $_SESSION['status'] = "You Logged in Successfully.";
                header("location: home.php");
                exit(0);
            } else {
                $_SESSION['status'] = "Plase Verify Your E-mail Address to login.";
                header("location: login-user.php");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "Invalid Email or Password";
            header("location: login-user.php");
            exit(0);
        }
    } else {

        $_SESSION['status'] = "All Fields are Mandatory";
        header("location: login-user.php");
    }



    # code...
}


?>