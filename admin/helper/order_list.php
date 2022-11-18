<?php 
    if(!isset($_SESSION['admin'])){
    header("Location: index.php?page=login");
}
?>
<?php
    $qry = $mysqli->query("SELECT orders.id, orders.status,  orders.ordered_at, address.fullname, address.phone_number, address.address, address.additional_info, products.food_name, products.price, cart_list.quantity FROM orders,address,products,cart_list WHERE cart_list.id = orders.cart_id AND address.user_id = orders.user_id AND products.id = cart_list.product_id AND orders.status = 'pending' ORDER BY orders.id");
    $orders = mysqli_fetch_all($qry, MYSQLI_ASSOC);

    if(isset($_GET['table'])){
        if($_GET['table'] == 'toship'){
            $qry = $mysqli->query("SELECT orders.id, orders.status, orders.ordered_at, address.fullname, address.phone_number, address.address, address.additional_info, products.food_name, products.price, cart_list.quantity FROM orders,address,products,cart_list WHERE cart_list.id = orders.cart_id AND address.user_id = orders.user_id AND products.id = cart_list.product_id AND orders.status = 'to ship' ORDER BY orders.id");
            $orders = mysqli_fetch_all($qry, MYSQLI_ASSOC);
        }
        if($_GET['table'] == 'toreceive'){
            $qry = $mysqli->query("SELECT orders.id, orders.status, orders.ordered_at, address.fullname, address.phone_number, address.address, address.additional_info, products.food_name, products.price, cart_list.quantity FROM orders,address,products,cart_list WHERE cart_list.id = orders.cart_id AND address.user_id = orders.user_id AND products.id = cart_list.product_id AND orders.status = 'to receive' ORDER BY orders.id");
            $orders = mysqli_fetch_all($qry, MYSQLI_ASSOC);
        }
        if($_GET['table'] == 'completed'){
            $qry = $mysqli->query("SELECT orders.id, orders.status, orders.ordered_at, address.fullname, address.phone_number, address.address, address.additional_info, products.food_name, products.price, cart_list.quantity FROM orders,address,products,cart_list WHERE cart_list.id = orders.cart_id AND address.user_id = orders.user_id AND products.id = cart_list.product_id AND orders.status IN ('completed', 'received') ORDER BY orders.id");
            $orders = mysqli_fetch_all($qry, MYSQLI_ASSOC);
        }
        if($_GET['table'] == 'rejected'){
            $qry = $mysqli->query("SELECT orders.id, orders.status, orders.ordered_at, address.fullname, address.phone_number, address.address, address.additional_info, products.food_name, products.price, cart_list.quantity FROM orders,address,products,cart_list WHERE cart_list.id = orders.cart_id AND address.user_id = orders.user_id AND products.id = cart_list.product_id AND orders.status = 'rejected' ORDER BY orders.id");
            $orders = mysqli_fetch_all($qry, MYSQLI_ASSOC);
        }
    }


    if(isset($_GET['reject'])){
        $qry = $mysqli->query("UPDATE orders SET status='rejected' WHERE id='{$_GET['reject']}' LIMIT 1");
        header("Location: index.php");
    }
    if(isset($_GET['approve'])){
        $qry = $mysqli->query("UPDATE orders SET status='to ship' WHERE id='{$_GET['approve']}' LIMIT 1");
        header("Location: index.php");
    }
    if(isset($_GET['ship'])){
        $qry = $mysqli->query("UPDATE orders SET status='to receive' WHERE id='{$_GET['ship']}' LIMIT 1");
        header("Location: index.php?page=home&table=toship");
    }
    if(isset($_GET['delivered'])){
        $qry = $mysqli->query("UPDATE orders SET status='received' WHERE id='{$_GET['delivered']}' LIMIT 1");
        header("Location: index.php?page=home&table=toreceive");
    }
?>