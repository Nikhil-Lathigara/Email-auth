<?php
session_start();
unset ($_SESSION['authenticated']);
unset($_SESSION['auth_user']);

$_SESSION['status'] = "You Logged out Successfully";
header('location: login-user.php');
?>