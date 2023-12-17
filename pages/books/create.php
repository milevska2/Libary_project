<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../layouts/nav.php';
adminOnly();

$categories = getAllCategories($conn);
$authors = getAllAuthors($conn);

?>

<div class="container">
    <h1 class="text-white text-center mt-4">Add a book</h1>
    <form action="<?= route('addBook') ?>" method="POST" class="mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                <?php if (isset($_SESSION['val']['title'])) {
                    printValidationMessages('title');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <select class="form-select" name="author" id="author">
                    <option value="0" selected>Select an author..</option>
                    <?php
                    foreach ($authors as $author) {
                        echo "
                        <option value='" . $author['id'] . "'>" . $author['name'] . "</option>
                        ";
                    }
                    ?>
                </select>
                <?php if (isset($_SESSION['val']['author'])) {
                    printValidationMessages('author');
                } ?>
                <p class="text-white mt-2 mb-0">Can't find the author you're looking for? <a class="text-warmyellow" href="<?= route('createAuthor') ?>">Add them!</a></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <textarea type="textarea" class="form-control" name="description" id="description" placeholder="Description" rows="3"></textarea>
                <?php if (isset($_SESSION['val']['description'])) {
                    printValidationMessages('description');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" onfocus="(this.type = 'date')" class="form-control" name="date_of_issue" id="date_of_issue" placeholder="Publish date">
                <?php if (isset($_SESSION['val']['date_of_issue'])) {
                    printValidationMessages('date_of_issue');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="number" class="form-control" name="number_of_pages" id="number_of_pages" placeholder="Number of pages">
                <?php if (isset($_SESSION['val']['number_of_pages'])) {
                    printValidationMessages('number_of_pages');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="url" class="form-control" name="cover" id="cover" placeholder="Cover URL">
                <?php if (isset($_SESSION['val']['cover'])) {
                    printValidationMessages('cover');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <select class="form-select" name="category" id="category">
                    <option value="0" selected>Select a Category..</option>
                    <?php
                    foreach ($categories as $category) {
                        echo "
                        <option value='" . $category['id'] . "'>" . $category['name'] . "</option>
                        ";
                    }
                    ?>
                </select>
                <?php if (isset($_SESSION['val']['category'])) {
                    printValidationMessages('category');
                } ?>
                <p class="text-white mt-2 mb-0">Can't find the category you're looking for? <a class="text-warmyellow" href="<?= route('createCategory') ?>">Add it!</a></p>
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