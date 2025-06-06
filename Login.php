<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopfinity - Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
    />
    <link rel="icon" href="./images/Shopfinity.png" />
    <link rel="stylesheet" href="./styles/login.css">

  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form">
            <img src="../images/LogoAc.png" alt="" />
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" placeholder="Password" />
            </div>
            <p class="showError" hidden>Invalid Username Or Password</p>
            <input type="submit" value="Login" id="login" class="btn solid" />

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
          <form action="" class="sign-up-form">
            <img src="./images/LogoAc.png" alt="" class="logo" />
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <input type="submit" value="Sign Up" class="btn solid" />

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
      const loginBtn = document.getElementById("login");
      const usernameField = document.getElementById("username");
      const passwordField = document.getElementById("password");
      const errorMsg = document.querySelector(".showError");

      loginBtn.addEventListener("click", (event) => {
        event.preventDefault();
        const validUsername = "0005422";
        const validPassword = "Laasexy123";
        const enteredUsername = usernameField.value.trim();
        const enteredPassword = passwordField.value.trim();

        if (
          enteredUsername === validUsername &&
          enteredPassword === validPassword
        ) {
          errorMsg.hidden = true;
          Swal.fire({
            icon: "success",
            title: "Login Successful!",
            text: "You will go to index page of Ecommerce Project...",
            showConfirmButton: false,
            timer: 1500,
          }).then(() => {
            window.location.href = "index.php";
          });
        } else {
          errorMsg.hidden = false;
          errorMsg.textContent = "Invalid Username Or Password";
        }
      });

      sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
      });

      sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
