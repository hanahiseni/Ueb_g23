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