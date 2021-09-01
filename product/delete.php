<?php session_start();
include_once '../inc/connection.php';
if (isset($_GET['id']) && ! empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM products where product_id = '$id'";
    $result = mysqli_query($connection, $sql);
   // echo $id;
  //  die();
    if (mysqli_affected_rows($connection) > 0) {
        $data = mysqli_fetch_assoc($result);
        $sql = "DELETE FROM products WHERE product_id = '$id'";
        $result = mysqli_query($connection, $sql);
     
        if (mysqli_affected_rows($connection) > 0) {
            $_SESSION['success']= 'Data Has Been Deleted Successfully';
         //   echo 'Data Has Been Deleted Successfully';
           // echo $id;
            //die();
           header ('location:view.php');
          
        }else {
            $_SESSION['errors'] [] = 'Error';

        }
    }

}

