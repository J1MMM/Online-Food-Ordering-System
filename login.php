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
        <input 
            id="login-btn"
            type="submit"
            name="submit"
            value="LOGIN"
            />
        <p>Don't have an account yet?</p>
        <a id="create-one" href="index.php?page=register">Signup now</a>
    </form>
</div>