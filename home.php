<?php include'./includes/products.php'?>
<?php include'./includes/search_products.php'?>
<?php include'./includes/pagination.php'?>

<div class="banner carousel" data-carousel>
    <h1 class="welcome">Welcome to Jopay's Kitchen</h1>
    <ul data-slides>
        <li class="slide" data-active>
            <img src="./assets/images/banner-img1.webp" alt="" draggable="false">
        </li>
        <li class="slide">
            <img src="./assets/images/Lechon Manok.webp" alt="" draggable="false">
        </li>
        <li class="slide">
            <img src="./assets/images/Sisig.webp" alt="" draggable="false">
        </li>
        <li class="slide">
            <img src="./assets/images/seafood.webp" alt="" draggable="false">
        </li>
        <li class="slide">
            <img src="./assets/images/leche-flan.webp" alt="" draggable="false">
        </li>
    </ul>
</div>

<div id="menu-section" class="home-page">
    <!-- search form -->
    <form id="search-form" method="POST">
        <i class="gg-search"></i>    
        <input required type="text" name="keyword" placeholder="Search foods...">
        <button name="search" id="search-btn">Search</button>
    </form>
    <main id="main">
        <!-- if no item found  -->
        <?php if(empty($product_data)): ?>
            <h1 class="nmf">Sorry, no product found!</h1>
        <?php endif ?>
                
        <!-- render items  -->
        <?php foreach($product_data as $product): ?>
        <div class="card" id="card">
            <div class="img-container">
                <img src="<?= file_exists('./assets/images/'.$product['food_name'].'.webp') ? './assets/images/'.$product['food_name'].'.webp':$product['img_path'] ?>">
            </div>
            <div class="info-container">
                <h2 class="title">
                    <?php echo strlen($product['food_name']) > 15 ? 
                    substr($product['food_name'],0,15).'...':
                    $product['food_name']
                    ?>
                </h2>
                <p class="info">
                    <?=$product['description'] ?>
                </p>
                <button id="<?php echo $product['id']?>" class="view-btn">
                <i class="gg-eye"></i>    
                View
                </button>
            </div>
        </div>
        <?php endforeach ?>
    </main>

    <!-- pagination buttons  -->
    <?php if(isset($total_pages) && !isset($_POST['search']) && $total_pages > 4): ?>
        <div id="buttons-container" class="buttons-container">
            <!-- rendering buttons  -->
            <a class="page-button prev-btn" href="index.php?slide=<?php echo $current_slide - $prev_value?>">Prev</a>
            <?php for($i; $i<=$j; $i++): ?>
                <a class="page-button <?php echo $current_slide == $i ? 'active' : '' ?>" href="index.php?slide=<?php echo $i ?>"><?php echo $i ?></a>
            <?php endfor ?>
            <a class="page-button next-btn" href="index.php?slide=<?php echo $current_slide + $next_value?>">Next</a>
        </div>
    <?php endif ?>


    <!-- modal  -->
    <div id="blur-body" class="blur-body hidden"></div>

    <div id="view-modal" class="food-modal hidden">
        <div class="row image-wrapper">
            <div class="image-container">
                <img id="food-image" src="./assets/images/banner.jpg" alt="">
            </div>
            <div class="mini-image-container">
                <img id="food-image" src="./assets/images/banner.jpg" alt="">
                <img id="food-image" src="./assets/images/banner.jpg" alt="">
                <img id="food-image" src="./assets/images/banner.jpg" alt="">
            </div>
        </div>
        
        <div class="modal-text">
            <h1 id="name">Loading...</h1>
            <h3>Food Description:</h3>
            <p id="food-description" class="description">Loading.....</p>
            <h2 id="price" class="price">Loading...</h2>
            <hr>
            <div class="row input-container">
                Quantity:
                <div class="wrapper">
                    <input id="input-quantity" type="number" name="" value="1">
                    <div class="btn-wrapper">
                        <button id="increment" class="qty-btn add">+</button>
                        <button id="decrement" class="qty-btn minus">-</button>
                    </div>
                </div>
            </div>
            <!-- <button id="addtocart-button" class="button">Add to Cart</button> -->
            <button onClick="this.disabled=true" id="<?php echo isset($_SESSION['user_id']) ? 'addtocart-btn' : 'addtocart-btn-login' ?>" class="button">
                <i class="gg-shopping-cart"></i>  
                Add to Cart
            </button>

        </div>
        <i id="gg-close" class="gg-close"></i>
    </div>

</div>

<!-- bottom banner  -->
<div class="bottom-banner">
    <span>FOLLOW US</span>
    <a href="https://facebook.com" target="_blank">
        <i class="ri-facebook-box-fill"></i>
    </a>
    <a href="https://instagram.com" target="_blank">
        <i class="ri-instagram-line"></i>
    </a>
    <span≯ JOPAY'S KITCHEN</span>
</div>

<!-- subscribe form  -->
<section class="subscribe-section">
    <small>OUR LATEST NEWS, EVENTS & PROMOTIONS SENT STRAIGHT TO YOUR INBOX</small>
    <form action="">
        <span class="input">
            <input type="email" name="" id="" placeholder="Your email address here" required>
            <button>Subscribe</button>
        </span>
        <br>
        <span class="cbx-cont">
            <input type="checkbox" name="" id="cbx" required>
            <label for="cbx">I want to receive news & updates</label>
        </span>
    </form>
</section>

