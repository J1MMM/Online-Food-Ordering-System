const navbar = document.getElementById("navbar");
//change color of navbar when scroll
window.addEventListener('scroll', () => {
    if(scrollY >= 10){
        navbar.classList.add('shadow');
    }else{
        navbar.classList.remove('shadow');
    }
})