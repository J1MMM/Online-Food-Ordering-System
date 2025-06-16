<?php include './includes/reset_password.php'?>

<div class="cont">
    <div class="wrap">
        <h2 style="margin-bottom: 1rem">Reset Password</h2>

        <form method="POST">
            <?php echo isset($message) ? $message : '' ?>
            
            <input type="password" name="pass1" placeholder="Password" required>
            <input type="password" name="pass2" placeholder="Confirm Password" required>

            <button name="submit">
                <i class="gg-mail"></i>
                Reset Password
            </button>
        </form>
    </div>
</div>