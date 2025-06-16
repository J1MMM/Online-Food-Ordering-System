<?php if(!isset($_GET['email']))header('Location: error-page.php')?>

<script>
    <?php include './js/scroll.js'?>
</script>

<div class="verify-page">
    <div class="modal">
        <img class="mail-img" src="./assets/images/mail.png" alt="">
        <h2>Verify your email address</h2>
        <p>You've entered <span><?php echo isset($_GET['email']) ? $_GET['email'] : '(no email)' ?></span> as the email address for your account.</p>
        <p>Please verify this email address by clicking button bellow.</p>
        <a href="https://mail.google.com/" target="_blank">Verify your email</a>
        <span>Or copy and paste this link into your browser</span>
        <span class="link">https://mail.google.com/</span>
    </div>
</div>