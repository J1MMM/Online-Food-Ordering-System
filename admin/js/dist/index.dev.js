"use strict";

var navbar = document.getElementById("navbar"); //change color of navbar when scroll

window.addEventListener('scroll', function () {
  if (scrollY >= 10) {
    navbar.classList.add('shadow');
  } else {
    navbar.classList.remove('shadow');
  }
});