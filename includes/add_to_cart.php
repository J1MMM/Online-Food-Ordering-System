
<?php include '../config/DBconnection.php'?>

<?php
    session_start();

    if(isset($_POST['product-id']) && isset($_SESSION['user_id']) && isset($_POST['qty'])){
        $product_id = $_POST['product-id'];
        $user_id = $_SESSION['user_id'];
        $qty = $_POST['qty'];

        $sql = $mysqli->query("SELECT * FROM cart_list WHERE user_id = '$user_id' AND product_id='$product_id' AND status = 0");
        $duplicate_product = mysqli_fetch_all($sql, MYSQLI_ASSOC);

         if(empty($duplicate_product)) {
             $insert_query = $mysqli->query("INSERT INTO cart_list (product_id, user_id, quantity) VALUES ('$product_id','$user_id','$qty')");
             exit(json_encode("Success add to cart"));
        }else{
            // print_r($duplicate_product);
            $update_quantity =  $duplicate_product[0]['quantity'] + $qty;
            // echo $update_quantity;
            $update_query =$mysqli->query("UPDATE cart_list SET quantity = $update_quantity WHERE user_id = '$user_id' AND product_id='$product_id'"); 
            exit(json_encode("cart list quantity updated"));
        }
    }else{
        exit("form is empty");
    }
?>