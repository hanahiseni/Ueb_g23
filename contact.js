document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contactForm");
  const status = document.getElementById("formStatus");

  form.addEventListener("submit", function () {
    status.textContent = "Submitting your request...";
    status.style.color = "#22c55e";
  });
});