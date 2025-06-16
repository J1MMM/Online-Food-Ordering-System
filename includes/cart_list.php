<?php 
    
    if($user){
        $user_id = $user['id'];

        $result = $mysqli->query("SELECT cart_list.id, cart_list.product_id, products.food_name, products.img_path,
        products.description, products.price, cart_list.quantity, cart_list.status FROM products, 
        cart_list WHERE cart_list.product_id=products.id AND cart_list.user_id='$user_id' AND cart_list.status = 0 ORDER BY cart_list.status ASC, cart_list.id DESC");

        $all_product_incart = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //get count of item in your cart list
        $all_qty_row = array_map(function($data){
            return $data['quantity'];
        }, $all_product_incart);
        
        $item_count = array_sum($all_qty_row);
        $item_count = $item_count > 99 ? '99+' : $item_count;
    }
    //multi delete product in cartlist
    if(isset($_POST['multi_delete']) && isset($_POST['product-id'])){
        $selected_id = $_POST['product-id'];
        $extract_id = implode(',',$selected_id);

        $mysqli->query("DELETE FROM cart_list WHERE id IN($extract_id)");
        die("<meta http-equiv='refresh' content='0'>");
    }
?>