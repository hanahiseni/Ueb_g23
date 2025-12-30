document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contactForm");
  const status = document.getElementById("formStatus");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    if (form.checkValidity()) {
      status.textContent = "Submitted request successfully";
      status.style.color = "#22c55e";
      form.reset();
    } else {
      status.textContent = "Invalid, check your information again";
      status.style.color = "#ef4444";
    }
  });
});


