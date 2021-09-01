<?php session_start();
include_once '../../inc/connection.php';
$_SESSION['errors'] = [];
if (isset($_POST['submit'])) {
    $categoryname = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    if (empty($categoryname)) {
        $_SESSION ['errors'] [] = 'No name has been entered';
       } elseif (strlen($categoryname) < 5) {
           $_SESSION ['errors'] [] = 'name must be greater than 4 char';
       }else if (strlen($categoryname) > 20) {
           $_SESSION['errors'] [] = 'name must be less than 21 char';
        } 
        if (! empty($_SESSION['errors'])) {
            header('location:../../category/add.php');
        }else {
            //make connection
            $sql = "INSERT INTO categories (`name`) VALUES ('$categoryname') ";
            $result = mysqli_query($connection, $sql);
            if (mysqli_affected_rows($connection) > 0) {
                $_SESSION['success'] = 'Data inserted succussfully';
                header('location:../../category/view.php');

            }else {
                echo 'error '. mysqli_error($connection);
            }

        }
}