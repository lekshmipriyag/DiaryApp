<?php
session_start();
if(isset($_SESSION['username'])){
    session_destroy();
    $_SESSION['userID'] = "";
    $_SESSION['username'] = "";
    $_SESSION['password'] = "";
    header('location:login.php');
}
?>