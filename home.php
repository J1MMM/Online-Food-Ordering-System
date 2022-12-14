<?php include'./includes/products.php'?>
<?php include'./includes/search_products.php'?>
<?php include'./includes/pagination.php'?>

<div class="home-page">
    <!-- search form -->
    <form id="search-form" method="POST">
        <i class="gg-search"></i>    
        <input required type="text" name="keyword" placeholder="Search product...">
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
                <?php echo strlen($product['description']) > 100 ? 
                    substr($product['description'], 0, 100) . '...' : 
                    $product['description']
                    ?>
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
<div id="view-modal" class="modal-container hidden">
    <div class="card-modal">
        <i id="gg-close" class="gg-close"></i>  
        <h1>Product</h1>
        <hr>
        <div class="img-container">
            <img id="food-img" src="" alt="">
        </div>
        <div class="info-container">
            <h2 id="price" class="price"></h2>
            <h2 id="title" class="title"></h2>
            <p id="info" class="info"></p>
            
            <div class="input-qty-container">
                <span>Quantity:</span>
                <span>

                    <button id="decrement">-</button>
                    <input type="number" name="input-qty" id="input-qty" value="1" min="1" >
                    <button id="increment">+</button>
                </span>
                <small><?php echo $product['status'] ?'AVAILABLE':'SOLD OUT' ?></small>
            </div>

            <button id="<?php echo isset($_SESSION['user_id']) ? 'addtocart-btn' : 'addtocart-btn-login' ?>" class="addtocart-btn">
            <i class="gg-shopping-cart"></i>  
            Add to Cart
            </button>
        </div>
    </div>
</div>

