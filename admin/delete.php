<?php session_start();
 include_once '../inc/connection.php';
//if (isset($_GET['id']) && ! empty($_GET['id'])) {
   // $id = (int) $_GET['id'];
    //$sql = "DELETE FROM users WHERE id = '$id'";
    //$result = mysqli_query($connection, $sql);
   // $data = mysqli_fetch_assoc($result);
   // if (mysqli_affected_rows($connection) > 0) {
      //  $_SESSION['success'] = 'Data Has Been Deleted Successfully';
    //    header('refresh:20;url=view.php');

   // }else {
  //      $_SESSION['errors'] [] = 'Error';
  //  }
//}
if (isset($_GET['id']) && ! empty($_GET['id'])) {
    
    $id =(int) $_GET['id'];
 $sql = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connection, $sql);
// echo mysqli_num_rows($result);
if(mysqli_affected_rows($connection) > 0){
    $data = mysqli_fetch_assoc($result);
    $sql = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    if(mysqli_affected_rows($connection) > 0) {
        echo 'data deleted successfully';
        header('refresh:2;url=view.php');
    }

}else {
   $_SESSION['errors'] [] = 'Error';
 
}
}