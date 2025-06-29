<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity - Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./styles/checkout.css">
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
                    <form class="needs-validation" id="contactForm" novalidate>
                <!-- Personal Information -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Personal Information</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="validationCustomUsername" 
                               placeholder="Enter your name" required>
                        <div class="invalid-feedback">
                            Please enter name
                        </div>
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Contact Details</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="tel" class="form-control" id="validationCustomNumber" 
                               placeholder="Enter number" required>
                        <div class="invalid-feedback">
                            Please enter phone number.
                        </div>
                    </div>
                </div>

                <!-- Address Info -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Address Information</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <textarea class="form-control" id="validationCustomAddress" 
                                  placeholder="Enter your complete address" rows="2" required></textarea>
                        <div class="invalid-feedback">
                            Please enter address.
                        </div>
                    </div>
                </div>
            </form>
                </section>
            </div>
            <div class="col-lg-6">
                <section class="card p-4">
                    <h2 class="fs-4 fw-semibold mb-3">Order Summary</h2>
                    <div id="cartItemsContainer"></div>
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