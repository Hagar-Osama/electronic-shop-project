<?php require_once '../inc/header.php';
session_start();


?>


<div class="jumbotron p-2 m-4">
    <h3 class="">
        <a class="btn btn-primary btn-lg" href="<?= URL . 'category/view.php'; ?>" role="button">View All Categories </a>
    </h3>
</div>
<h1 class=" p-3 border display-4"> Add New Categoery </h1>

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
            


            <form class="p-4 m-3 border bg-gradient-info" method="POST" action="../handlers/category/addcategory.php">
                <div class="form-group">
                    <label for="cat">Category Name</label>
                    <input type="text" class="form-control" id="cat" name="name">

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