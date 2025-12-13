//hamburger
const modeToggle=document.getElementById("mode-toggle");
const body=document.body;
//light mode
if(localStorage.getItem("theme")==="light"){
    body.classList.add("light");
    modeToggle.innerHTML='<i class="fas fa-moon"></i>';
}
modeToggle.addEventListener("click", ()=>{
    body.classList.toggle("light");
    if(body.classList.contains("light")){
        localStorage.setItem("theme", "light");
        modeToggle.innerHTML='<i class="fas fa-moon"></i>';
    }else{
        localStorage.setItem("theme","dark");
        modeToggle.innerHTML='<i class="fas fa-sun"></i>';
    }
});
//mobile menu
const menuToggle=document.getElementById("menu-toggle");
const navLinks=document.getElementById("nav-links");
menuToggle.addEventListener("click",()=>{
    navLinks.classList.toggle("open");
});
//services
const servicesLink=document.getElementById("services-link");
const servicesItem=document.querySelector(".services-item");
servicesLink.addEventListener("click",(e)=>{
    e.preventDefault();
    servicesItem.classList.toggle("active");
});
//language toggle
const langToggle=document.getElementById("lang-toggle");
const heroTitle=document.querySelector(".hero h2");
const heroText=document.querySelector(".hero p");
const exploreBtn=document.querySelector(".hero .explore-btn");
let lang="EN";
langToggle.addEventListener("click",()=>{
    if(lang==="EN"){
        lang="AL";
        langToggle.textContent="AL";
        heroTitle.textContent="Performancë Elektrike e Ripërcaktuar";
        heroText.textContent=`Inxhinieri precize.
        Dizajn minimalist.
        Performancë maksimale.`;
        exploreBtn.textContent="SHIKO MODELET";
    }else{
        lang="EN";
        langToggle.textContent="EN";
        heroTitle.textContent="Electric Performance Redefined";
        heroText.textContent=`Precision engineering.
        Minimal design.
        Maximum performance.`;
        exploreBtn.textContent="EXPLORE MODELS";
    }
});