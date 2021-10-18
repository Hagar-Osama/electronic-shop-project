<?php session_start();
include_once '../../inc/connection.php';
$_SESSION['errors'] = [];
if (isset($_POST['update'])) {
    $id =  filter_var($_POST['product_id'], FILTER_VALIDATE_INT);
    $categoryid = filter_var($_POST['category_id'], FILTER_VALIDATE_INT);
    $code =  htmlspecialchars(trim($_POST['code']));
    $name = filter_var($_POST['product_name'], FILTER_SANITIZE_STRING);
    $price = htmlspecialchars(trim($_POST['price']));
    $quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_INT);
    
    
    if (empty($code)) {
        $_SESSION['errors'] [] = 'Code must be entered';

    }
    if (empty($name)) {
        $_SESSION['errors'] [] = 'Name must be entered';
    }elseif (strlen($name) < 6) {
        $_SESSION['errors'] [] = 'name must be greater than 5 chars';
    }elseif (strlen($name) > 25) {
        $_SESSION['errors'] [] = 'name must be less than 26 chars';
        
    }
    if (empty($price)) {
        $_SESSION ['errors'] [] = 'Price must be entered';
    }elseif (! is_numeric($price) || $price <= 0) {
        $_SESSION ['errors'] [] = 'Price must be a number and greater than zero';
    }
    if (empty($quantity)) {
        $_SESSION ['errors'] [] = 'quantity must be entered';
    }elseif (! is_numeric($quantity) || $quantity <= 0) {
        $_SESSION ['errors'] [] = 'quantity must be a number and greater than zero';
    }
    if (! empty($_SESSION['errors'])) {
        header('location:'.URL.'product/edit.php');
    } else {
         //make connection
         $sql = "UPDATE products SET `category_id` = '$categoryid', `code` = '$code', `product_name` = '$name', `price` = '$price', `quantity` = '$quantity' WHERE `product_id` = '$id'";
       //  echo $id;
        // die();
         $result = mysqli_query($connection, $sql);
       //  var_dump($result);
        // die();

         if (mysqli_affected_rows($connection) > 0) {
             $_SESSION['success'] = 'Data Has Been Updated Successfully';
             header('location:'.URL.'product/view.php');
         }else {
             'error '. mysqli_errno($connection);
         }

    } 
}