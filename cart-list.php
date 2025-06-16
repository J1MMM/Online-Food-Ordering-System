<?php include './includes/checkout.php'?>

<!-- parallax banner  -->
<div class="banner parallax-window" data-parallax="scroll" data-image-src="assets/images/Bulalo.webp">
    <div class="banner-content">
        <h1><i>Delicious and Remarkable Filipino Food</i></h1>
        <a href="./index.php#menu-section" id="order-now-btn">ORDER NOW</a>
    </div>
</div>

<div class="cart-list-page">
   
    <?php if(empty($all_product_incart)): ?>
        <h1 class="cart-empty">Your Cart is Empty</h1>
    <?php endif ?>
        
    <?php if(!empty($all_product_incart)): ?>
    <div id="header" class="page-row">
        <span>Product</span>
        <span>Price</span>
        <span>Quantity</span>
        <span>Total</span>
        <span>Actions</span>
    </div>
    <form id="check-out-form" method="POST">
    <?php foreach($all_product_incart as $product): ?>
        <!-- compute totalprice -->
        <?php
        $total_price = floatval($product['price']);
        $total_price *= $product['quantity'];
        // $total_price = '$'.$total_price;
        ?>
    <div class="page-row">
        <div class="item-info">
            <input type="checkbox" class="check-box" name="product-id[]" value="<?= $product['id']?>" amount='<?=$total_price?>' />
            <div class="img-cont">
                <img src="<?= file_exists('./assets/images/'.$product['food_name'].'.webp') ? './assets/images/'.$product['food_name'].'.webp':$product['img_path'] ?>" alt="">
            </div>
            <h4 id="cart-list-title" class="title"><?= $product['food_name'] ?></h4>
        </div>
        <span id="cart-list-price">₱<?= $product['price'] ?></span>
        <span id="cart-list-quantity"><?= $product['quantity'] ?></span>
   
        <span id="cart-list-totalprice" style="color: #2DA544"><?= '₱'.$total_price ?></span>
        <a href="./includes/delete_cartlist.php?delete=<?php echo $product['id'] ?>" id="delete-btn">Delete</a>
    </div>
    <?php endforeach ?>
    <div id="checkout-bar" class="checkout-bar shadow">
        <div class="actions">
            <input type="checkbox" id="select-all" class="check-box" name="<?php echo $product['id']?>">
            <label for="select-all">Select All(<?= mysqli_num_rows($result) ?>)</label>
            <input type='submit' value="Delete" name='multi_delete'>
        </div>
        <div class="checkout-btn-container">
            <span>Total (<span id="total-item">0 item</span>):</span>
            <div id="price">₱0.00</div> 
            <button class="checkout-btn" type="submit" name="checkout">Check Out</button>
        </div>
    </div>
    </form>
    <?php endif ?>    
</div>

<!-- bottom banner  -->
<div class="bottom-banner">
    <span>FOLLOW US</span>
    <a href="https://facebook.com" target="_blank">
        <i class="gg-facebook"></i>
    </a>
    <a href="https://instagram.com" target="_blank">
        <i class="gg-instagram"></i>
    </a>
    <span≯ JOPAY'S KITCHEN</span>
</div>

<!-- carousel  -->
<section class="carousel-container">
    <div class="carousel" data-carousel>
        <a class="view-menu" href="index.php">VIEW MENU</a>
        <ul data-slides>
            <li class="slide" data-active>
                <img src="./assets/images/takoyaki.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <img src="./assets/images/Chicken Curry.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <img src="./assets/images/Spaghetti.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <img src="./assets/images/Sinampalukan Manok.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <img src="./assets/images/Halo-halo.webp" alt="" draggable="false">
            </li>
         
        
        </ul>
    </div>
</section>


<script>
    <?php include './js/cartlist.js'?>
</script>
