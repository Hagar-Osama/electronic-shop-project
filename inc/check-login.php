<?php session_start();
//authorization control
//check whether user logged in or not
if (! isset($_SESSION['userEmail'])) {
    header("location:" . URL . "login.php");

}