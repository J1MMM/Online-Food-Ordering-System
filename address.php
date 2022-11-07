<?php include './includes/address.php'?>



<!-- add address page -->
<div class="address-page">
    <form method="POST">
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