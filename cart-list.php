<?php include './includes/checkout.php'?>

<script>
    <?php include 'js/scroll.js'?>
</script>


<div class="cart-list-page">
   
    <?php if(empty($all_product_incart)): ?>
        <h1 class="cart-empty">Your Cart is Empty</h1>
    <?php endif ?>
        
    <?php if(!empty($all_product_incart)): ?>
    <div id="header" class="page-row">
        <span style="margin-left: 3rem">Product</span>
        <span>Price</span>
        <span>Quantity</span>
        <span>Total Price</span>
        <span>Actions</span>
    </div>
    <form id="check-out-form" method="POST">
    <?php foreach($all_product_incart as $product): ?>
        <!-- compute totalprice -->
        <?php 
        $total_price = floatval(ltrim($product['price'], '$'));
        $total_price *= $product['quantity'];
        // $total_price = '$'.$total_price;
        ?>
    <div class="page-row">
        <div class="item-info">
            <input type="checkbox" class="check-box" name="product-id[]" value="<?= $product['id']?>" amount='<?=$total_price?>' />
            <div class="img-cont">
                <img src="https://greendroprecycling.com/wp-content/uploads/2017/04/GreenDrop_Station_Aluminum_Can_Pepsi.jpg" alt="">
            </div>
            <h4 id="cart-list-title" class="title"><?= $product['food_name'] ?></h4>
        </div>
        <span id="cart-list-price"><?= $product['price'] ?></span>
        <span id="cart-list-quantity"><?= $product['quantity'] ?></span>
   
        <span id="cart-list-totalprice"><?= '$'.$total_price ?></span>
        <a href="/food-ordering-system/includes/delete_cartlist.php?delete=<?php echo $product['id'] ?>" id="delete-btn">Delete</a>
    </div>
    <?php endforeach ?>
    <div id="checkout-bar" class="checkout-bar shadow">
        <div class="actions">
            <input type="checkbox" id="select-all" class="check-box" name="<?php echo $product['id']?>">
            <label for="select-all">Select All(<?= mysqli_num_rows($result) ?>)</label>
            <input type='submit' value="Delete" name='multi_delete'>
        </div>
        <div class="checkout-btn-container">
            <span>Total (<span id="total-item">0 item</span>): <span id="price">$0.00</span> </span>
            <button class="checkout-btn" type="submit" name="checkout">Check Out</button>
        </div>
    </div>
    </form>
    <?php endif ?>    
</div>

<script>
    <?php include './js/cartlist.js'?>
</script>