<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shopping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="http://localhost/ecommerce/images/Shopfinity.png">
    <style>
        .navbar-custom {
            background-color: #ffffff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0.5rem;
        }
        .navbar-brand img {
            height: 50px;
            transition: all 0.3s;
        }
        .navbar-brand img:hover {
            transform: scale(1.05);
        }
        .shop-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333333;
        }
        .search-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        .search-input {
            border-radius: 50px;
            padding-left: 45px;
            padding-right: 20px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
            height: 40px;
            font-family: 'CustomFont',
        }
        .search-input:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 0.25rem rgba(74, 144, 226, 0.25);
        }
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .nav-link {
            color: #333333;
            font-weight: 700;
            padding: 0.3rem 0.4rem;
            margin: 0 0.2rem;
            transition: all 0.2s;
            border-radius: 5px;
        }
        .nav-link:hover {
            color: #4a90e2;
        }
        .category-row {
            background-color: #f8f9fa;
            padding-top: 0.3rem;
            overflow-x: auto;
            padding-left: 0.6rem;
            padding-right: 1rem;
        }
        .category-row .navbar-nav {
            flex-wrap: nowrap;
            justify-content: flex-start;
        }
        .search-row {
            padding-bottom: 0.2rem;
            background-color: #F8F8F8;
        }
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 0.7rem;
        }
        .nav-item {
            border: 2px solid #333333;
            text-align: center;
            margin-right: 5px;
            margin-bottom: 5px;
            border-radius: 100px;
            flex: 0 0 auto;
            min-width: 100px;
        }
        .nav-item:hover {
            border: 2px solid #C6C6C6;
            background-color: #FFC715;
            color: white;
        }
        .nav-item:hover .nav-link {
            color: white;
            background-color: transparent;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 0.5rem 0;
        }
        .dropdown-item {
            padding: 0.5rem 1.5rem;
            display: flex;
            align-items: center;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #4a90e2;
        }
        .flag-icon {
            width: 30px;
            height: 20px;
            margin-right: 10px;
        }
        .nav-card {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            text-decoration: none;
            position: relative;
        }
        .nav-card i {
            font-size: 1.5rem;
            color: #333333;
            transition: color 0.3s ease;
            margin-top: 5px;
        }
        .nav-card:hover i {
            color: #4a90e2;
        }
        .notification-badge {
            position: absolute;
            top: -3px;
            right: -3px;
            font-family: 'CustomFont', sans-serif;
            font-size: 0.70rem;
            font-weight: bold;
            background-color: #FFC715;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease;
        }
        .nav-card:hover .notification-badge {
            transform: scale(1.15);
        }
        @media (max-width: 576px) {
            .shop-name {
                font-size: 1.2rem;
            }
            .navbar-brand img {
                height: 30px;
            }
            .search-input {
                font-size: 0.9rem;
            }
            .nav-item {
                min-width: 80px;
                margin-right: 3px;
            }
            .navbar-nav.ms-auto {
                flex-direction: row;
                align-items: center;
            }
            .dropdown-toggle::after {
                margin-left: 5px;
            }
            .category-row {
                max-height: 100px;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-light navbar-custom">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand" href="#">
                        <img src="http://localhost/ecommerce/images/Shopfinity.png" alt="Shopfinity">
                    </a>
                    <span class="shop-name">E-Shopping</span>
                </div>
                <ul class="navbar-nav ms-auto d-flex flex-row align-items-center">
                    <a class="nav-card position-relative" href="#">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-primary notification-badge">5</span>
                    </a>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://flagcdn.com/w20/kh.png" class="flag-icon" alt="Khmer">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li>
                                <a class="dropdown-item" href="#" data-lang="km">
                                    <img src="https://flagcdn.com/w20/kh.png" class="flag-icon" alt="Khmer"> Khmer
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-lang="en">
                                    <img src="https://flagcdn.com/w20/gb.png" class="flag-icon" alt="English"> English
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-lang="zh">
                                    <img src="https://flagcdn.com/w20/cn.png" class="flag-icon" alt="Chinese"> Chinese
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Second Row: Category Items -->
        <div class="category-row">
            <div class="container-fluid">
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-translate="category1">សម្លៀកបំពាក់</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-translate="category2">Skincare</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-translate="category3">អាហារ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-translate="category3">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-translate="category3">Drink</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-translate="category3">Computer Accessory </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Third Row: Search Bar -->
        <div class="search-row">
            <div class="container-fluid">
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="search" class="form-control search-input" placeholder="ស្វែងរក" data-translate="search">
                </div>
            </div>
        </div>
    </header>
</body>
</html>