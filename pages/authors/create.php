<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../layouts/nav.php';
adminOnly();

?>

<div class="container">
    <h1 class="text-white text-center mt-4">Add an author</h1>
    <form action="<?= route('addAuthor') ?>" method="POST" class="mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                <?php if (isset($_SESSION['val']['first_name'])) {
                    printValidationMessages('first_name');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                <?php if (isset($_SESSION['val']['last_name'])) {
                    printValidationMessages('last_name');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <textarea type="textarea" class="form-control" name="bio" id="bio" placeholder="Biography" rows="3"></textarea>
                <?php if (isset($_SESSION['val']['bio'])) {
                    printValidationMessages('bio');
                } ?>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-lg bg-warmyellow" name="submit">Submit</button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>