
<?php
    session_start();
    session_destroy();
    header('Location: /food-ordering-system/index.php?page=login');
    die("<meta http-equiv='refresh' content='0'>");
?>