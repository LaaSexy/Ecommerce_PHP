<?php
    require_once __DIR__ . '/database/database.php';
include './constants/categories.php';
    $db = new EcommerceDB();
    $categories = $db->getCategories(); 
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) { 
        header("Location: login.php"); 
        exit; 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="sticky-top">
        <nav class="container-fluid px-4 navbar navbar-custom">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="#">
                    <img src="./images/Shopfinity.png" alt="Shopfinity">
                </a>
                <span class="shop-name">Shopfinity</span>
            </div>
            <ul class="navbar-nav ms-auto d-flex flex-row align-items-center">
                <a href="checkout.php" class="nav-card position-relative mr-2" id="cartIcon" style="text-decoration: none;">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge  notification-badge" id="cartBadge">0</span>
                </a>
                <div class="dropdown show">
                    <a class="btn btn-primary dropdown-toggle text-dark font-weight-bold mt-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo isset($_SESSION['admin_username']) ? htmlspecialchars($_SESSION['admin_username']) : 'Guest'; ?>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-fw mr-2"></i>Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cog fa-fw mr-2"></i>Settings
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item btn_logout" href="logout.php">
                                <i class="fas fa-sign-out-alt fa-fw mr-2"></i>Logout
                            </a>
                        </li>
                    </div>
                </div>
            </ul>
        </nav>

        <div class="category-row bg-light">
            <div class="px-4">
                <ul class="navbar-nav d-flex flex-row mt-1 mb-1">
                    <?php
                    foreach ($categories as $index => $category) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link khmer-font-b" href="#<?php echo htmlspecialchars($category['id']); ?>" data-translate="category<?php echo $index + 1; ?>">
                                <?php echo htmlspecialchars($category['name']); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="search-row bg-right">    
            <div class="container-fluid px-4">
                <div class="search-container mb-1 d-flex position-relative">
                    <img src="./images/search.png" alt="search" class="position-absolute mt-2 ml-3 w-20">
                    <input type="search" id="searchInput" class="form-control search-input khmer-font" placeholder="ស្វែងរក" data-translate="search" onkeyup="searchItems()">
                </div>
            </div>  
        </div>
        
    </header>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/header.js"></script>
</body>
</html>