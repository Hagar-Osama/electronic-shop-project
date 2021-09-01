<?php session_start();
 include_once 'inc/connection.php';
if (isset($_SESSION['login_email'])) {
  header('location:profile.php');
}
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hash_pass = password_hash($password,PASSWORD_DEFAULT);
  $sql = "SELECT email, `password` from users where email = '$email'";
  $result = mysqli_query($connection, $sql);
 
  if (mysqli_affected_rows($connection) > 0) {
    $data = mysqli_fetch_assoc($result);
    //var_dump($data);
    //die();
    if (password_verify($password, $data['password'])) {

      $_SESSION['login_email'] = $data['email'];
     // print_r($_SESSION);
      header('location:profile.php');
    }

  }
}



?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

  <title>Login</title>
</head>

<body>
  <h1 class="p-5 text-center">Login</h1>

  <div class="container">
    <div class="row">
      <div class="col-6 mx-auto">
        
        <form class="p-4 m-3 border bg-gradient-info" method = "POST" action = "login.php">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="password">
          </div>

          <button type="submit" class="btn btn-success" name="login">
            <i class="bi bi-reply-all-fill"></i> Login
          </button>
        </form>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>