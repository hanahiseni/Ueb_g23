//hamburger menu
const menuToggle=document.getElementById('menu-toggle');
const navLinks=document.getElementById('nav-links');
menuToggle.addEventListener('click', ()=>navLinks.classList.toggle('active'));

//mobile dropdown
const servicesLink=document.getElementById('services-link');
servicesLink.addEventListener('click',(e)=>{
    if(window.innerWidth<=768){
        e.preventDefault();
        const parentLi=servicesLink.parentElement;
        parentLi.classList.toggle('dropdown-active');
    }
})
document.addEventListener('click', (e)=>{
    const parentLi=servicesLink.parentElement;
    if(parentLi.classList.contains('dropdown-active')&&!parentLi.contains(e.target)){
        parentLi.classList.remove('dropdown-active');
    }
})

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

//light mode
const modeToggle=document.getElementById('mode-toggle');
modeToggle.addEventListener('click',()=>{
    document.body.classList.toggle('light-mode');
    const icon=modeToggle.querySelector('i');
    if(document.body.classList.contains('light-mode')){
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
    else{
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    }
});