<?php
require_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../layouts/nav.php';
adminOnly();
$books = getAllBooks($conn);
$delBooks = getAllDeletedBooks($conn);

?>
<div class="container">
    <h1 class="text-white text-center mt-4">Add/Edit Books</h1>
    <a href="<?= route('createBook') ?>" class="btn btn-lg bg-warmyellow mt-4">Add a book</a>
    <div class="table-responsive">
        <table class="table table-dark mt-4">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th class="d-none d-md-table-cell" scope="col">Date</th>
                    <th class="d-none d-md-table-cell" scope="col">Pages</th>
                    <th class="d-none d-md-table-cell" scope="col">Category</th>
                    <th class="d-none d-md-table-cell" scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($books as $book) {
                    echo "
                <tr>
                    <td class='text-truncate' style='max-width: 5rem;'>{$book['title']}</td>
                    <td class='text-truncate' style='max-width: 5rem;'>{$book['author']}</td>
                    <td class='d-none d-md-table-cell' style='max-width: 5rem;'>" . date("F j, Y", strtotime($book['date_of_issue'])) . "</td>
                    <td class='d-none d-md-table-cell'>{$book['number_of_pages']}</td>
                    <td class='d-none d-md-table-cell'>{$book['category']}</td>
                    <td class='text-truncate d-none d-md-table-cell' style='max-width: 3rem;'>{$book['description']}</td>
                    <td style='max-width: 7rem;'><a href='" . route('editBook', $book['id']) . "' class='btn bg-warmyellow me-3'>Edit</a><a href='" . route('deleteBook', $book['id']) . "' class='btn btn-danger deleteBtn'>Delete</a></td>
                </tr>
            ";
                } ?>
            </tbody>
        </table>
    </div>
    <h1 class="text-white text-center mt-4">Deleted Books</h1>
    <div class="table-responsive">
        <table class="table table-dark mt-4">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th class="d-none d-md-table-cell" scope="col">Date</th>
                    <th class="d-none d-md-table-cell" scope="col">Pages</th>
                    <th class="d-none d-md-table-cell" scope="col">Category</th>
                    <th class="d-none d-md-table-cell" scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($delBooks > 0) {
                foreach ($delBooks as $delBook) {
                        echo "
                        <tr>
                            <td class='text-truncate' style='max-width: 5rem;'>{$delBook['title']}</td>
                            <td class='text-truncate' style='max-width: 5rem;'>{$delBook['author']}</td>
                            <td class='d-none d-md-table-cell' style='max-width: 5rem;'>" . date("F j, Y", strtotime($delBook['date_of_issue'])) . "</td>
                            <td class='d-none d-md-table-cell'>{$delBook['number_of_pages']}</td>
                            <td class='d-none d-md-table-cell'>{$delBook['category']}</td>
                            <td class='text-truncate d-none d-md-table-cell' style='max-width: 3rem;'>{$delBook['description']}</td>
                            <td style='max-width: 10rem;'><a href='" . route('restoreBook', $delBook['id']) . "' class='btn bg-warmyellow me-3'>Restore</a><a href='" . route('deleteBookPerm', $delBook['id']) . "' class='btn text-white bg-danger deleteBtnBook'>Delete Permanently</a></td>
                        </tr>
                        ";
                    }
                }else {
                    echo "
                    <tr>
                        <td class='w-75' colspan='7'>There are no deleted books.</td>
                    </tr>
                    ";
                } ?>
            </tbody>
        </table>
    </div>
</div>


<?php
require_once __DIR__ . '/../layouts/footer.php';
?>