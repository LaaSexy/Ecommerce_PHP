<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
    <link rel="stylesheet" href="./styles/content.css">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      .sticky-container {
          position: sticky;
          top: 170px;
          background-color: white;
          z-index: 100;
          padding-top: 15px;
          padding-bottom: 10px;
          border-bottom: 1px solid #eee;
      }
      .card-custom {
          cursor: pointer; 
          transition: transform 0.2s;
      }
      .card-custom:hover {
          transform: scale(1.05);
      }
      .btn-carousel {
        background: transparent;
        border: none;
        outline: none;
      }
      .btn-none {
        background: none;
        border: none;
        padding: 0;
        margin: 0;
        width: 15%;
      }
      .carousel-item img {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
      }
    </style>
</head>
<body>
   <main class="container-fluid px-0">
        <main id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner mt-2">
        <div class="carousel-item active">
          <img src="images/Banner1.jpg" class="d-block w-100 rounded" alt="First slide">
        </div>
        <div class="carousel-item">
          <img src="images/Banner2.jpg" class="d-block w-100 rounded" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img src="images/Banner3.jpg" class="d-block w-100 rounded" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img src="images/Banner4.jpg" class="d-block w-100 rounded" alt="Fourth slide">
        </div>
        <div class="carousel-item">
          <img src="images/Banner5.jpg" class="d-block w-100 rounded" alt="Fifth slide">
        </div>
      </div>
      <a class="carousel-control-prev btn-carousel btn-none" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next btn-carousel btn-none" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
        <div class="py-2 bg-light">
            <?php
            include './constants/categories.php';
            foreach ($categories as $category) {
            ?>
                <div class="sticky-container bg-light px-4" id="<?php echo htmlspecialchars($category['id']); ?>">
                    <h4 class="khmer-font mt-4 ml-3"><?php echo htmlspecialchars($category['name']); ?></h4>
                </div>
                <div class="row g-4 mb-5 mx-4">
                    <?php foreach ($category['items'] as $item) { ?>
                        <div class="col-6 col-sm-6 col-md-3 mt-5">
                            <a href="details.php?item_id=<?php echo htmlspecialchars($item['id']); ?>" style="text-decoration: none;">
                                <div class="card card-custom h-100">
                                    <div class="position-relative">
                                        <img class="card-img-top w-100" src="<?php echo htmlspecialchars($item['image']); ?>" alt="Product image">
                                        <div class="brand-label"><?php echo htmlspecialchars($item['brand']); ?></div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-2 text-muted text-truncate"><?php echo htmlspecialchars($item['name']); ?></h5>
                                        <p class="card-text text-muted"><?php echo htmlspecialchars($item['price']); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </main>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>