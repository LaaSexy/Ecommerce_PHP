<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Carousel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
    </div>
  </body>
</html>