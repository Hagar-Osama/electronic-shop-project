<?php session_start();
require_once '../inc/header.php'; ?>

<div class="jumbotron p-2 m-4">
    <h3 class="">
        <a class="btn btn-primary btn-lg" href="<?= URL . 'admin/view.php'; ?>" role="button">View All Users </a>
    </h3>
</div>
<h1 class=" p-3 border display-4"> Add New User </h1>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
        <?php if (!empty($_SESSION['errors'])) : ?>
                <?php foreach ($_SESSION['errors'] as $error) : ?>
                    <div class='alert alert-danger'>
                        <span><?= $error; ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
          
            <form class="p-4 m-3 border bg-gradient-info" method="POST" action="../handlers/admin/addadmin.php">
                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">User Role </label>
                    <select class="form-control" id="exampleFormControlSelect1" name="type">
                    <option value = "" disabled selected hidden>choose your role</option>
                        <option value="admin">Admin</option>
                        <option value="super_admin">super Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success" name="submit">
                    <i class="bi bi-reply-all-fill"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->
<?php unset($_SESSION['errors']); ?>
<?php require_once '../inc/footer.php'; ?>