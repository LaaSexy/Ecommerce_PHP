<?php
session_start();

$shopData = [
    'currency' => isset($_SESSION['shop_currency']) ? $_SESSION['shop_currency'] : 'USD'
];

$_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [
    ['id' => 1, 'total' => 10.50],
    ['id' => 2, 'total' => 20.75]
];

function formatCurrency($amount, $currency = 'USD') {
    $symbol = $currency === 'USD' ? '$' : ($currency === 'KHR' ? '៛' : $currency);
    return $symbol . number_format($amount, 2, '.', ',');
}   

function calculateTotal($cart) {
    $total = 0;
    foreach ($cart as $item) {
        if (isset($item['total']) && $item['total'] > 0) {
            $total += $item['total'];
        }
    }
    return number_format($total, 2, '.', '');
}

$slug = isset($_GET['slug']) ? htmlspecialchars($_GET['slug']) : '';

$total = calculateTotal($_SESSION['cart']);
$currency = $shopData['currency'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
    <style>
        body {
            background-color: #E8E8E8;
        }
        .dark-mode {
            background-color: #000;
            color: #fff;
        }
        .btn-violet {
            background-color: #8b5cf6;
            color: white;
        }
        .btn-violet:hover {
            background-color: #7c3aed;
            color: white;
        }
        .qr-container {
            position: relative;
            text-align: center;
        }
        .qr-info {
            position: absolute;
            bottom: 380px;
            padding-left: 30px;
            text-align: right;
            font-weight: 600px;
        }
        .qr-code {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
        }
        .back-btn{
            padding: 0px 10px;
            border: none;
            display: flex;
            justify-content: center;
            align-self: center;
            flex-direction: row;
            color: #fff;
            background-color: #FFC715;
            border-radius: 10px;
        }
        @media (max-width: 992px) {
            .qr-info {
                position: static;
                text-align: center;
                margin-bottom: 20px;
            }
            .qr-code {
                position: static;
                transform: none;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <header class="p-3 bg-transparent">
        <button href="<?php echo $slug ? '/' . htmlspecialchars($slug) : '/'; ?>" class="back-btn">
            <img src="./images/Back Arrow.png" alt="Back" width="30" height="30" class="mr-1 mt-1">
            <h5 class="mt-2">Back</h5>
        </button>
    </header>
    <div class="container-fluid flex-grow-1 d-flex flex-column justify-content-center align-items-center">
        <div class="qr-container">
            <img src="./images/KHQR-Display-Aba.png" alt="KHQR Display" class="img-fluid" style="max-width: 100%;">
            <div class="qr-info">
                <p class="mb-1">Teng Chantola</p>
                <p class="mr-5"><span><?php echo formatCurrency($total, $currency); ?></span></p>
            </div>
            <img src="./images/QR Code.png" alt="QR Code" class="qr-code">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>