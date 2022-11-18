"use strict";

var navbar = document.getElementById("navbar");
var burgir = document.getElementById("bugir-btn");
var menu = document.getElementById("nav-menu"); //change color of navbar when scroll

window.addEventListener('scroll', function () {
  if (scrollY >= 10) {
    navbar.classList.add('shadow');
  } else {
    navbar.classList.remove('shadow');
  }
});
burgir.addEventListener('click', function () {
  menu.classList.toggle('hidden');
});