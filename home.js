//hamburger
const menuToggle = document.getElementById("menu-toggle");
const navLinks = document.getElementById("nav-links");

if (menuToggle && navLinks) {
  menuToggle.addEventListener("click", () => {
    navLinks.classList.toggle("open");
  });
}


//service
const servicesLink = document.getElementById("services-link");
const servicesItem = document.querySelector(".services-item");
if (servicesLink && servicesItem) {
  servicesLink.addEventListener("click", (e) => {
    e.preventDefault();
    servicesItem.classList.toggle("active");
  });
}
