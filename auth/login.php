<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="@/images/Shopfinity.png">
    <title>Shopfinity - Login</title>
    <style>
        .form-container {
            padding: 3.5rem;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }
        .btn-primary {
            background: linear-gradient(90deg, #007bff, #0056b3);
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
        }
        .btn-social {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }
        .divider span {
            padding: 0 1rem;
            color: #6c757d;
            font-weight: 600;
        }
        .input-group-text {
            background: #f8f9fa;
            border-radius: 8px 0 0 8px;
            border: 1px solid #ced4da;
        }
        .alert {
            border-radius: 8px;
        }
        .text-primary {
            color: #007bff !important;
            font-weight: 600;
        }
        .illustration-img {
            max-width: 100%;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="px-5 py-5">
            <div class="row justify-content-center align-items-center shadow bg-white rounded">
                <div class="col-md-9 col-lg-6 col-xl-7 mb-4 mb-lg-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="illustration-img" alt="Shopfinity illustration">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="form-container">
                        <h2 class="text-center mb-4 fw-bold">Welcome to Shopfinity</h2>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars($error); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="login.php">
                            <input type="hidden" name="csrf_token">
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <a href="forgot-password.php" class="text-primary text-decoration-none">Forgot password?</a>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Sign In</button>
                            </div>
                            <div class="divider">
                                <span>OR</span>
                            </div>
                            <div class="d-flex justify-content-center gap-3 mb-4">
                                <a href="#!" class="btn btn-social btn-outline-primary"><i class="fab fa-google"></i></a>
                                <a href="#!" class="btn btn-social btn-outline-primary"><i class="fab fa-facebook-f"></i></a>
                                <a href="#!" class="btn btn-social btn-outline-primary"><i class="fab fa-twitter"></i></a>
                            </div>
                            <p class="text-center mt-3">
                                Don't have an account? <a href="register.php" class="text-primary fw-bold text-decoration-none">Register</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>