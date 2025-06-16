<?php if(isset($_SESSION['user_id']))header('Location: error-page.php');?>
<?php include('./includes/register.php')?>

<!-- register form  -->
<div class="register-page">
    <form id="register-form" method="POST">
        <h2>Register</h2>
        <hr>
        <p id="reg-err-msg"><?php echo $reg_err_msg?></p>
        
        <div class="input-container">
            <i class="gg-profile"></i>
            <div>
                <input 
                    required 
                    type="text" 
                    name="fname" 
                    placeholder="First Name"
                    >
                <input 
                    required 
                    type="text" 
                    name="lname" 
                    placeholder="Last Name" 
                >
            </div>
        </div>
        <div class="input-container">
            <i class="gg-mail"></i>
            <input 
                required
                type="email" 
                name="email" 
                placeholder="Email Address">
        </div>
        <div class="input-container">
            <i class="gg-lock"></i>
            <input
                required 
                type="password" 
                name="pass" 
                placeholder="Password" 
                >
        </div>
        <div class="input-container">
            <i class="gg-invi"></i>
            <input
                required 
                type="password" 
                name="pass2" 
                placeholder="Repeat Password" 
            >
        </div>
        <div class="input-container">
            <SPAN></SPAN>
        <input
            class="" 
            name="submit" 
            value="SIGN UP" 
            id="register-btn" 
            type="submit" 
            />
        </div>
        
            
        <div class="AHAC">
            <span>Already have an account?</span>
            <a id="back" href="index.php?page=login">Login</a>
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
