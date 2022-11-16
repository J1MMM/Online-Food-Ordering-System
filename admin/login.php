<?php 
include '../config/DBconnection.php';
include './helper/login.php';
?>
<form method="POST">
    <input type="text" name="email">
    <input type="password" name="pass">
    <input type="submit" value="submit" name="submit">
</form>