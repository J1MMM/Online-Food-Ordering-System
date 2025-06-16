<?php
ob_start();
include './includes/header.php'
?>

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    include $page . '.php';
    ?>

<?php
include './includes/footer.php'
?>
