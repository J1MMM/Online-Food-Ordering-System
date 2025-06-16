const navbar = document.getElementById("navbar");
const burgir = document.getElementById("bugir-btn");
const menu = document.getElementById("nav-menu");
//change color of navbar when scroll
window.addEventListener('scroll', () => {
    if(scrollY >= 10){
        navbar.classList.add('shadow');
    }else{
        navbar.classList.remove('shadow');
    }
})

burgir.addEventListener('click', () => {
    menu.classList.toggle('hidden');
})