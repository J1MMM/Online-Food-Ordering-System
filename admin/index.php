
<?php include './layout/header.php' ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "home";
    include './pages/' . $page . '.php' 
    ?>

<?php include './layout/footer.php' ?>
