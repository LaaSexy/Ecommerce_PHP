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
            $error = "ខុសលេខសម្ងាត់"; 
        } 
    } else { 
        $error = "មិនអាចស្វែងរកអ្នកប្រើប្រាស់"; 
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
            $error = "អ្នកប្រើប្រាស់នេះមានរួចហើយ";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("ss", $username, $hashed_password);
            
            if ($stmt->execute()) {
                $success = "ការចុះឈ្មោះទទួលបានភាពជោគជ័យ! អ្នកអាចចូលឥឡូវនេះបាន.";
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
            <img src="./images/LogoAc.png" alt="" />
            <?php if(isset($error)): ?>
              <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if(isset($success)): ?>
              <div class="success-message"><?php echo $success; ?></div>
            <?php endif; ?>
            <div class="input-field khmer-font">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="ឈ្មោះរបស់អ្នក" required />
            </div>
            <div class="input-field khmer-font">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="លេខសម្ងាត់របស់អ្នក" required />
            </div>
            <input type="submit" name="login" value="ចូល" class="btn solid khmer-font" />

            <p class="social-text​ khmer-font">តើអ្នកបានភ្លេចលេខកូដមែនទេ?</p>
            <p class="khmer-font">សូមមើលនៅខាងលើឆ្វេង ហើយចុចដើម្បីចុះឈ្មោះ !</p>
          </form>
          <form action="login.php" method="POST" class="sign-up-form">
            <img src="./images/LogoAc.png" alt="" class="logo" />
            <?php if(isset($error)): ?>
              <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if(isset($success)): ?>
              <div class="success-message"><?php echo $success; ?></div>
            <?php endif; ?>
            <div class="input-field khmer-font">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="ឈ្មោះរបស់អ្នក" required />
            </div>
            <div class="input-field khmer-font">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="លេខសម្ងាត់របស់អ្នក" required />
            </div>
            <input type="submit" name="register" value="ចុះឈ្មោះ" class="btn solid khmer-font" />

            <p class="social-text khmer-font">រឺក៏ចុះឈ្មោះជាមួយនិងប្រព័ន្ទបណ្តាញខាងក្រោម</p>
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
            <h3 class="khmer-font">តើអ្នកជាសមាជិកថ្មីមែនទេ?</h3>
            <p class="khmer-font">
              ស្វាគមន៍! ស្វែងយល់ពីពិភពនៃលទ្ធភាព និងចូលរួមជាមួយខ្លួនអ្នកដ៏រស់រវើករបស់យើង
              សហគម.មិនថាអ្នកនៅទីនេះ ដើម្បីស្វែងរក,រៀន,ឬភ្ជាប់,
              យើងរំភើបណាស់ដែលមានអ្នកនៅទីនេះ។
            </p>
            <button class="btn transparent khmer-font" id="sign-up-btn">ចុះឈ្មោះ</button>
          </div>
          <img src="./images/Login.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3 class="khmer-font">ម្នាក់ក្នុងចំណោមពួកយើង?</h3>
            <p class="khmer-font">
              ជាផ្នែកមួយនៃសហគមន៍របស់យើងរួចទៅហើយ?​ សូមស្វាគមន៍មកវិញ! សូមចុចបន្តរដើម្បី
              ធ្វើដំណើរកំសាន្តរបស់អ្នកនិងចូលទៅកាន់បទពិសោធន៍ផ្ទាល់ខ្លួនរបស់អ្នក។
            </p>
            <button class="btn transparent khmer-font" id="sign-in-btn">ចូល</button>
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