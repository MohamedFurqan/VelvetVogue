document.addEventListener("DOMContentLoaded", function () {
  // Toggle payment fields based on selected method
  const paymentMethods = document.querySelectorAll(
    'input[name="payment_method"]'
  );
  const creditCardFields = document.getElementById("credit-card-fields");

  paymentMethods.forEach((method) => {
    method.addEventListener("change", function () {
      creditCardFields.style.display =
        this.value === "credit_card" ? "block" : "none";
    });
  });

  // Form validation
  const form = document.getElementById("checkout-form");
  form.addEventListener("submit", function (e) {
    const cardNumber = document.getElementById("card_number");
    const expiry = document.getElementById("expiry");
    const cvv = document.getElementById("cvv");

    if (
      document.querySelector('input[name="payment_method"]:checked').value ===
      "credit_card"
    ) {
      if (!/^\d{16}$/.test(cardNumber.value.replace(/\s/g, ""))) {
        alert("Please enter a valid 16-digit card number");
        e.preventDefault();
        return;
      }

      if (!/^\d{3,4}$/.test(cvv.value)) {
        alert("Please enter a valid CVV");
        e.preventDefault();
        return;
      }
    }
  });
});
