<?php
include './constants/categories.php';

$item_id = isset($_GET['item_id']) ? $_GET['item_id'] : null;
$item = null;
$item_name = null;

foreach ($categories as $category) {
    foreach ($category['items'] as $itm) {
        if ($itm['id'] === $item_id) {
            $item = $itm;
            $item_name = $item['name'];
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
    <style>
        .thumbnail-image {
            cursor: pointer;
            transition: border 0.3s ease;
            border: 2px solid transparent;
        }
        .thumbnail-image.active {
            border: 2px solid #FFC715; 
        }
        .btn-back{
            height: 40px;
        }
    </style>
</head>
<body>
    <header class="position-fixed top-0 start-0 end-0 bg-white py-3 shadow-sm z-3">
        <div class="container-fluid">
            <div class="d-flex align-items-center position-relative">
                <button class="btn btn-sm position-absolute bg-transparent btn-back border rounded-circle" onclick="window.location.href='index.php'">
                   <img src="./images/BackChev.png" alt="back btn" width="24" height="24" class="mr-1">
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
                    <?php foreach ($item['thumbnails'] as $index => $thumbnail) { ?>
                        <div class="col-3">
                            <img src="<?php echo htmlspecialchars($thumbnail); ?>" 
                                 alt="Thumbnail" 
                                 class="thumbnail-image" 
                                 data-index="<?php echo $index; ?>"
                                 onclick="selectThumbnail(this)">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="price text-monospace"><?php echo htmlspecialchars($item['price']); ?></div>
                <!-- <div class="options-label">Options</div>
                <div class="mb-3">
                    <span class="size-option active">M</span>
                    <span class="size-option">L</span>
                    <span class="size-option">XL</span>
                </div> -->
                
                <h2 class="description-title">Description</h2>
                <p><?php echo htmlspecialchars($item['description']); ?></p>
            </div>
        </div>
    </div>
    
    <footer class="shadow-sm footer-content">
        <div class="d-flex flex-row justify-content-center">
            <button type="button" class="btn-decreasement quantity-btn btn btn-lg text-white btn-lg">−</button>
            <h3 class="quantity-input text-black  mt-2">1</h3>
            <button type="button" class="btn-increasement quantity-btn btn btn-lg text-white">+</button>
        </div>
        <div class="d-flex flex-row justify-content-center mt-3">
             <button type="button" class="add-to-cart btn" data-price="<?php echo htmlspecialchars(str_replace(['$', ','], '', $item['price'])); ?>">
                Add to Cart - <?php echo htmlspecialchars($item['price']); ?>
            </button>
        </div>
    </footer>

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function getCart() {
                return JSON.parse(localStorage.getItem('cart')) || [];
            }

            function saveCart(cart) {
                localStorage.setItem('cart', JSON.stringify(cart));
            }

            function selectThumbnail(element) {
                document.querySelectorAll('.thumbnail-image').forEach(img => {
                    img.classList.remove('active');
                });
                element.classList.add('active');
                document.getElementById('mainImage').src = element.src;
                localStorage.setItem('selectedThumbnail', element.src);
            }

            const quantityInput = document.querySelector('.quantity-input');
            const addToCartBtn = document.querySelector('.add-to-cart');
            const pricePerItem = parseFloat(addToCartBtn.dataset.price);
            const decreasementBtn = document.querySelector('.btn-decreasement');
            const increasementBtn = document.querySelector('.btn-increasement');

            quantityInput.textContent = '1';
            addToCartBtn.disabled = false;
            addToCartBtn.textContent = `Add to Cart - $${pricePerItem.toFixed(2)}`;
            decreasementBtn.disabled = true;

            increasementBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.textContent);
                value++;
                quantityInput.textContent = value;
                const totalPrice = (pricePerItem * value).toFixed(2);
                addToCartBtn.textContent = `Add to Cart - $${totalPrice}`;
                addToCartBtn.disabled = false;
                decreasementBtn.disabled = value === 1;
            });

            decreasementBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.textContent);
                value = value > 1 ? value - 1 : 1;
                quantityInput.textContent = value;
                const totalPrice = (pricePerItem * value).toFixed(2);
                addToCartBtn.textContent = `Add to Cart - $${totalPrice}`;
                addToCartBtn.disabled = false;
                decreasementBtn.disabled = value === 1;
            });

            const sizeOptions = document.querySelectorAll('.size-option');
            if (sizeOptions.length > 0) {
                sizeOptions.forEach(option => {
                    option.addEventListener('click', function() {
                        sizeOptions.forEach(opt => opt.classList.remove('active'));
                        this.classList.add('active');
                    });
                });
                sizeOptions[0].classList.add('active');
            }

            addToCartBtn.addEventListener('click', () => {
                const selectedThumbnail = localStorage.getItem('selectedThumbnail');
                const quantity = parseInt(quantityInput.textContent);

                const item = {
                    id: '<?php echo htmlspecialchars($item['id']); ?>',
                    name: '<?php echo htmlspecialchars($item['name']); ?>',
                    price: pricePerItem,
                    image: selectedThumbnail || '<?php echo htmlspecialchars($item['image']); ?>',
                    quantity: quantity,
                    size: sizeOptions.length > 0 ? document.querySelector('.size-option.active')?.textContent || 'M' : ''
                };

                let cart = getCart();
                const existingItemIndex = cart.findIndex(cartItem => cartItem.id === item.id && cartItem.size === item.size);
                if (existingItemIndex >= 0) {
                    cart[existingItemIndex].quantity += item.quantity;
                } else {
                    cart.push(item);
                }
                saveCart(cart);

                localStorage.removeItem('selectedThumbnail');
                quantityInput.textContent = '0';
                addToCartBtn.disabled = true;
                addToCartBtn.textContent = `Add to Cart - $0.00`;

                if (sizeOptions.length > 0) {
                    sizeOptions.forEach(opt => opt.classList.remove('active'));
                    sizeOptions[0].classList.add('active');
                }

                const thumbnails = document.querySelectorAll('.thumbnail-image');
                if (thumbnails.length > 0) {
                    thumbnails.forEach(img => img.classList.remove('active'));
                    thumbnails[0].classList.add('active');
                    document.getElementById('mainImage').src = thumbnails[0].src;
                }
                Swal.fire({
                    title: "Added Successfully!",
                    icon: "success",
                    draggable: true,
                });
            });
            window.selectThumbnail = selectThumbnail;
        });
    </script>
</body>
</html>