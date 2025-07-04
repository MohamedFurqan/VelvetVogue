document.addEventListener("DOMContentLoaded", function () {
  // Quantity controls
  document.querySelectorAll(".quantity-btn").forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      const input = this.parentElement.querySelector(".quantity-input");
      let value = parseInt(input.value);

      if (this.classList.contains("minus-btn")) {
        value = value > 1 ? value - 1 : 1;
      } else if (this.classList.contains("plus-btn")) {
        value = value + 1;
      }

      input.value = value;
      updateCartItem(this.closest(".cart-item"), false);
    });
  });

  // Manual quantity input - only update when focus is lost or Enter is pressed
  document.querySelectorAll(".quantity-input").forEach((input) => {
    input.addEventListener("change", function () {
      if (this.value < 1) this.value = 1;
      updateCartItem(this.closest(".cart-item"), false);
    });

    input.addEventListener("keypress", function (e) {
      if (e.key === "Enter") {
        if (this.value < 1) this.value = 1;
        updateCartItem(this.closest(".cart-item"), false);
      }
    });
  });

  // Remove item
  document.querySelectorAll(".remove-btn").forEach((button) => {
    button.addEventListener("click", function () {
      if (
        confirm("Are you sure you want to remove this item from your cart?")
      ) {
        updateCartItem(this.closest(".cart-item"), true);
      }
    });
  });

  // Update cart item (quantity or remove)
  function updateCartItem(item, isRemove) {
    const cartId = item.dataset.cartId;
    const productId = item.dataset.productId;
    const quantity = isRemove
      ? 0
      : parseInt(item.querySelector(".quantity-input").value);

    // Show loading state
    const buttons = item.querySelectorAll("button");
    buttons.forEach((btn) => {
      btn.classList.add("loading");
      btn.disabled = true;
    });

    // Send AJAX request to update cart
    fetch("../PHP/update_cart.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `cart_id=${cartId}&product_id=${productId}&quantity=${quantity}`,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          if (isRemove) {
            item.remove();
          } else {
            const price = parseFloat(
              item
                .querySelector(".product-price")
                .textContent.replace(/[^0-9.]/g, "")
            );
            const total = price * quantity;
            item.querySelector(".product-total").textContent =
              formatCurrency(total);
          }
          updateCartTotals();
        } else {
          alert("Error: " + (data.message || "Failed to update cart"));
          if (!isRemove) {
            item.querySelector(".quantity-input").value =
              data.quantity || quantity;
          }
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("An error occurred while updating your cart");
      })
      .finally(() => {
        buttons.forEach((btn) => {
          btn.classList.remove("loading");
          btn.disabled = false;
        });
      });
  }

  // Update cart summary totals
  function updateCartTotals() {
    let subtotal = 0;
    document.querySelectorAll(".cart-item").forEach((item) => {
      subtotal += parseFloat(
        item.querySelector(".product-total").textContent.replace(/[^0-9.]/g, "")
      );
    });

    const shipping = 5.99;
    const total = subtotal + shipping;

    document.querySelector(".subtotal").textContent = formatCurrency(subtotal);
    document.querySelector(".total-price").textContent = formatCurrency(total);

    // Update cart count in header if needed
    const cartCount = document.querySelectorAll(".cart-item").length;
    const cartCountElement = document.querySelector(".cart-count");
    if (cartCountElement) {
      cartCountElement.textContent = cartCount;
    }

    // Show empty cart message if no items
    if (cartCount === 0) {
      document.querySelector(".cart-items").innerHTML = `
                <div class="empty-cart">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Your cart is empty</p>
                    <a href="../HTML/Shop.php" class="continue-shopping">Continue Shopping</a>
                </div>
            `;
      document.querySelector(".cart-header").style.display = "none";
      document.querySelector(".cart-summary").style.display = "none";
    }
  }

  // Format currency
  function formatCurrency(amount) {
    return "$" + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
  }
});
