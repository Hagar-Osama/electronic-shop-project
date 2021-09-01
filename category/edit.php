<?php session_start() ;
require_once '../inc/header.php'; 
include_once '../inc/connection.php';
$categoryname = '';
$update = false;
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];
    $update = true;
    $sql = "SELECT * FROM categories where id = '$id'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
        $data = mysqli_fetch_assoc($result);
        $categoryname = $data['name'];
    }else {
        $_SESSION['errors'][] = 'category is not found';
        header('location:edit.php');
    }
}






?>     

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="<?= URL. 'category/view.php'; ?>" role="button">View All Categories </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Edit Categoery  </h1>

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
            

                <form class="p-4 m-3 border bg-gradient-info" method = "POST" action = "<?= URL. 'handlers/category/updatecategory.php'; ?>">
                    <div class="form-group">
                        <label for="cat">Category Name</label >
                        <input type="text" class="form-control" id="cat" name = "name" value = "<?= $categoryname; ?>" >
                        <input type="hidden" name="id" value="<?= $id; ?>">

                    </div>
                    <?php if ($update==true) : ?>
                <button type="submit" class="btn btn-info" name= "update">
                    <i class="bi bi-reply-all-fill"></i> Update
                    <?php else : ?>

                    <button type="submit" class="btn btn-success" name= "edit">
                        <i class="bi bi-reply-all-fill"></i> Edit
                     </button>
                     <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
<?php unset($_SESSION['errors']); ?>
<?php unset($_SESSION['success']); ?>
<?php require_once '../inc/footer.php'; ?>     




