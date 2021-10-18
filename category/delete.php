<?php session_start();
include_once '../inc/connection.php';
if (isset($_GET['id']) && ! empty($_GET['id'])) {
    
       $id =(int) $_GET['id'];
    $sql = "SELECT * FROM CATEGORIES WHERE id = '$id'";
   $result = mysqli_query($connection, $sql);
  // echo mysqli_num_rows($result);
   if(mysqli_affected_rows($connection) > 0){
       $data = mysqli_fetch_assoc($result);
       $sql = "DELETE FROM CATEGORIES WHERE id = '$id'";
       $result = mysqli_query($connection, $sql);
       if(mysqli_affected_rows($connection) > 0) {
           echo 'data deleted successfully';
           header('refresh:2;url=' .URL. 'view.php');
       }

   }else {
      $_SESSION['errors'] [] = 'Error';
    //  echo 'Error';
   }
}