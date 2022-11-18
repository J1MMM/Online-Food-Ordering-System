"use strict";

//remove check out bar shadow when its on bottom of form
var checkoutBar = document.getElementById("checkout-bar");
var checkoutForm = document.getElementById("check-out-form");
var barfixPos = checkoutBar.getBoundingClientRect().y;
window.addEventListener('scroll', function () {
  var currentbarPos = checkoutBar.getBoundingClientRect().y;

  if (currentbarPos < barfixPos) {
    checkoutBar.classList.remove("shadow");
  } else {
    checkoutBar.classList.add("shadow");
  }
});
var selectAll = document.getElementById("select-all");
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
selectAll.addEventListener('click', function () {
  checkboxes.forEach(function (el) {
    selectAll.checked ? el.checked = true : el.checked = false;
  });
});
var totalPrice = document.getElementById("price");
var totalItem = document.getElementById("total-item");
checkboxes.forEach(function (checkbox) {
  checkbox.addEventListener('click', function () {
    var total_item = 0;
    var sum = 0;
    checkboxes.forEach(function (chkbx) {
      if (chkbx.checked) {
        if (chkbx.id == "select-all") {
          total_item--;
        }

        sum += Number(chkbx.getAttribute('amount'));
        total_item++;
      }
    });
    totalItem.innerText = total_item + (total_item > 0 ? " items" : " item");
    totalPrice.innerText = '₱' + sum.toFixed(2);
  });
});