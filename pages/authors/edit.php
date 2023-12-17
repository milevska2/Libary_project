<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../layouts/nav.php';
adminOnly();

$sql = "SELECT * FROM authors WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $_GET['id']]);
$author = $stmt->fetch();

if ($stmt->rowCount() == 0) {
    redirect(route('authors'));
}

?>

<div class="container">
    <h1 class="text-white text-center mt-4">Edit an author</h1>
    <form action="<?= route('updateAuthor', $author['id']) ?>" method="POST" class="mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?= $author['first_name'] ?>">
                <?php if (isset($_SESSION['val']['first_name'])) {
                    printValidationMessages('first_name');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?= $author['last_name'] ?>">
                <?php if (isset($_SESSION['val']['last_name'])) {
                    printValidationMessages('last_name');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <textarea class="form-control" name="bio" id="bio" placeholder="Biography" rows="3"><?= $author['bio'] ?></textarea>
                <?php if (isset($_SESSION['val']['bio'])) {
                    printValidationMessages('bio');
                } ?>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-lg bg-warmyellow" name="submit">Update</button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>