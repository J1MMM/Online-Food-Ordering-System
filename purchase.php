<?php include('./includes/purchase.php')?>

<div id="purchase-page">
    <div class="container">
        <div class="header">
            <a href="index.php?page=purchase&column=all" class="<?=$_GET['column']=='all' ? 'active' : '' ?>">All</a>
            <a href="index.php?page=purchase&column=pending" class="<?=$_GET['column']=='pending' ? 'active' : '' ?>">Pending</a>
            <a href="index.php?page=purchase&column=to ship" class="<?=$_GET['column']=='to ship' ? 'active' : '' ?>">To Ship</a>
            <a href="index.php?page=purchase&column=to receive" class="<?=$_GET['column']=='to receive' ? 'active' : '' ?>">To Receive</a>
            <a href="index.php?page=purchase&column=completed" class="<?=$_GET['column']=='completed' ? 'active' : '' ?>">Completed</a>
            <a href="index.php?page=purchase&column=rejected" class="<?=$_GET['column']=='rejected' ? 'active' : '' ?>">Rejected</a>
        </div>

        <main>
            <?php foreach($orders as $item): ?>
            <?php
            $total = floatval($item['price']);
            $total *= $item['quantity'];   
            ?>
            <div class="row">
                <div class="header">
                    <span class="brand">Online Food Ordering System</span>
                    <?php if($item['status'] == 'received'){?>
                        <span><a href="/food-ordering-system/index.php?page=purchase&completed=<?=$item['id']?>">RECEIVED</a></span>
                    <?php }else if($item['status'] == 'to receive'){ ?>
                        <span><?=strtoupper($item['status'])?></span>
                    <?php }else{ ?>
                        <span><?=strtoupper($item['status'])?></span>
                    <?php }?>
                </div>
                <div class="body">
                    <div class="img-cont">
                        <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Nnx8fGVufDB8fHx8&w=1000&q=80" alt="">
                    </div>
                    <div class="info-cont">
                        <h4><?=$item['food_name']?></h4>
                        <p><?=$item['description']?></p>
                    </div>
                    <div class="qty-cont">
                        <span>x<?=$item['quantity']?></span>
                        <span>₱<?=$item['price']?></span>
                    </div>
                </div>
                <div class="total-cont">
                    <span class="item-count"><?=$item['quantity']?> <?=$item['quantity'] > 1 ? 'items' : 'item'?></span>
                    <span class="payment">Total Payment: <span class="total-price">₱<?=$total?></span></span>
                </div>
                <div class="footer-cont">
                    <span>Order ID</span>
                    <span><?=$item['id']?></span>
                </div>
            </div>
            <?php endforeach ?>
        </main>
    </div>
</div>