<?php
include "include/header.php";
include "database/env.php";
$query = "SELECT * FROM `todos` WHERE 1 ORDER BY deadline DESC";
$res = mysqli_query($connect, $query);
$todos = mysqli_fetch_all($res, 1);
?>

<div class="container my-5">
    <div class="row">
        <?php
        foreach($todos as $todo)
        {
        ?>
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-header"><?= $todo['title'] ?> - <span class="badge bg-<?= $todo['is_complete'] ? 'success' : 'warning' ?>-subtle text-<?= $todo['is_complete'] ? 'success' : 'warning' ?>"><?= $todo['is_complete'] ? 'Completed' : 'Pending' ?></span></div>
                    <div class="card-body">
                        <p><?= $todo['detail'] ?></p>
                        <b><?= $todo['deadline'] ?></b>
                    </div>
                    <div class="card-footer text-center">
                        <a href="" class="<?= $todo['is_complete'] ? 'disabled' : '' ?> btn btn-sm btn-success">Complete</a>
                        <a href="" class="<?= $todo['is_complete'] ? 'disabled' : '' ?> btn btn-sm btn-warning">Edit</a>
                        <a href="" class="<?= $todo['is_complete'] ? 'disabled' : '' ?> btn btn-sm btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
include "include/footer.php";
?>