<nav class="navbar navbar-expand-lg navbar-dark bg-secondary px-2">
    <a class="navbar-brand" href="<?= route("home"); ?>">Brainster<span class="text-warmyellow">Library</span><i class="fa-solid fa-books"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <?php if (admin()) { ?>
                <li class="nav-item btn-danger text-white">
                    <a class="nav-link" href="<?= route('books') ?>">Books</a>
                </li>
                <li class="nav-item btn-info text-white">
                    <a class="nav-link" href="<?= route('authors') ?>">Authors</a>
                </li>
                <li class="nav-item btn-warning text-white text-white">
                    <a class="nav-link" href="<?= route('categories') ?>">Categories</a>
                </li>
                <li class="nav-item btn-success text-white">
                    <a class="nav-link" href="<?= route('reviews') ?>">Comments</a>
                </li>
            <?php } ?>
        </ul>
        <?php if (auth()) { ?>
            <?php if (admin()) { ?>
                <a class="btn bg-warmyellow text-dark" href="<?= route('logout') ?>">Log out, admin <?= $_SESSION['user']['first_name'] ?>  <?= $_SESSION['user']['last_name'] ?></a>
            <?php } else { ?>
                <a class="btn bg-warmyellow text-dark" href="<?= route('logout') ?>">Log out, user <?= $_SESSION['user']['first_name'] ?>  <?= $_SESSION['user']['last_name'] ?></a>
            <?php } ?>
        <?php } else {  ?>
            <a class="btn bg-warmyellow text-dark" href="<?= route('login') ?>">Sign In/Sign Up</a>
        <?php } ?>
    </div>
</nav>