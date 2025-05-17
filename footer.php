<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity-Footer</title>
    <link rel="icon" type="image/png" href="images/Shopfinity.png">
    <link rel="stylesheet" href="./styles/footer.css">
</head>
<body>
    <footer class="bg-dark text-white">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <img src="./images/Shopfinity.png" alt="Shopfinity" class="footer-logo">
                    <p>Shopfinity is your premier online shopping destination in Cambodia. We offer high-quality products with fast delivery and excellent customer service.</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://x.com/tengchanto41463"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                        <a href="https://www.linkedin.com/in/teng-chantola-09b292297/"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="footer-heading">Shop</h5>
                    <div class="footer-links">
                        <a href="#">All Products</a>
                        <a href="#">Featured</a>
                        <a href="#">New Arrivals</a>
                        <a href="#">Special Offers</a>
                        <a href="#">Discounts</a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="footer-heading">Customer Service</h5>
                    <div class="footer-links">
                        <a href="#">Contact Us</a>
                        <a href="#">FAQs</a>
                        <a href="#">Shipping Policy</a>
                        <a href="#">Returns & Refunds</a>
                        <a href="#">Track Order</a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="footer-heading">About</h5>
                    <div class="footer-links">
                        <a href="#">Our Story</a>
                        <a href="#">Careers</a>
                        <a href="#">Terms & Conditions</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Blog</a>
                    </div>
                </div>
                
                <div class="col-lg-2 mb-4">
                    <h5 class="footer-heading">Contact</h5>
                    <div class="footer-links">
                        <p><i class="fas fa-map-marker-alt me-2"></i> Phnom Penh, Cambodia</p>
                        <p><i class="fas fa-phone me-2"></i> +855 12 345 678</p>
                        <p><i class="fas fa-envelope me-2"></i> info@shopfinity.com</p>
                    </div>
                </div>
            </div>
            
            <div class="copyright text-center">
                <p class="mb-0">&copy; <?= date('Y') ?> Shopfinity. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>