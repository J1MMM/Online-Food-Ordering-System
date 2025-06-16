//remove check out bar shadow when its on bottom of form
const checkoutBar = document.getElementById("checkout-bar");
const checkoutForm = document.getElementById("check-out-form");
const barfixPos = checkoutBar.getBoundingClientRect().y;

window.addEventListener('scroll', () => {
    var currentbarPos = checkoutBar.getBoundingClientRect().y;
    
    if(currentbarPos < barfixPos){
        checkoutBar.classList.remove("shadow");
    }else{
        checkoutBar.classList.add("shadow");
    }
})  

const selectAll = document.getElementById("select-all");
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
selectAll.addEventListener('click', () =>{
    checkboxes.forEach(el =>{
        
        selectAll.checked ?
            el.checked = true
            :
            el.checked = false;

    })
})

const totalPrice = document.getElementById("price");
const totalItem = document.getElementById("total-item");

checkboxes.forEach(checkbox =>{
    checkbox.addEventListener('click', () =>{
        var total_item = 0
        var sum = 0;
        checkboxes.forEach(chkbx => {
            if(chkbx.checked){
                if(chkbx.id == "select-all"){
                    total_item--;
                }
                sum += Number(chkbx.getAttribute('amount'));
                total_item++;
            }
        })
        totalItem.innerText = total_item + (total_item > 0 ? " items" : " item");
        totalPrice.innerText = '₱' + sum.toFixed(2);
    })
})