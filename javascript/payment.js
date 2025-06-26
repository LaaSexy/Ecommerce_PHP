const btn_back = document.querySelectorAll(".back-btn");
btn_back.forEach((button) => {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    window.location.href = "index.php";
  });
});
