
<?php
    if(!isset($_SESSION['user_id'])){
        header('Location: ./index.php');
    }
    if(isset($_GET['column'])){
        $qry = $mysqli->query("SELECT orders.id, orders.status, products.description, products.food_name, products.price, products.img_path, cart_list.quantity FROM orders,address,products,cart_list WHERE cart_list.id = orders.cart_id AND address.user_id = orders.user_id AND products.id = cart_list.product_id AND orders.user_id = '{$user['id']}' AND orders.status = '{$_GET['column']}' ORDER BY orders.id DESC");
        $orders = mysqli_fetch_all($qry, MYSQLI_ASSOC);
        if($_GET['column'] == 'all'){
            $qry = $mysqli->query("SELECT orders.id, orders.status, products.description, products.food_name, products.price, products.img_path, cart_list.quantity FROM orders,address,products,cart_list WHERE cart_list.id = orders.cart_id AND address.user_id = orders.user_id AND products.id = cart_list.product_id AND orders.user_id = '{$user['id']}' ORDER BY orders.id DESC");
            // print_r(mysqli_fetch_all($qry, MYSQLI_ASSOC));
            $orders = mysqli_fetch_all($qry, MYSQLI_ASSOC);
        }
        if($_GET['column'] == 'to receive'){
            $qry = $mysqli->query("SELECT orders.id, orders.status, products.description, products.food_name, products.price, products.img_path, cart_list.quantity FROM orders,address,products,cart_list WHERE cart_list.id = orders.cart_id AND address.user_id = orders.user_id AND products.id = cart_list.product_id AND orders.user_id = '{$user['id']}' AND orders.status IN ('to receive', 'received') ORDER BY orders.id DESC");
            // print_r(mysqli_fetch_all($qry, MYSQLI_ASSOC));
            $orders = mysqli_fetch_all($qry, MYSQLI_ASSOC);
        }
    }    
    
    if(isset($_GET['completed'])){
        $qry = $mysqli->query("UPDATE orders SET status='completed' WHERE id='{$_GET['completed']}' LIMIT 1");
        header("Location: index.php?page=purchase&column=completed");
    }
?>
<!-- js auto scroll -->
<script>
    <?php include './js/scroll.js'?>
</script>
<!-- css style  -->
<style>
    <?php include './css/purchase.css'?>
</style>