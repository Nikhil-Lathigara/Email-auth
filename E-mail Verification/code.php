<?php
session_start();
include('connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

function sendemail_verify($name, $email, $code)
{
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = 2;
    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';

    $mail->Username = 'niksoni1209@gmail.com';
    $mail->Password = 'ynmktwygznarnusn';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->SMTPAuth = TRUE;
    $mail->setFrom('niksoni1209@gmail.com', $name);
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Email Verification From Nikhil";
    $mail_template = "You Have Registered Successfully<br/><br/>
    <a href='http://localhost/E-mail%20verification/verify-email.php?token=$code'>Click Me</a>";

    $mail->Body = $mail_template;
    $mail->send();
    // echo"Message has been sent";
}



//When the user clicks register button

if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $code = md5(rand());


    $check_email_query = "SELECT email FROM usertable WHERE email = '$email' LIMIT 1 ";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email Already Exist";
        header("location: signup-user.php");
    } else {
        $query = "INSERT INTO usertable (name,email,password,code) VALUES ('$name','$email','$password','$code')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            sendemail_verify("$name", "$email", "$code");

            $_SESSION['status'] = "Registration Successfull..! Please verify your email.";
            header("location: signup-user.php");
        } else {
            $_SESSION['status'] = "Registration Failed";
            header("location: signup-user.php");
        }
    }

    


}

?>