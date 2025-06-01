<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
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
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" placeholder="Enter your phone number" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Enter your address" required>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function getCart() {
                return JSON.parse(localStorage.getItem('cart')) || [];
            }

            function renderCartItems() {
                const cart = getCart();
                const container = document.getElementById('cartItemsContainer');
                let total = 0;
                
                container.innerHTML = '';
                
                if (cart.length === 0) {
                    container.innerHTML = '<h5 class="text-center font-bold">Your cart is empty</h5> <img src="./images/Empty.png" class="empty-image"/>';
                    document.getElementById('cartTotal').textContent = '$0.00';
                    document.getElementById('checkoutBtn').textContent = 'Checkout - $0.00';
                    return;
                }

                cart.forEach((item, index) => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    
                    const itemHTML = `
                        <div class="item-row mb-3" data-index="${index}">
                            <div class="d-flex justify-content-between align-items-center border rounded">
                                <div class="d-flex align-items-center mx-2 my-2">
                                    <img src="${item.image}" alt="${item.name}" class="me-3" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                    <div>
                                        <div class="fw-medium">${item.name} (${item.size})</div>
                                        <div class="item-price">$${itemTotal.toFixed(2)}</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mx-2 my-2">
                                    <div class="quantity-control d-flex align-items-center me-2">
                                        <button class="quantity-btn minus">-</button>
                                        <input type="text" class="quantity-input text-lg" value="${item.quantity}" readonly>
                                        <button class="quantity-btn plus">+</button>
                                    </div>
                                    <button class="delete-btn" title="Remove item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M6 6v14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6M10 11v6M14 11v6"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML('beforeend', itemHTML);
                });

                document.getElementById('cartTotal').textContent = `$${total.toFixed(2)}`;
                document.getElementById('checkoutBtn').textContent = `Checkout - $${total.toFixed(2)}`;
            }

            function updateCartItem(index, newQuantity) {
                const cart = getCart();
                if (index >= 0 && index < cart.length) {
                    cart[index].quantity = newQuantity;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    renderCartItems();
                }
            }

            function removeCartItem(index) {
                const cart = getCart();
                if (index >= 0 && index < cart.length) {
                    cart.splice(index, 1);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    renderCartItems();
                }
            }

            renderCartItems();

            document.getElementById('cartItemsContainer').addEventListener('click', (e) => {
                const itemRow = e.target.closest('.item-row');
                if (!itemRow) return;
                const index = parseInt(itemRow.dataset.index);

                if (e.target.classList.contains('quantity-btn')) {
                    const input = itemRow.querySelector('.quantity-input');
                    let quantity = parseInt(input.value);

                    if (e.target.classList.contains('plus')) {
                        quantity++;
                    } else if (e.target.classList.contains('minus')) {
                        quantity = Math.max(1, quantity - 1);
                    }

                    updateCartItem(index, quantity);
                } else if (e.target.closest('.delete-btn')) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You want to remove this item from the cart?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                            title: "Deleted!",
                            text: "Your item had been deleted.",
                            icon: "success"
                            });
                        removeCartItem(index);
                        }
                    });
                }
            });

            document.getElementById('checkoutBtn').addEventListener('click', () => {
                const form = document.getElementById('contactForm');
                const inputs = form.querySelectorAll('input[required]');

            });
        });
    </script>
</body>
</html>