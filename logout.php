<?php session_start();
include 'inc/connection.php';

 session_destroy(); 
 header('location:' .URL. 'login.php');
