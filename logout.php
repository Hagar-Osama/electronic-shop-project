<?php session_start();
include_once 'inc/connection.php';

if(isset($_SESSION['login_email'])) {
    session_destroy(); 
 header('location:' .URL. 'login.php');
}