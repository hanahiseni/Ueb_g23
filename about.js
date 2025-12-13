// MODE TOGGLE
const modeToggle = document.getElementById("mode-toggle");
const body = document.body;

// load saved mode
if (localStorage.getItem("theme") === "light-mode") {
    body.classList.add("light-mode");
    modeToggle.innerHTML = '<i class="fas fa-moon"></i>';
}

modeToggle.addEventListener("click", () => {
    body.classList.toggle("light-mode");

    if (body.classList.contains("light-mode")) {
        localStorage.setItem("theme", "light");
        modeToggle.innerHTML = '<i class="fas fa-moon"></i>';
    } else {
        localStorage.setItem("theme", "dark");
        modeToggle.innerHTML = '<i class="fas fa-sun"></i>';
    }
});

// MOBILE MENU
const menuToggle = document.getElementById("menu-toggle");
const navLinks = document.getElementById("nav-links");

menuToggle.addEventListener("click", () => {
    navLinks.classList.toggle("open");
});

// SERVICES DROPDOWN
const servicesLink = document.getElementById("services-link");
const servicesItem = document.querySelector(".services-item");

servicesLink.addEventListener("click", (e) => {
    e.preventDefault(); // vetëm dropdown
    servicesItem.classList.toggle("active");
});
//section fade
const sections=document.querySelectorAll('.section');
const observer=new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
        if(entry.isIntersecting){
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
},{threshold:0.1});
sections.forEach(sec=>observer.observe(sec));

//back to top
const backbtn=document.getElementById('backToTop');
window.addEventListener('scroll',()=>{backbtn.style.display=window.scrollY>100?'flex':'none'});
backbtn.addEventListener('click', ()=>{window.scrollTo({top:0, behavior:'smooth'});
});

//smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor=>{
    anchor.addEventListener('click',function(e){
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({behavior:'smooth'});
    });
});