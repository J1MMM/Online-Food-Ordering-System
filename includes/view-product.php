<?php include '../config/DBconnection.php'?>

<?php 
    if(isset($_GET['id'])){
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $result = $mysqli->query('SELECT * FROM  products where id='.$id);
        $product_info = mysqli_fetch_array($result, MYSQLI_ASSOC);    
        // sleep(3); //add delay
        exit(json_encode($product_info));
    }
?>