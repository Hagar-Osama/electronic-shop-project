<?php include_once '../../inc/connection.php';
 session_start();
 $_SESSION['errors'] = [];
 $role = ['admin', 'super_admin'];
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL );
        $type = $_POST['type'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if (empty($name)) {
            $_SESSION ['errors'][] = 'Firstname is required';
        }elseif (strlen($name) > 50) {
            $_SESSION ['errors'][] = 'Firstname must be less than 51 char';
        }elseif (strlen($name) < 5) {
            $_SESSION ['errors'][] = 'Firstname must be greater than 5 char';
        
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION ['errors'][] = 'Email is Invaild';
        }elseif (strlen($email) > 30) {
            $_SESSION ['errors'][] = 'email must be less than 31 char';
        }elseif (strlen($email) < 9) {
            $_SESSION ['errors'][] = 'email must be greater than 9 char';
        }elseif (empty($email)) {
            $_SESSION ['errors'][] = 'email is required';
        }  
        if (empty($password)) {
        $_SESSION['errors'] [] = 'Password is required'; 
        }elseif (strlen($password) > 100) {
        $_SESSION ['errors'][] = 'password must be less than 101 char';
        }elseif (strlen($password) < 6) {
        $_SESSION ['errors'][] = 'password must be greater than 6 char'; 
    }
    if (empty($type)) {
        $_SESSION['errors'][] = 'Role Is Empty';
    }elseif (! in_array($type, $role)) {
        $_SESSION['errors'][] = 'invalid role';
    }
    if (! empty($_SESSION['errors'])) {
        header('location:'.URL.'admin/add.php');
    }else {
        //make connection
        $sql = "INSERT INTO users (`name`, email, `password`, `type`) VALUES ('$name', '$email', '$password', '$type') ";
        $result = mysqli_query($connection, $sql);
        if (mysqli_affected_rows($connection) > 0) {
            $_SESSION['success'] = 'Data Has Been Inserted Successfully';
            header('location:'.URL.'admin/view.php');
        }else {
            echo 'error '. mysqli_error($connection);
        }

    }
        
 }