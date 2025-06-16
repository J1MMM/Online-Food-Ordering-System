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
                        <span><a href="index.php?page=purchase&completed=<?=$item['id']?>">ORDER RECEIVED</a></span>
                    <?php }else if($item['status'] == 'to receive'){ ?>
                        <span><?=strtoupper($item['status'])?></span>
                    <?php }else{ ?>
                        <span><?=strtoupper($item['status'])?></span>
                    <?php }?>
                </div>
                <div class="body">
                    <div class="img-cont">
                        <img src="<?= file_exists('./assets/images/'.$item['food_name'].'.webp') ? './assets/images/'.$item['food_name'].'.webp': $item['img_path'] ?>" alt="">
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
    <!-- <i class="ri-arrow-left-s-line carousel-button prev" data-carousel-button="prev"></i>
    <i class="ri-arrow-right-s-line carousel-button next" data-carousel-button="next"></i> -->
        <ul data-slides>
            <li class="slide" data-active>
                <h1 class="title">CRISPY PATA</h1>
                <img src="./assets/images/Crispy Pata.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <h1 class="title">LECHON MANOK</h1>
                <img src="./assets/images/Lechon Manok.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <h1 class="title">PORK SISIG</h1>
                <img src="./assets/images/Sisig.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <h1 class="title">SEAFOODS</h1>
                <img src="./assets/images/seafood.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <h1 class="title">LECHE FLAN</h1>
                <img src="./assets/images/leche-flan.webp" alt="" draggable="false">
            </li>
         
        
        </ul>
    </div>
</section>

