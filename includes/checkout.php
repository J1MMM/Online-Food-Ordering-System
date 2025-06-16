<?php

if(isset($_POST['checkout']) && isset($_POST['product-id'])){
    $user_id = $user['id'];
    $qry = $mysqli->query("SELECT * FROM address WHERE user_id = '$user_id'");
    // $user_address = mysqli_fetch_all($qry, MYSQLI_ASSOC);

    //check if user have shipping address
    if(!empty($qry->num_rows)){
        //all cartlist_id in cartlist selected
        $selected_id = $_POST['product-id'];
        //nilagay ko muna sa loob ng parenthesis bawat product_id na selected
        $extract_id = array_map(function($id){
            $userID = $_SESSION['user_id'];
            return '('.$id.','.$userID.')';
        }, $selected_id);
        //then implode using comma
        $extract_id = implode(',',$extract_id);
        // print_r($extract_id);
        //insert to orders table
        $mysqli->query("INSERT INTO orders (cart_id, user_id) VALUES $extract_id");
        // get cart_id to delete from cart_list
        $qry = $mysqli->query("SELECT cart_id FROM orders");
        $cart_id = mysqli_fetch_all($qry, MYSQLI_ASSOC);
        $cart_id = array_map(function($id){
            return $id['cart_id'];
        }, $cart_id);
        $cart_id = implode(',',$cart_id);
        // print_r($cart_id);
        $mysqli->query("UPDATE cart_list SET status = 1 WHERE id IN ($cart_id)");
        
        die("<meta http-equiv='refresh' content='0'>");
    }else{
        //if no user address go redirect to register address page
        header('Location: index.php?page=address');
    }

}
?>

