document.addEventListener("DOMContentLoaded", function () {
  // Mobile menu toggle
  const hamburger = document.getElementById("hamburger");
  const navTabs = document.getElementById("navTabs");
  const dropdownBtns = document.querySelectorAll(".dropdown-btn");

  hamburger.addEventListener("click", function () {
    this.classList.toggle("active");
    navTabs.classList.toggle("active");

    // Toggle hamburger animation
    const bars = this.querySelectorAll(".bar");
    if (this.classList.contains("active")) {
      bars[0].style.transform = "rotate(45deg) translate(5px, 5px)";
      bars[1].style.opacity = "0";
      bars[2].style.transform = "rotate(-45deg) translate(5px, -5px)";
    } else {
      bars[0].style.transform = "none";
      bars[1].style.opacity = "1";
      bars[2].style.transform = "none";
    }
  });

  // Dropdown functionality for mobile
  dropdownBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      if (window.innerWidth <= 768) {
        e.preventDefault();
        const dropdown = this.parentElement;
        dropdown.classList.toggle("active");
      }
    });
  });

  // Close mobile menu when clicking outside
  document.addEventListener("click", function (e) {
    if (
      window.innerWidth <= 768 &&
      !hamburger.contains(e.target) &&
      !navTabs.contains(e.target)
    ) {
      hamburger.classList.remove("active");
      navTabs.classList.remove("active");
      const bars = hamburger.querySelectorAll(".bar");
      bars[0].style.transform = "none";
      bars[1].style.opacity = "1";
      bars[2].style.transform = "none";

      // Close all dropdowns
      document.querySelectorAll(".dropdown").forEach((dropdown) => {
        dropdown.classList.remove("active");
      });
    }
  });

  // Product card hover effect for desktop
  const productCards = document.querySelectorAll(".product-card");
  productCards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
      if (window.innerWidth > 768) {
        this.style.transform = "translateY(-5px)";
        this.style.boxShadow = "0 5px 15px rgba(0, 0, 0, 0.1)";
      }
    });

    card.addEventListener("mouseleave", function () {
      if (window.innerWidth > 768) {
        this.style.transform = "none";
        this.style.boxShadow = "0 2px 8px rgba(0, 0, 0, 0.1)";
      }
    });
  });
});
