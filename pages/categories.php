 <?php
require_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../layouts/nav.php';
adminOnly();
$categories = getAllCategories($conn);
$delCategories = getAllDeletedCategories($conn);

?>

<div class="container">
    <h1 class="text-white text-center mt-4">Add/Edit Categories</h1>
    <a href="<?= route('createCategory') ?>" class="btn btn-lg bg-warmyellow mt-4">Add a category</a>
    <div class="table-responsive">
        <table class="table table-dark mt-4">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($categories as $category) {
                    echo "
                <tr>
                    <td class='w-75'>{$category['name']}</td>
                    <td style='max-width: 4rem;'><a href='" . route('editCategory', $category['id']) . "' class='btn bg-warmyellow me-3'>Edit</a><a href='" . route('deleteCategory', $category['id']) . "' class='btn btn-danger deleteBtn'>Delete</a></td>
                </tr>
                ";
                } ?>
            </tbody>
        </table>
    </div>

    <h1 class="text-white text-center mt-4">Deleted Categories</h1>
    <div class="table-responsive">
        <table class="table table-dark mt-4 mb-4">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($delCategories > 0) {
                    foreach ($delCategories as $delCategory) {
                        echo "
                        <tr>
                            <td class='w-75'>{$delCategory['name']}</td>
                            <td style='max-width: 4rem;'><a href='" . route('restoreCategory', $delCategory['id']) . "' class='btn bg-warmyellow me-3'>Restore</a><a href='" . route('deleteCategoryPerm', $delCategory['id']) . "' class='btn text-white bg-danger deleteBtnPerm'>Delete Permanently</a></td>
                        </tr>
                        ";
                    }
                } else {
                    echo "
                        <tr>
                            <td class='w-75' colspan='2'>There are no deleted categories.</td>
                        </tr>
                        ";
                }

                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once __DIR__ . '/../layouts/footer.php';
?>