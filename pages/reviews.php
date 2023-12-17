<?php
require_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../layouts/nav.php';
adminOnly();
$approvedReviews = getAllBookApprovedReviews($conn);
$rejectedReviews = getAllBookRejectedReviews($conn);

?>

<div class="container">
    <h1 class="text-white text-center mt-4">Pending/Rejected Reviews</h1>
    <div class="table-responsive">
        <table class="table table-dark mt-4 mb-4">
            <thead>
                <tr>
                    <th scope="col">Book Title</th>
                    <th scope="col">User</th>
                    <th scope="col">Review</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($rejectedReviews > 0) {
                    foreach ($rejectedReviews as $review) {
                        echo "
                    <tr>
                        <td>{$review['title']}</td>
                        <td>{$review['name']}</td>
                        <td>{$review['review']}</td>
                        <td><a href='" . route('approveReview', $review['id']) . "' class='btn bg-warmyellow me-3'>Approve</a><a href='" . route('deleteReviewPerm', $review['id']) . "' class='btn btn-danger deleteBtnPerm'>Delete Permanently</a></td>
                    </tr>
                    ";
                    }
                } else {
                    echo "
                    <tr>
                        <td colspan='4'>There are no pending/rejected reviews.</td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-dark mt-4 mb-4">
            <thead>
                <tr>
                    <th scope="col">Book Title</th>
                    <th scope="col">User</th>
                    <th scope="col">Review</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <h1 class="text-white text-center mt-4">Approved Reviews</h1>
                <?php if ($approvedReviews > 0) {
                    foreach ($approvedReviews as $review) {
                        echo "
                    <tr>
                        <td>{$review['title']}</td>
                        <td>{$review['name']}</td>
                        <td>{$review['review']}</td>
                        <td style='max-width: 4rem;'><a href='" . route('rejectReview', $review['id']) . "' class='btn btn-danger me-3'>Reject</a></td>
                    </tr>
                    ";
                    }
                } else {
                    echo "
                    <tr>
                        <td colspan='4'>There are no approved reviews.</td>
                    </tr>
                    ";
                }
                ?>
                </thead>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once __DIR__ . '/../layouts/footer.php';
?>