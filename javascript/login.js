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

  if (enteredUsername === validUsername && enteredPassword === validPassword) {
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
