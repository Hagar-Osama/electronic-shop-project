<?php session_start();
 require_once '../inc/header.php';
include_once '../inc/connection.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($connection, $sql);





?>     

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-success btn-lg" href="<?= URL. 'admin/add.php'; ?>" role="button">Add New User </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  All Users  </h1>
            <?php if (!empty($_SESSION['success'])) : ?>
                <div class='alert alert-success'>
                    <span><?= $_SESSION['success']; ?></span>
                </div>
            <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Name</th>
                    <th scope="col"> Email</th>
                    <th scope="col"> Role</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php while($data= mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $data['name']; ?> </td>
                        <td><?= $data['email']; ?> </td>
                        <td><?= $data['type']; ?> </td>
                        <td>
                            <a href="edit.php?id=<?=$data['id']; ?>" class="btn btn-info">Edit <i class="bi bi-pencil-square"></i></a>
                            <a href="delete.php?id= <?=$data['id']; ?>" class="btn btn-danger">Delete <i class="bi bi-x-square-fill"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                </table>

               
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
<?php unset($_SESSION['success']); ?>
<?php require_once '../inc/footer.php'; ?>     




