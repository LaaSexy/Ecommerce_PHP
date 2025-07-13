document.addEventListener("DOMContentLoaded", () => {
  const contactForm = document.getElementById("contactForm");
  const checkoutBtn = document.getElementById("checkoutBtn");
  const nameInput = document.getElementById("validationCustomUsername");
  const phoneInput = document.getElementById("validationCustomNumber");
  const addressInput = document.getElementById("validationCustomAddress");

  const nameRegex = /^[a-zA-Z\s]{2,}$/;
  const phoneRegex =
    /^(?:\+855|0)(?:10|11|12|13|14|15|16|17|69|70|76|77|78|79|81|86|87|88|89|92|93|95|96|97|98|99)\d{6,7}$/;
  const addressMinLength = 2;

  function getCart() {
    return JSON.parse(localStorage.getItem("cart")) || [];
  }

  function renderCartItems() {
    const cart = getCart();
    const container = document.getElementById("cartItemsContainer");
    let total = 0;

    container.innerHTML = "";

    if (cart.length === 0) {
      container.innerHTML =
        '<h5 class="text-center font-bold">Your cart is empty</h5> <img src="./images/Empty.png" class="empty-image"/>';
      document.getElementById("cartTotal").textContent = "$0.00";
      checkoutBtn.textContent = "Checkout - $0.00";
      checkoutBtn.disabled = true;
      return;
    }

    cart.forEach((item, index) => {
      const itemTotal = item.price * item.quantity;
      total += itemTotal;

      const itemHTML = `
        <div class="item-row mb-3" data-index="${index}">
          <div class="d-flex justify-content-between align-items-center border rounded">
            <div class="d-flex align-items-center mx-2 my-2">
              <img src="${item.image}" alt="${
        item.name
      }" class="me-3" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
              <div>
                <div class="fw-medium">${item.name} ${
        item.size ? `(${item.size})` : ""
      } ${item.options ? `(${item.options})` : ""}</div>
                <div class="item-price">$${itemTotal.toFixed(2)}</div>
              </div>
            </div>
            <div class="d-flex align-items-center mx-2 my-2">
              <div class="quantity-control d-flex align-items-center me-2">
                <button class="quantity-btn minus">-</button>
                <input type="text" class="quantity-input text-lg" value="${
                  item.quantity
                }" readonly>
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
      container.insertAdjacentHTML("beforeend", itemHTML);
    });

    document.getElementById("cartTotal").textContent = `$${total.toFixed(2)}`;
    checkoutBtn.textContent = `Checkout - $${total.toFixed(2)}`;
    validateForm();
  }

  function updateCartItem(index, newQuantity) {
    const cart = getCart();
    if (index >= 0 && index < cart.length) {
      cart[index].quantity = newQuantity;
      localStorage.setItem("cart", JSON.stringify(cart));
      renderCartItems();
    }
  }

  function removeCartItem(index) {
    const cart = getCart();
    if (index >= 0 && index < cart.length) {
      cart.splice(index, 1);
      localStorage.setItem("cart", JSON.stringify(cart));
      renderCartItems();
    }
  }

  function validateForm() {
    const isNameValid = nameRegex.test(nameInput.value.trim());
    const isPhoneValid = phoneRegex.test(phoneInput.value.trim());
    const isAddressValid = addressInput.value.trim().length >= addressMinLength;
    const isCartNotEmpty = getCart().length > 0;

    nameInput.classList.toggle("is-valid", isNameValid);
    nameInput.classList.toggle("is-invalid", !isNameValid);
    phoneInput.classList.toggle("is-valid", isPhoneValid);
    phoneInput.classList.toggle("is-invalid", !isPhoneValid);
    addressInput.classList.toggle("is-valid", isAddressValid);
    addressInput.classList.toggle("is-invalid", !isAddressValid);

    checkoutBtn.disabled = !(
      isNameValid &&
      isPhoneValid &&
      isAddressValid &&
      isCartNotEmpty
    );
    return isNameValid && isPhoneValid && isAddressValid && isCartNotEmpty;
  }

  [nameInput, phoneInput, addressInput].forEach((input) => {
    input.addEventListener("input", validateForm);
  });

  document
    .getElementById("cartItemsContainer")
    .addEventListener("click", (e) => {
      const itemRow = e.target.closest(".item-row");
      if (!itemRow) return;
      const index = parseInt(itemRow.dataset.index);

      if (e.target.classList.contains("quantity-btn")) {
        const input = itemRow.querySelector(".quantity-input");
        let quantity = parseInt(input.value);

        if (e.target.classList.contains("plus")) {
          quantity++;
        } else if (e.target.classList.contains("minus")) {
          quantity = Math.max(1, quantity - 1);
        }

        updateCartItem(index, quantity);
      } else if (e.target.closest(".delete-btn")) {
        Swal.fire({
          title: "Are you sure?",
          text: "You want to remove this item from the cart?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        }).then(() => {
          removeCartItem(index);
        });
      }
    });

  checkoutBtn.addEventListener("click", (e) => {
    e.preventDefault();
    contactForm.classList.add("was-validated");

    if (validateForm()) {
      const cart = getCart();
      const total = cart.reduce(
        (sum, item) => sum + item.price * item.quantity,
        0
      );
      Swal.fire({
        title: "Success!",
        text: "Proceeding to payment...",
        icon: "success",
        timer: 1500,
        showConfirmButton: false,
      }).then(() => {
        window.location.href = `payment.php?total=${total.toFixed(2)}`;
      });
    } else {
      Swal.fire({
        title: "Incomplete Form",
        text: "Please fill out all required fields correctly.",
        icon: "error",
        confirmButtonText: "OK",
      });
    }
  });

  renderCartItems();
});
