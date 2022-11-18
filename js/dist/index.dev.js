"use strict";

// navbar elements
var navbar = document.getElementById("navbar");
var orderButton = document.getElementById("order-now-btn");
var searchButton = document.getElementById("search-btn"); //modal elements

var viewButton = document.querySelectorAll(".view-btn");
var viewModal = document.getElementById("view-modal");
var blurBody = document.getElementById("blur-body");
var ggclose = document.getElementById("gg-close"); //input quantity

var inputQty = document.getElementById("input-qty");
var incrementBtn = document.getElementById("increment");
var decrementBtn = document.getElementById("decrement"); //cart items count el
//body selector

var body = document.getElementsByTagName("BODY")[0];
var addtocartBtn = document.getElementById("addtocart-btn");
var addtocartLoginBtn = document.getElementById("addtocart-btn-login");
var view_item; //modal elements

var foodImg = document.getElementById("food-img");
var price = document.getElementById("price");
var title = document.getElementById("title");
var info = document.getElementById("info");
var regSubmitBtn = document.getElementById("register-btn");
var regForm = document.getElementById("register-form");
var menu = document.getElementById('menu');
var menuBtn = document.getElementById('menu-btn');
var navmenu = document.getElementById('nav-items');
menuBtn.addEventListener('click', function () {
  navmenu.classList.toggle('hidden');
}); //javascript stop reading because regform not exist, it's not exist because the page is not on register page, that's why i put ternary to prevent js stop and continue reading

regForm ? regForm.addEventListener('submit', function () {
  //I add delay to send form before the submit will disable 
  setTimeout(function () {
    regSubmitBtn.value = "Sending, please wait...";
    regSubmitBtn.disabled = true;
  }, 0);
}) : ''; //change color of navbar when scroll

window.addEventListener('scroll', function () {
  if (scrollY >= 1) {
    navbar.classList.add('scrolled');
    menu.classList.add('scrolled');
  } else {
    menu.classList.remove('scrolled');
    navbar.classList.remove('scrolled');
  }
}); // auto scroll when click 

orderButton.addEventListener('click', function () {
  window.scrollTo(0, 420);
}); // show modal and disable scroll Y 

viewButton.forEach(function (button) {
  button.addEventListener('click', function () {
    //fetching to database depends on id was cliked
    fetch("includes/view-product.php?id=" + button.id).then(function (res) {
      return res.json();
    }).then(function (data) {
      console.log(data); //set current view item

      view_item = data; //show the modal

      viewModal.classList.remove("hidden");
      blurBody.classList.remove("hidden");
      body.style.overflowY = "hidden"; //display to modal

      foodImg.src = "./assets/images/".concat(data.food_name, ".webp");
      price.innerHTML = '₱' + data.price;
      title.innerHTML = data.food_name;
      inputQty.value = 1;
      info.innerHTML = data.description;
    })["catch"](function (error) {
      return console.log(error);
    });
  });
}); // hide the modal and enable scroll Y 

var hideModal = function hideModal() {
  viewModal.classList.add("hidden");
  blurBody.classList.add("hidden");
  body.style.overflowY = "auto";
}; //for closing of modal


blurBody.addEventListener('click', hideModal);
ggclose.addEventListener('click', hideModal); // - button listener

decrementBtn.addEventListener('click', function () {
  if (inputQty.value < 2) {//WALA
  } else {
    inputQty.value = Number(inputQty.value) - 1;
  }
}); // + button listener

incrementBtn.addEventListener('click', function () {
  inputQty.value = Number(inputQty.value) + 1;
}); //procede to login form

var goToLoginForm = function goToLoginForm() {
  console.log("CLICKED");
  hideModal();
  window.location.href = "index.php?page=login";
}; //add to cart function


var addtocart = function addtocart() {
  var URL = './includes/add_to_cart.php';
  var formData = new FormData();
  formData.append('product-id', view_item['id']);
  formData.append('qty', inputQty.value);
  fetch(URL, {
    method: 'POST',
    body: formData
  }).then(function (res) {
    return res.json();
  }).then(function (data) {
    if (window.location.href == "http://localhost/food-ordering-system/index.php?login=success") {
      window.location.href = "index.php";
    } else {
      window.location.reload();
    }
  })["catch"](function (err) {
    return console.log(err);
  });
}; //basta pag di naka login, login modal popup else add to cart function na


addtocartBtn ? addtocartBtn.addEventListener('click', addtocart) : //add to cart onlick listener
addtocartLoginBtn.addEventListener('click', goToLoginForm); //add to cart button onclick listener when no session