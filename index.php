<?php
include "include/header.php";
$errors = $_SESSION["errors"] ?? [];
?>


    <div class="col-lg-5 mx-auto">
        <div class="card">
            <div class="card-header py-3">
                Add Todo
            </div>
            <div class="card-body p-4">
                <form action="./controller/StoreTodo.php" method="POST">
                    <div class="form-group">
                        <input type="text" placeholder="Title" class="form-control <?= isset($errors['title_error']) ? 'is-invalid' : '' ?>" name="title">
                        <span class="text-danger"><?= $errors['title_error'] ?? '' ?></span>
                    </div>
                    <div class="form-group my-3">
                        <textarea name="detail" class="form-control <?= isset($errors['detail_error']) ? 'is-invalid' : '' ?>" placeholder="Description"></textarea>
                        <span class="text-danger"><?= $errors['detail_error'] ?? '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="pb-1">Deadline</label>
                        <input type="date" class="form-control <?= isset($errors['deadline_error']) ? 'is-invalid' : '' ?>" name="deadline">
                        <span class="text-danger"><?= $errors['deadline_error'] ?? '' ?></span>
                    </div>
                    <button type="submit" class="btn btn-secondary my-4">Submit</button>
                </form>
            </div>
            </div>
    </div>

<?php
unset($_SESSION['errors']);
include "include/footer.php";
?>