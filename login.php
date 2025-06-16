<?php if(isset($_SESSION['user_id']))header('Location: error-page.php') ?>

<?php include('./includes/login.php')?>

<!-- login page -->
<div class="login-page">
    <form id="login-form" method="POST">
        <h2>Log in</h2>
        <hr/>
        <p id="login-error-message"><?php echo $err_msg ?></p>
        <div class="input-container">
            <i class="gg-mail"></i>
            <input
                required
                type="email" 
                name="email" 
                placeholder="Your email" 
                >
        </div>
        <div class="input-container">
            <i class="gg-lock"></i>
            <input 
                required
                type="password" 
                name="pass" 
                placeholder="Your password" 
            >
        </div>
             <div class="input-container">
            <span></span>
            <a id="forgot-pass" href="./index.php?page=verify-email">Forgot password?</a>
        </div>
        <div class="input-container">
            <span></span>
        <input 
            id="login-btn"
            type="submit"
            name="submit"
            value="LOGIN"
            />
        </div>
       <div class="bottom-sec">
           <p>Don't have an account yet?</p>
           <a id="create-one" href="index.php?page=register">Signup now</a>
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
