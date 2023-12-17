<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../layouts/nav.php';
adminOnly();

$sql = "SELECT * FROM categories WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $_GET['id']]);
$category = $stmt->fetch();

if ($stmt->rowCount() == 0) {
    redirect(route('categories'));
}

?>

<div class="container">
    <h1 class="text-white text-center mt-4">Update a category</h1>
    <form action="<?= route('updateCategory', $category['id']) ?>" method="POST" class="mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $category['name'] ?>">
                <?php if (isset($_SESSION['val']['title'])) {
                    printValidationMessages('title');
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