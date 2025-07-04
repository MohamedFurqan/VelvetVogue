// JavaScript to handle the dropdown functionality
document.addEventListener("DOMContentLoaded", function () {
  const dropdownButton = document.querySelector(".nav-tabs a");
  const dropdownContent = document.querySelector(".dropdown-content");

  dropdownButton.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default link behavior
    dropdownContent.style.display =
      dropdownContent.style.display === "block" ? "none" : "block";
  });

  // Close the dropdown if the user clicks outside of it
  window.addEventListener("click", function (event) {
    if (!event.target.matches(".nav-tabs a")) {
      dropdownContent.style.display = "none";
    }
  });
});
