document.addEventListener("DOMContentLoaded", function () {
  const categoryLinks = document.querySelectorAll(".category-row .nav-item");
  const stickyContainers = document.querySelectorAll(".sticky-container");
  const btn_logout = document.querySelectorAll(".btn_logout");
  btn_logout.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      window.location.href = "login.php";
    });
  });
  function setActiveCategory(targetId) {
    categoryLinks.forEach((link) => {
      link.classList.remove("nav-custom");
      if (link.querySelector("a").getAttribute("href") === targetId) {
        link.classList.add("nav-custom");
      }
    });
  }

  categoryLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.querySelector("a").getAttribute("href");
      const targetSection = document.querySelector(targetId);
      if (targetSection) {
        targetSection.scrollIntoView({ behavior: "smooth" });
        setActiveCategory(targetId);
      }
    });
  });

  const observerOptions = {
    root: null,
    rootMargin: "-130px 0px -50% 0px",
    threshold: [0, 0.1, 0.5, 1],
  };

  let lastActiveSection = null;

  const observer = new IntersectionObserver((entries) => {
    let closestSection = null;
    let minDistance = Infinity;

    entries.forEach((entry) => {
      const rect = entry.target.getBoundingClientRect();
      const distance = Math.abs(rect.top);
      if (entry.isIntersecting || rect.top >= -170) {
        if (distance < minDistance) {
          minDistance = distance;
          closestSection = entry.target;
        }
      }
    });

    if (closestSection) {
      const targetId = `#${closestSection.id}`;
      if (targetId !== lastActiveSection) {
        setActiveCategory(targetId);
        lastActiveSection = targetId;
      }
    }
  }, observerOptions);

  stickyContainers.forEach((container) => {
    observer.observe(container);
  });

  const firstSection = document.querySelector(".sticky-container");
  if (firstSection) {
    const targetId = `#${firstSection.id}`;
    setActiveCategory(targetId);
    lastActiveSection = targetId;
  }

  function updateCartBadge() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const uniqueItemIds = [...new Set(cart.map((item) => item.id))];
    const totalItems = uniqueItemIds.length;
    const cartBadge = document.getElementById("cartBadge");
    cartBadge.textContent = totalItems;
    cartBadge.style.display = "flex";
  }

  updateCartBadge();

  const cartIcon = document.getElementById("cartIcon");
  if (cartIcon) {
    cartIcon.addEventListener("click", function (e) {
      const cart = JSON.parse(localStorage.getItem("cart")) || [];
      if (cart.length === 0) {
        e.preventDefault();
      }
    });
  }
});
