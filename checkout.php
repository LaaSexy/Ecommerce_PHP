<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity - Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin-bottom: 5rem;
            background-color: #F8F8F8;
        }
        header {
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .footer-content {
            box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .quantity-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #ddd;
            background-color: #ffc107;
            border-radius: 50px;
            font-size: 20px;
            color: white;
            font-weight: bold;
        }
        .quantity-input {
            width: 50px;
            height: 30px;
            text-align: center;
            border: none;
        }
        .checkout-btn {
            background-color: #ffc107;
            border: none;
            width: 100%;
            height: 45px;
            border-radius: 25px;
            font-weight: 600;
        }
        .delete-btn {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
        }
        .delete-btn:hover {
            color: #b02a37;
        }
        .empty-image{
            width: 40%;
            height: 40%;
            justify-content: center;
            align-items: center;
            display: flex;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <header class="position-fixed top-0 start-0 end-0 bg-white py-3">
        <div class="container-fluid">
            <div class="d-flex align-items-center position-relative">
                <button class="btn  position-absolute" onclick="window.location.href='index.php'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                </button>
                <h1 class="fs-5 fw-bold text-center w-100 m-0">Cart</h1>
            </div>
        </div>
    </header>

    <main class="container py-5 mt-5">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <section class="card p-4">
                    <h2 class="fs-4 fw-semibold mb-3">Contact Information</h2>
                    <form id="contactForm">
                        <label class="form-label">Personal Information</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-user mr-2 my-1"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter your name" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>

                        <label class="form-label">Contact Details</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-phone mr-2 my-1"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter Number" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>

                        <label class="form-label">Address</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-home mr-2 my-1"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter Address" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </form>
                </section>
            </div>
            <div class="col-lg-6">
                <section class="card p-4">
                    <h2 class="fs-4 fw-semibold mb-3">Order Summary</h2>
                    <div id="cartItemsContainer">
                    </div>
                    <div class="item-row pt-3 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fw-semibold">Total</div>
                            <div id="cartTotal" class="item-price fs-5 fw-bold">$0.00</div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <footer class="footer-content position-fixed bottom-0 start-0 end-0 bg-white py-3">
        <div class="container">
            <button id="checkoutBtn" class="checkout-btn text-white">Checkout - $0.00</button>
        </div>
    </footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./javascript/checkout.js"></script>
</body>
</html>