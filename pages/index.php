<?php
require_once __DIR__ . '/../layouts/header.php';
?>

<div class="banner d-flex align-items-center justify-content-center">
<div class="text-white opacity-100 p-4 text-center quoteDiv"></div>
</div>

<div class="my-4">
  <div class="row m-0">
    <div class="col-md-12 mb-4 mb-lg-0 col-lg-3">
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item bg-secondary text-white">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne">
              Categories:
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="list-group">
                <?php
                $categories = getAllCategories($conn);
                foreach ($categories as $category) {
                  echo "
                  <div class='form-check'>
                  <input class='form-check-input category' type='checkbox' id='{$category['name']}' value='{$category['name']}' name='fl-category'>
                  <label class='form-check-label pointerCursor' for='{$category['name']}'>
                  {$category['name']}
                  </label>
                  </div>
                ";
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item bg-secondary text-white">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Authors:
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="list-group">
                <?php
                $authors = getAllAuthors($conn);
                foreach ($authors as $author) {
                  echo "
                  <div class='form-check'>
                  <input class='form-check-input category' type='checkbox' id='" . preg_replace("/[\s]|[\.]/", "", $author['name']) . "' value='" . preg_replace("/[\s]|[\.]/", "", $author['name']) . "' name='fl-author'>
                  <label class='form-check-label pointerCursor' for='" . preg_replace("/[\s]|[\.]/", "", $author['name']) . "'>
                  {$author['name']}
                  </label>
                  </div>
                ";
                }
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-md-12 col-lg-9">
      <div class="row">
        <?php
        $books = getAllBooks($conn);
        foreach ($books as $book) {
          echo "
              <div class='col-6 col-sm-4 col-lg-4 col-xl-3 mb-3 categoryDiv' data-category='" . $book['category'] . " " . preg_replace("/[\s]|[\.]/", "", $book['author']) . "'>
                <a href='" . route('book', $book['id']) . "'>
                  <div class='card h-100 border-0 rounded'>
                    <img class='card-img-top img-fluid rounded' src='{$book['cover']}' alt='Card image cap'>
                      <div class='card-img-overlay d-flex flex-column justify-content-center text-white'>
                        <h5 class='card-title'>'{$book['title']}'</h5>
                        <h6 class='card-title'>by {$book['author']}</h6>
                        <p class='card-subtitle'>{$book['category']}</p>
                      </div>
                  </div>
                </a>
              </div>
            ";
        }
        ?>
      </div>
    </div>
  </div>
</div>
<div class="bg-black text-center text-white p-3">
    <p class="m-0">Copyright @ milevska ivana 2023</p>
</div>

<?php
require_once __DIR__ . '/../layouts/footer.php';
?>