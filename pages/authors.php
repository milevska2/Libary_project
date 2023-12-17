<?php
require_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../layouts/nav.php';
adminOnly();
$authors = getAllAuthors($conn);
$delAuthors = getAllDeletedAuthors($conn);

?>

<div class="container">
    <h1 class="text-white text-center mt-4">Add/Edit Authors</h1>
    <a href="<?= route('createAuthor') ?>" class="btn btn-lg bg-warmyellow mt-4">Add an author</a>
    <div class="table-responsive">
        <table class="table table-dark mt-4">
            <thead>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Bio</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($authors as $author) {
                    echo "
                <tr>
                    <td>{$author['name']}</td>
                    <td class='w-50 text-truncate' style='max-width:5rem;'>{$author['bio']}</td>
                    <td style='max-width: 7rem;'><a href='" . route('editAuthor',$author['id']) . "' class='btn bg-warmyellow me-3'>Edit</a><a href='" . route('deleteAuthor', $author['id']) . "' class='btn btn-danger deleteBtn'>Delete</a></td>
                </tr>
                ";
                } ?>
            </tbody>
        </table>
    </div>

    <h1 class="text-white text-center mt-4">Deleted Authors</h1>
    <div class="table-responsive">
        <table class="table table-dark mt-4">
            <thead>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Bio</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                if ($delAuthors > 0) {
                    foreach ($delAuthors as $delAuthor) {
                        echo "
                        <tr>
                            <td>{$delAuthor['name']}</td>
                            <td class='w-50 text-truncate' style='max-width:5rem;'>{$delAuthor['bio']}</td>
                            <td style='max-width: 7rem;'><a href='" . route('restoreAuthor',$delAuthor['id']) . "' class='btn bg-warmyellow me-3'>Restore</a><a href='" . route('deleteAuthorPerm', $delAuthor['id']) . "' class='btn text-white bg-danger deleteBtnPerm'>Delete Permanently</a></td>
                        </tr>
                        ";
                        }
                    } else {
                        echo "
                        <tr>
                            <td class='w-75' colspan='3'>There are no deleted authors.</td>
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