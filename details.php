<?php
include './constants/categories.php';

$item_id = isset($_GET['item_id']) ? $_GET['item_id'] : null;
$item = null;
$item_name = null;

foreach ($categories as $category) {
    foreach ($category['items'] as $itm) {
        if ($itm['id'] === $item_id) {
            $item = $itm;
            $item_name= $item['name'];
            break 2;
        }
    }
}

if (!$item) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
    <link href="./styles/details.css" rel="stylesheet">
</head>
<body>

    <header class="details-header position-fixed top-0 start-0 end-0 bg-white py-3 shadow-sm z-3">
        <div class="container-fluid">
            <div class="d-flex align-items-center position-relative">
                <button class="btn btn-sm position-absolute bg-white" onclick="window.location.href='index.php'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                </button>
                <h1 class="product-title khmer-font-bold text-center w-100 m-0">
                    <?php echo htmlspecialchars($item_name); ?>
                </h1>
            </div>
        </div>
    </header>
    
    <div class="container py-3">
        <div class="row">
            <div class="col-md-6 d-md-block">
                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="product-image mb-3" id="mainImage">
                <div class="row">
                    <?php foreach ($item['thumbnails'] as $thumbnail) { ?>
                        <div class="col-3">
                            <img src="<?php echo htmlspecialchars($thumbnail); ?>" alt="Thumbnail" class="thumbnail-image" onclick="changeImage(this.src)">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="price text-monospace"><?php echo htmlspecialchars($item['price']); ?></div>
                <div class="options-label">Options</div>
                <div class="mb-3">
                    <span class="size-option active">M</span>
                    <span class="size-option">L</span>
                    <span class="size-option">XL</span>
                </div>
                
                <h2 class="description-title">Description</h2>
                <p><?php echo htmlspecialchars($item['description']); ?></p>
            </div>
        </div>
    </div>
    
    <footer class="shadow-sm footer-content">
        <div class="d-flex flex-row justify-content-center">
            <button class="quantity-btn btn text-white">-</button>
            <input type="text" class="quantity-input text-black" value="1">
            <button type="button" class="quantity-btn btn btn-sm text-white text-large">+</button>
        </div>
        <div class="d-flex flex-row justify-content-center mt-3">
            <button class="add-to-cart">Add to Cart</button>
        </div>
    </footer>

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = document.querySelector('.quantity-input');
                let value = parseInt(input.value);
                if (this.textContent === '+') {
                    value++;
                } else {
                    value = value > 1 ? value - 1 : 1;
                }
                input.value = value;
            });
        });
        
        document.querySelectorAll('.size-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.size-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>
</body>
</html>