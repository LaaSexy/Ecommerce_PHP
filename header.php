<?php
include './constants/categories.php';
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
    <style>
        @font-face {
            font-family: 'Suwannaphum';
            src: url('fonts/Suwannaphum.ttf') format('truetype');
            font-weight: 400;
        } 
        .khmer-font {
            font-family: 'Hanuman', 'Suwannaphum', 'Noto Sans Khmer', sans-serif !important;
            font-weight: 100;
        }
        .khmer-font-regular {
            font-family: 'Hanuman', 'Suwannaphum', 'Noto Sans Khmer', sans-serif !important;
            font-weight: 400;
        }
        .khmer-font-b {
            font-family: 'Hanuman', 'Suwannaphum', 'Noto Sans Khmer', sans-serif !important;
            font-weight: 600;
        }
        .khmer-font-bold {
            font-family: 'Hanuman', 'Suwannaphum', 'Noto Sans Khmer', sans-serif !important;
            font-weight: 700;
        } 
        .nav-custom {
            background-color: #FFC715;
        }
        .btn-primary{
            background-color: transparent !important;
            border: none !important;
        }
    </style>
</head>
<body>
    <header class="sticky-top">
        <nav class="navbar navbar-light navbar-custom">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand" href="#">
                        <img src="./images/Shopfinity.png" alt="Shopfinity">
                    </a>
                    <span class="shop-name">Shopfinity</span>
                </div>
                <ul class="navbar-nav ms-auto d-flex flex-row align-items-center">
                    <a href="checkout.php" class="nav-card position-relative mr-2" id="cartIcon" style="text-decoration: none;">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-primary notification-badge" id="cartBadge">0</span>
                    </a>
                    <div class="dropdown show">
                        <a class="btn btn-primary dropdown-toggle text-dark font-weight-bold mt-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Teng Chantola
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
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item btn_logout" href="#">
                                    <i class="fas fa-sign-out-alt fa-fw mr-2"></i>Logout
                                </a>
                            </li>
                        </div>
                    </div>
                </ul>
            </div>
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

    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            const categoryLinks = document.querySelectorAll('.category-row .nav-item');
            const stickyContainers = document.querySelectorAll('.sticky-container');
            const btn_logout = document.querySelectorAll('.btn_logout');
            btn_logout.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.location.href = 'login.php';
                });
            });
            function setActiveCategory(targetId) {
                categoryLinks.forEach(link => {
                    link.classList.remove('nav-custom');
                    if (link.querySelector('a').getAttribute('href') === targetId) {
                        link.classList.add('nav-custom');
                    }
                });
            }

            categoryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.querySelector('a').getAttribute('href');
                    const targetSection = document.querySelector(targetId);
                    if (targetSection) {
                        targetSection.scrollIntoView({ behavior: 'smooth' });
                        setActiveCategory(targetId);
                    }
                });
            });

            const observerOptions = {
                root: null,
                rootMargin: '-130px 0px -50% 0px',
                threshold: [0, 0.1, 0.5, 1]
            };

            let lastActiveSection = null;

            const observer = new IntersectionObserver((entries) => {
                let closestSection = null;
                let minDistance = Infinity;

                entries.forEach(entry => {
                    const rect = entry.target.getBoundingClientRect();
                    const distance = Math.abs(rect.top);
                    if (entry.isIntersecting || rect.top >= -170) {
                        if (distance < minDistance) {
                            minDistance = distance;
                            closestSection = entry.target;
                        }
                    }
                });

                if (closestSection) {
                    const targetId = `#${closestSection.id}`;
                    if (targetId !== lastActiveSection) {
                        setActiveCategory(targetId);
                        lastActiveSection = targetId;
                    }
                }
            }, observerOptions);

            stickyContainers.forEach(container => {
                observer.observe(container);
            });

            const firstSection = document.querySelector('.sticky-container');
            if (firstSection) {
                const targetId = `#${firstSection.id}`; 
                setActiveCategory(targetId);
                lastActiveSection = targetId;
            }

            function updateCartBadge() {
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const uniqueItemIds = [...new Set(cart.map(item => item.id))];
                const totalItems = uniqueItemIds.length;
                const cartBadge = document.getElementById('cartBadge');
                cartBadge.textContent = totalItems;
                cartBadge.style.display = 'flex';
            }

            updateCartBadge();

            const cartIcon = document.getElementById('cartIcon');
            if (cartIcon) {
                cartIcon.addEventListener('click', function(e) {
                    const cart = JSON.parse(localStorage.getItem('cart')) || [];
                    if (cart.length === 0) {
                        e.preventDefault();
                    }
                });
            }
        });
    </script>
</body>
</html>