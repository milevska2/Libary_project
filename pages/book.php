<?php
require_once __DIR__ . '/../layouts/header.php';

$book = getBook($conn, $_GET['id']);
$reviews = getAllApprovedReviews($conn, $_GET['id']);
if (auth()) {
    $userReview = getUserReview($conn, $_GET['id'], $_SESSION['user']['id']);
}

?>
<div class="container my-4">
    <div class="row bg-dark p-3">
        <div class="col-12 col-lg-3 mb-4 mb-lg-0">
            <img src="<?= $book['cover'] ?>" class="img-fluid" alt="Cover Image">
        </div>
        <div class="col-12 col-lg-9">
            <h1 class="text-white">'<?= $book['title'] ?>'</h1>
            <h3 class="text-white">by <?= $book['author'] ?></h3>
            <h5 class="text-white">First published: <?= date("F j, Y", strtotime($book['date_of_issue'])) ?></h5>
            <h5 class="text-white">Number of pages: <?= $book['number_of_pages'] ?></h5>
            <p class="text-white text-justify mt-3"><?= $book['description'] ?></p>
        </div>
    </div>
    <div class="row bg-dark text-white mt-5 p-4">
        <div class="col">
            <h3>About the author:</h3>
            <p class="text-justify"><?= $book['bio'] ?></p>
        </div>
    </div>
    <?php if (auth()) { ?>
        <div class="row bg-dark text-white mt-5 p-4" id="notes">
            <h3>Your notes:</h3>
            <div class="col-12">
                <form action="<?= route('storeNote', $_GET['id']) ?>" method="POST" id="noteSubmit">
                    <input type="text" class="form-control" name="note" id="note" placeholder="Write your note here">
                    <button type="submit" class="btn bg-warmyellow mt-3">Submit</button>
                </form>
            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-center mt-3" id="noteContainer"></div>
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class='modal-dialog modal-dialog-centered text-dark'>
                    <div class='modal-content'>
                        <form action='' method='POST'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='editModalLabel'>Edit Note</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                                <button type='button' class='btn bg-warmyellow' data-bs-dismiss='modal' id='editNoteSubmit'>Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row bg-dark text-white mt-5 p-4">
        <div class="col">
            <h3 class="mb-4">Book Reviews:</h3>
            <?php if (!isset($_SESSION['user'])) { ?>
                <div class='border border-4 rounded p-4 mb-3'>
                    <p class='text-center m-0'>You need to be <a href='<?= route('login') ?> ' class="text-warmyellow">logged in</a> or <a href='<?= route('register') ?>' class="text-warmyellow">register</a> to post a review.</p>
                </div>
            <?php } else { ?>
                <?php if ($userReview) { ?>
                    <div class='border border-4 rounded p-4 mb-3'>
                        <h5>Your review:</h5>
                        <h4><?= $_SESSION['user']['first_name'], ' ', $_SESSION['user']['last_name'] ?></h4>
                        <p><?= $userReview['review'] ?></p>
                        <a href='<?= route('deleteReview', $_GET['id']) ?>' class='btn btn-danger'>Delete your review</a>
                        <?php if (!$userReview['is_approved']) { ?>
                            <span class='text-warmyellow'>Your review hasn't been approved yet.</span>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class='border border-4 rounded p-4'>
                        <h4>Share your review on this book:</h4>
                        <form action="<?= route('addReview', $_GET['id']) ?>" method="POST">
                            <textarea class="form-control" name="review" id="review" cols="100" rows="3" placeholder="Your thoughts"></textarea>
                            <?php if (isset($_SESSION['val']['review'])) {
                                printValidationMessages('review');
                            } ?>
                            <button type="submit" class="btn bg-warmyellow mt-3">Submit</button>
                        </form>
                    </div>
                <?php } ?>
            <?php } ?>

            <?php if ($reviews) {
                foreach ($reviews as $review)
                    echo "<div class='border border-4 rounded p-4 mt-3 position-relative'>
                                <h4 class='mb-2'>" . $review['name'] . "</h4>
                                <p>" . $review['review'] . "</p>
                                <p class='m-2 position-absolute bottom-0 end-0'>" . timeAgo($review['created_at']) . "</p>
                            </div>";
            } else {
                echo "
                <div class='border border-4 rounded p-4 mt-3'>
                    <p class='text-center p-4 m-0'>There are no reviews on this book yet.</p>
                </div>
                ";
            }
            ?>
        </div>
    </div>
</div>
<div class="bg-dark text-white p-4 text-center quoteDiv"></div>
<div class="bg-black text-center text-white p-3">
    <p class="m-0">Copyright @ milevska ivana</p>
</div>


<?php
require_once __DIR__ . '/../layouts/footer.php';
?>