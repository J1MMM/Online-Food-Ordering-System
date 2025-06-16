<?php include './includes/address.php'?>


<!-- add address page -->
<div class="address-page">
    <form class="fill-address-form" method="POST">
        <h2>New Address</h2>
        <p>To place order, please add a delivery address</p>
        <hr/>
        <div class="input-container">
            <input
                required
                type="text" 
                name="fullname" 
                placeholder="Full Name" 
                >
        </div>
        <div class="input-container">
            <input 
                required
                type="text" 
                name="number" 
                placeholder="Phone Number" 
            />
        <div class="input-container">
            <input 
                required
                type="text" 
                name="address" 
                placeholder="Complete Address" 
            />
        </div>
        <div id="location-info-section">
            <textarea 
                spellcheck="false" 
                placeholder="Addtional info about your Address" 
                name="additional-info" 
                id="location-info" 
                cols="30" 
                rows="5"></textarea>
        </div>

        <div class="button-container">
            <a href="index.php?page=cart-list">CANCEL</a>
            <input 
                type="submit"
                name="submit"
                value="SUBMIT"
                />
        </div>
    </form>
</div>
<!-- bottom banner  -->
<div class="bottom-banner">
    <span>FOLLOW US</span>
    <a href="https://facebook.com" target="_blank">
        <i class="gg-facebook"></i>
    </a>
    <a href="https://instagram.com" target="_blank">
        <i class="gg-instagram"></i>
    </a>
    <span≯ JOPAY'S KITCHEN</span>
</div>