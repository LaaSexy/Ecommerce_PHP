<?php 
session_start(); 
$host = 'localhost'; 
$dbname = 'ecommerce';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) { 
    $username = $conn->real_escape_string($_POST['username']); 
    $password = $_POST['password']; 
    
    $sql = "SELECT * FROM admins WHERE username='$username'"; 
    $result = $conn->query($sql); 
    
    if ($result->num_rows == 1) { 
        $admin = $result->fetch_assoc(); 
        
        if (password_verify($password, $admin['password'])) { 
            $_SESSION['admin_logged_in'] = true; 
            $_SESSION['admin_username'] = $username; 
            header("Location: index.php"); 
            exit; 
        } else { 
            $error = "Invalid password!"; 
        } 
    } else { 
        $error = "User not found!"; 
    } 
} 

// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    if (empty($username) || empty($password)) {
        $error = "All fields are required.";
    } else {
        // Check if username already exists
        $check_sql = "SELECT id FROM admins WHERE username = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $error = "Username already exists!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("ss", $username, $hashed_password);
            
            if ($stmt->execute()) {
                $success = "Registration successful! You can now login.";
            } else {
                $error = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopfinity - Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="icon" href="./images/Shopfinity.png" />
    <link rel="stylesheet" href="./styles/login.css">
    <style>
      .error-message {
        color: red;
        margin: 10px 0;
        text-align: center;
      }
      .success-message {
        color: green;
        margin: 10px 0;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="login.php" method="POST" class="sign-in-form">
            <img src="../images/LogoAc.png" alt="" />
            <?php if(isset($error)): ?>
              <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if(isset($success)): ?>
              <div class="success-message"><?php echo $success; ?></div>
            <?php endif; ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <input type="submit" name="login" value="Login" class="btn solid" />

            <p class="social-text">Forgot Password?</p>
            <div class="social-media">
              <a
                href=" https://www.facebook.com/profile.php?id=100072511796260&mibextid=LQQJ4d"
                class="social-icon"
              >
                <img src="./images/facebook-icon.png" alt="Facebook" />
              </a>
              <a href="https://www.tiktok.com/@laa.sexy0" class="social-icon">
                <img src="./images/Tiktok.png" alt="Tiktok" />
              </a>
              <a
                href="https://www.youtube.com/@LaaSexyOfficial"
                class="social-icon"
              >
                <img src="./images/Youtube.png" alt="Youtube" />
              </a>
              <a href="https://github.com/LaaSexy" class="social-icon">
                <img src="./images/github.png" alt="Github" />
              </a>
            </div>
          </form>
          <form action="login.php" method="POST" class="sign-up-form">
            <img src="./images/LogoAc.png" alt="" class="logo" />
            <?php if(isset($error)): ?>
              <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if(isset($success)): ?>
              <div class="success-message"><?php echo $success; ?></div>
            <?php endif; ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <input type="submit" name="register" value="Sign Up" class="btn solid" />

            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a
                href=" https://www.facebook.com/profile.php?id=100072511796260&mibextid=LQQJ4d"
                class="social-icon"
              >
                <img src="./images/facebook-icon.png" alt="Facebook" />
              </a>
              <a href="https://www.tiktok.com/@laa.sexy0" class="social-icon">
                <img src="./images/Tiktok.png" alt="Tiktok" />
              </a>
              <a
                href="https://www.youtube.com/@LaaSexyOfficial"
                class="social-icon"
              >
                <img src="./images/Youtube.png" alt="Youtube" />
              </a>
              <a href="https://github.com/LaaSexy" class="social-icon">
                <img src="./images/github.png" alt="Github" />
              </a>
            </div>
          </form>
        </div>
      </div>
      <div class="panel-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New Here?</h3>
            <p>
              Welcome! Discover a world of possibilities and join our vibrant
              community. Whether you're here to explore, learn, or connect,
              we're excited to have you on board.
            </p>
            <button class="btn transparent" id="sign-up-btn">Sign up</button>
          </div>
          <img src="./images/Login.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us?</h3>
            <p>
              Already part of our community? Welcome back! Sign in to continue
              your journey and access your personalized experience.
            </p>
            <button class="btn transparent" id="sign-in-btn">Login</button>
          </div>
          <img src="./images/Signup.svg" class="image" alt="" />
        </div>  
      </div>
    </div>
    <script>
      const sign_in_btn = document.querySelector("#sign-in-btn");
      const sign_up_btn = document.querySelector("#sign-up-btn");
      const container = document.querySelector(".container");

      sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
      });

      sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
      });
    </script>
  </body>
</html>