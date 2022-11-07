<?php if(isset($_SESSION['user_id']))header('Location: error-page.php');?>
<?php include('./includes/register.php')?>

<!-- register form  -->
<div class="register-page">
    <form id="register-form" method="POST">
        <h2>Register</h2>
        <hr>
        <p id="reg-err-msg"><?php echo $reg_err_msg?></p>
        <div class="fullname-cont">
            <i class="gg-profile"></i>
            <div class="input-container">
                <input 
                    required 
                    type="text" 
                    name="fname" 
                    placeholder="First Name"
                    >
            </div>
            <div class="input-container">
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
        <input
            class="" 
            name="submit" 
            value="SIGN UP" 
            id="register-btn" 
            type="submit" 
            />
            
        <div class="AHAC">
            <span>Already have an account?</span>
            <a id="back" href="/food-ordering-system/index.php?page=login">Login</a>
        </div>
    </form>
</div>