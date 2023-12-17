<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../layouts/nav.php';
adminOnly();

$sql = "SELECT * FROM books WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $_GET['id']]);
$book = $stmt->fetch();

if ($stmt->rowCount() == 0) {
    redirect(route('books'));
}

$authors = getAllAuthors($conn);
$categories = getAllCategories($conn);

?>

<div class="container">
    <h1 class="text-white text-center mt-4">Edit a book</h1>
    <form action="<?= route('updateBook', $book['id']) ?>" method="POST" class="mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $book['title'] ?>">
                <?php if (isset($_SESSION['val']['title'])) {
                    printValidationMessages('title');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <select class="form-select" name="author" id="author">
                    <?php
                    foreach ($authors as $author) {
                        if($book['author_id'] == $author['id']) {
                            echo "
                            <option value='" . $author['id'] . "' selected>" . $author['name'] . "</option>
                            ";
                        } else {
                            echo "
                            <option value='" . $author['id'] . "'>" . $author['name'] . "</option>
                            ";
                        }
                    }
                    ?>
                </select>
                <?php if (isset($_SESSION['val']['author'])) {
                    printValidationMessages('author');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <textarea type="textarea" class="form-control" name="description" id="description" placeholder="Description" rows="3"><?= $book['description'] ?></textarea>
                <?php if (isset($_SESSION['val']['description'])) {
                    printValidationMessages('description');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" onfocus="(this.type = 'date')" class="form-control" name="date_of_issue" id="date_of_issue" placeholder="Publish date" value="<?= $book['date_of_issue'] ?>">
                <?php if (isset($_SESSION['val']['date_of_issue'])) {
                    printValidationMessages('date_of_issue');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="number" class="form-control" name="number_of_pages" id="number_of_pages" placeholder="Number of pages" value="<?= $book['number_of_pages'] ?>">
                <?php if (isset($_SESSION['val']['number_of_pages'])) {
                    printValidationMessages('number_of_pages');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="url" class="form-control" name="cover" id="cover" placeholder="Cover URL" value="<?= $book['cover'] ?>">
                <?php if (isset($_SESSION['val']['cover'])) {
                    printValidationMessages('cover');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <select class="form-select" name="category" id="category">
                    <?php
                    foreach ($categories as $category) {
                        if($book['category_id'] == $category['id']) {
                            echo "
                            <option value='" . $category['id'] . "' selected>" . $category['name'] . "</option>
                            ";
                        } else {
                            echo "
                            <option value='" . $category['id'] . "'>" . $category['name'] . "</option>
                            ";
                        }
                    }
                    ?>
                </select>
                <?php if (isset($_SESSION['val']['category'])) {
                    printValidationMessages('category');
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