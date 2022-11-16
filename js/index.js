// navbar elements
const navbar = document.getElementById("navbar");
const orderButton = document.getElementById("order-now-btn");
const searchButton = document.getElementById("search-btn");
//modal elements
const viewButton = document.querySelectorAll(".view-btn")
const viewModal = document.getElementById("view-modal");
const blurBody = document.getElementById("blur-body");
const ggclose = document.getElementById("gg-close");
//input quantity
let inputQty = document.getElementById("input-qty");
const incrementBtn = document.getElementById("increment");
const decrementBtn = document.getElementById("decrement");
//cart items count el
//body selector
var body = document.getElementsByTagName("BODY")[0];
const addtocartBtn = document.getElementById("addtocart-btn");
const addtocartLoginBtn = document.getElementById("addtocart-btn-login");
let view_item;
//modal elements
const price = document.getElementById("price");
const title = document.getElementById("title");
const info = document.getElementById("info");
const regSubmitBtn = document.getElementById("register-btn");
const regForm = document.getElementById("register-form");

const menu = document.getElementById('menu');
const menuBtn = document.getElementById('menu-btn');
const navmenu = document.getElementById('nav-items');

menuBtn.addEventListener('click', () => {
    navmenu.classList.toggle('hidden')
})
    

//javascript stop reading because regform not exist, it's not exist because the page is not on register page, that's why i put ternary to prevent js stop and continue reading
regForm ?
regForm.addEventListener('submit', ()=>{
    //I add delay to send form before the submit will disable 
    setTimeout(()=>{
        regSubmitBtn.value = "Sending, please wait...";
        regSubmitBtn.disabled = true;
    },0)
})
:
'';


//change color of navbar when scroll
window.addEventListener('scroll', () => {
    if(scrollY >= 1){
        navbar.classList.add('scrolled');
        menu.classList.add('scrolled');
    }else{
        menu.classList.remove('scrolled');
        navbar.classList.remove('scrolled');
    }
})

// auto scroll when click 
orderButton.addEventListener('click', () => {
    window.scrollTo(0, 420);
})

// show modal and disable scroll Y 
viewButton.forEach(button => {
    button.addEventListener('click', () => {   
        //fetching to database depends on id was cliked
        fetch("includes/view-product.php?id="+button.id)
        .then((res) => res.json())
        .then((data) => {
            //set current view item
            view_item = data;
            //show the modal
            viewModal.classList.remove("hidden");
            blurBody.classList.remove("hidden")
            body.style.overflowY = "hidden";
            //display to modal
            price.innerHTML = data.price;
            title.innerHTML = data.food_name;
            inputQty.value = 1;
            info.innerHTML = data.description;
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
 
