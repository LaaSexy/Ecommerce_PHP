<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
    <link rel="stylesheet" href="./styles/content.css">
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
        .carousel-item img {
            object-fit: cover;
            height: 500px;
        }
        .btn-carousel{
            background-color: none;
            border: none;
            background: none;
        }
    </style>
</head>
<body>
   <main class="container-fluid px-0">
        <div id="carouselExampleIndicators" class="carousel slide">
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
                    <img src="images/Banner4.jpg" class="d-block w-100 rounded" alt="Four slide">
                </div>
                <div class="carousel-item">
                    <img src="images/Banner5.jpg" class="d-block w-100 rounded" alt="Five slide">
                </div>
            </div>
            <button class="carousel-control-prev btn-carousel cursor-pointer" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next btn-carousel cursor-pointer" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
        <div class="py-2 bg-light">
            <?php
            include './constants/categories.php';
            foreach ($categories as $category) {
            ?>
                <div class="sticky-container bg-light px-4" id="<?php echo htmlspecialchars($category['id']); ?>">
                    <h4 class="khmer-font mt-2 ml-3"><?php echo htmlspecialchars($category['name']); ?></h4>
                </div>
                <div class="row g-4 mb-5 mx-4">
                    <?php foreach ($category['items'] as $item) { ?>
                        <div class="col-6 col-sm-6 col-md-3 mt-3">
                            <a href="details.php?item_id=<?php echo htmlspecialchars($item['id']); ?>" style="text-decoration: none;">
                                <div class="card card-custom h-100">
                                    <div class="position-relative">
                                        <img class="card-img-top w-100" src="<?php echo htmlspecialchars($item['image']); ?>" alt="Product image">
                                        <div class="brand-label"><?php echo htmlspecialchars($item['brand']); ?></div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-2 text-muted"><?php echo htmlspecialchars($item['name']); ?></h5>
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