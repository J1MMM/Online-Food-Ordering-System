<!-- fetch data  -->
<?php
    //fetch products
    $result  = $mysqli->query('SELECT * FROM products');

    $total_products = mysqli_num_rows($result);
    $product_per_page = 8; //item per page
    $total_pages = $total_products/$product_per_page + 1;
    
    $get_slide = filter_input(INPUT_GET, 'slide', FILTER_SANITIZE_NUMBER_INT);//filter slide params
    $slide = isset($get_slide) ? $get_slide : 1;
    $start_from = ($slide-1)*8; // (papge1-1) x 8 = 0; (page2-1) * 8 = 8 

    $qry = $mysqli->query("SELECT * FROM products LIMIT $start_from, $product_per_page"); //start from 
    $product_data = mysqli_fetch_all($qry, MYSQLI_ASSOC); 
    // unset($_POST['search']);
?>