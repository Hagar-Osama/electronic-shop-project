<?php session_start();
if(isset($_SESSION['login_email'])) {
    session_destroy(); 
 header('location:login.php');
}