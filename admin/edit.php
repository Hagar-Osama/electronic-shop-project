<?php session_start();
require_once '../inc/header.php';
include_once '../inc/connection.php' ;
$name = "";
$email = "";
$update = false;
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $update = true;
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $email = $data ['email'];
        $type = $data ['type'];

    }else{
        $_SESSION['errors'] [] = 'User Is Not Found';
        header('location:edit.php');
    }
}



?>     

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="<?= URL. 'admin/view.php';?>" role="button">View All Users </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Edit User Info  </h1>

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
            <?php if (!empty($_SESSION['errors'])) : ?>
                <?php foreach ($_SESSION['errors'] as $error) : ?>
                    <div class="alert alert-danger">
                        <span><?= $error; ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
                <form class="p-4 m-3 border bg-gradient-info" method = "POST" action = "<?= URL . 'handlers/admin/updateadmin.php';?>">
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" class="form-control" id="name" name = "name" value = "<?=$name; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name = "email" value = "<?= $email; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name = "password" >
                        <input type="hidden" name="id" value="<?= $id; ?>">

                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">User Role </label>
                    <select class="form-control" id="exampleFormControlSelect1" name="type">
                    <option value = "" disabled selected hidden>choose your role</option>
                        <option value="admin"<?= ! empty($data['type']) && $data['type'] == 'admin' ? 'selected' : ""; ?>>Admin</option>
                        <option value="super_admin"<?= ! empty($data['type']) && $data['type'] == 'super_admin' ? 'selected' : ""; ?> >super Admin</option>
                    </select>
                </div>
                <?php if ($update==true) : ?>
                <button type="submit" class="btn btn-info" name= "update">
                    <i class="bi bi-reply-all-fill"></i> Update
                    <?php else : ?>
                    <button type="submit" class="btn btn-success" name = 'edit'>
                        <i class="bi bi-reply-all-fill"></i> edit
                     </button>
                     <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
<?php unset($_SESSION['errors']); ?>
<?php require_once '../inc/footer.php'; ?>     




