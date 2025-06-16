
// carousel auto play 
const carouselAutoPlay = () => {
    const slides = document.querySelector("[data-slides]");
   
    const activeSlide = slides.querySelector("[data-active]")
    let newIndex = [...slides.children].indexOf(activeSlide) + 1;
    
    if(newIndex > slides.children.length-1) newIndex = 0;

    slides.children[newIndex].dataset.active = true;
    delete activeSlide.dataset.active;
}

const autoPlayInterval = setInterval(carouselAutoPlay, 3000);




// navbar elements
const navbar = document.getElementById("navbar");
const orderButton = document.getElementById("order-now-btn");
const searchButton = document.getElementById("search-btn");
//modal elements
let viewModal = document.getElementById("view-modal");
const viewButton = document.querySelectorAll(".view-btn")
const blurBody = document.getElementById("blur-body");
const ggclose = document.getElementById("gg-close");
//input quantity
let inputQty = document.getElementById("input-quantity");
const incrementBtn = document.getElementById("increment");
const decrementBtn = document.getElementById("decrement");
//cart items count el
//body selector
var body = document.getElementsByTagName("BODY")[0];
const addtocartBtn = document.getElementById("addtocart-btn");
const addtocartLoginBtn = document.getElementById("addtocart-btn-login");
let view_item;
//modal elements
let foodImg = document.querySelectorAll("#food-image");
let price = document.getElementById("price");
let title = document.getElementById("name");
let foodDescription = document.getElementById("food-description");
let regSubmitBtn = document.getElementById("addtocart-button");

const regForm = document.getElementById("register-form");

const menu = document.getElementById('menu');
const menuBtn = document.getElementById('menu-btn');
const navmenu = document.getElementById('nav-items');

menuBtn.addEventListener('click', () => {
    navbar.classList.toggle('active')
    menuBtn.classList.toggle('active')
})
    

//javascript stop reading because regform not exist, it's not exist because the page is not on register page, that's why i put ternary to prevent js stop and continue reading
regForm ?
regForm.addEventListener('submit', ()=>{
    //I add delay to send form before the submit will disable 
    setTimeout(()=>{
        regSubmitBtn.value = "Sending...";
        regSubmitBtn.disabled = true;
    },0)
})
:
'';


//change color of navbar when scroll
window.addEventListener('scroll', () => {
    if(scrollY >= 1){
        navbar.classList.add('scrolled');
        menuBtn.classList.add('scrolled');
    }else{
        menuBtn.classList.remove('scrolled');
        navbar.classList.remove('scrolled');
    }
})



// show modal and disable scroll Y 
viewButton.forEach(button => {
    button.addEventListener('click', () => {   
        //fetching to database depends on id was cliked
        fetch("includes/view-product.php?id="+button.id)
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            //set current view item
            view_item = data;
            //show the modal
            viewModal.classList.remove("hidden");
            blurBody.classList.remove("hidden")
            body.style.overflowY = "hidden";
            //display to modal
            price.innerHTML = '₱'+data.price;
            title.innerHTML = data.food_name;
            inputQty.value = 1;
            foodDescription.innerHTML = data.description;
            foodImg.forEach(el =>  {
                el.src = `./assets/images/${data.food_name}.webp`;
            })

            console.log(data);
        })
        .catch(error => console.log(error))
    })
})
// hide the modal and enable scroll Y 
const hideModal = () => {
    viewModal.classList.add("hidden");
    blurBody.classList.add("hidden");
    body.style.overflowY = "auto";
    
}
//for closing of modal
blurBody.addEventListener('click', hideModal);
ggclose.addEventListener('click', hideModal);

// - button listener
decrementBtn.addEventListener('click', () => {
    if(inputQty.value < 2){
        //WALA
    }else{
        inputQty.value = Number(inputQty.value) - 1;
    }
})
// + button listener
incrementBtn.addEventListener('click', () => {
    inputQty.value = Number(inputQty.value) + 1;
})
//procede to login form
const goToLoginForm = () => {
    console.log("CLICKED");
    hideModal();
    window.location.href = "index.php?page=login";
}


//add to cart function
const addtocart = () => {
    const URL = './includes/add_to_cart.php';
    
    var formData = new FormData();
    formData.append('product-id', view_item['id']);
    formData.append('qty', inputQty.value);
    
    fetch(URL,{
        method: 'POST',
        body: formData
    })
    .then((res) => res.json())
    .then((data) =>{
        if(window.location.href == "http://localhost/food-ordering-system/index.php?login=success"){
            window.location.href = "index.php"
        }else{
            window.location.reload();
        }
        
    }).catch(err=> console.log(err))
}

//basta pag di naka login, login modal popup else add to cart function na

addtocartBtn ?
addtocartBtn.addEventListener('click', addtocart) : //add to cart onlick listener
addtocartLoginBtn.addEventListener('click', goToLoginForm);//add to cart button onclick listener when no session
 

// //carousel
// const carouselButton = document.querySelectorAll("[data-carousel-button]")

// carouselButton.forEach(button => {
//     button.addEventListener('click', () => {


//         const buttonValue = button.dataset.carouselButton == "next" ? 1 : -1;
//         const slides = button
//             .closest("[data-carousel]")
//             .querySelector("[data-slides]");

//         const activeSlide = slides.querySelector("[data-active]")
//         let newIndex = [...slides.children].indexOf(activeSlide) + buttonValue;
        
//         if(newIndex < 0) newIndex = slides.children.length - 1;
//         if(newIndex > slides.children.length-1) newIndex = 0;

//         slides.children[newIndex].dataset.active = true;
//         delete activeSlide.dataset.active;

//     })
// })

