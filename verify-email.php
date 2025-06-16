<?php include './includes/send-mail.php'?>

<div class="cont">
    <div class="wrap">
        <h2>Forgot Password</h2>
        <p>You will receive link for reseting your password.</p>

        <form method="POST">
            <?php echo isset($message) ? $message : '' ?>
            
            <input placeholder="Email Address" type="email" name="email" required>
            <button name="submit">
                <i class="gg-mail"></i>
                SEND
            </button>
        </form>
    </div>
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
