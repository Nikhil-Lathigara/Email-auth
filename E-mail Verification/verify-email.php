<?php
session_start();
include('connection.php');
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = "SELECT code,verify_status FROM usertable WHERE code='$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);

    if (mysqli_num_rows($verify_query_run) > 0) {
        $row = mysqli_fetch_array($verify_query_run);
        if ($row['verify_status'] == "0") {
            $clicked_token = $row['code'];
            $update_query = "UPDATE usertable SET verify_status='1' WHERE code='$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($con, $update_query);

            if ($update_query_run) {
                $_SESSION['status'] = "Your Email is verified..!";
                header("location: login-user.php");
                exit(0);
            } else {
                $_SESSION['status'] = "Verification failed.!";
                header("location: login-user.php");
                exit(0);
            }

        } else {
            $_SESSION['status'] = "Email already verified. Please Login";
            header("location: login-user.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "This token does not exist";
        header("location: login-user.php");
    }



} else {
    $_SESSION['status'] = "Not Allowed";
    header("location: login-user.php");
}


?>