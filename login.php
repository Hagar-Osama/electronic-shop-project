<?php session_start();
include 'inc/connection.php';
$_SESSION['errors'] = '';


if (isset($_POST['login'])) {

  $email = mysqli_real_escape_string($connection, $_POST['email']);

  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $hash_pass = password_hash($password, PASSWORD_DEFAULT);
  $sql = "SELECT email, `password` from users where email = '$email'";
  
  $result = mysqli_query($connection, $sql);
  
  if (mysqli_affected_rows($connection) > 0) {
    $user = mysqli_fetch_assoc($result);    
    //check whether user logged in or not
    if (password_verify($_POST['password'], $user['password'])) {
      $_SESSION['loggedin'] = $user['email'];
      header('location:' . URL . 'profile.php');
    } else {

      $_SESSION['errors'] = "Failed To Log In";
      // header("location:" . URL . "login.php");
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

        <form class="p-4 m-3 border bg-gradient-info" method="POST" action="">
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
          <br /> <br />
          <?php if (!empty($_SESSION['errors'])) : ?>
            <div class='alert alert-danger'>
              <span><?= $_SESSION['errors']; ?></span>
            </div>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>

  <?php unset($_SESSION['errors']); ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>