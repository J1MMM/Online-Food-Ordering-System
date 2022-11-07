<?php session_start()?>
<?php include './config/DBconnection.php'?>
<?php include './includes/user.php'?>
<?php include './includes/cart_list.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title  -->
    <title>Online Food Ordering System</title>
    <!-- css  -->
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/cart-list.css">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/navbar_menu.css">
    <link rel="stylesheet" href="./css/verify-page.css">
    <!-- css gg icons  -->
    <link href='https://css.gg/css' rel='stylesheet'>
    <!-- js  -->
    <script defer src="./js/index.js"></script>

</head>
<body>
    <nav class="navbar" id="navbar">
        <a href="index.php" class="brand-name">
            <h2>
                Online Food Ordering System
            </h2>
        </a>
        
        <div class="nav-items">
            <a href="index.php?page=home" style="text-decoration: none;">Home</a>
       
            <a href="index.php?page=cart-list" class="cart-link">
                <span style="color: white;" id="item-count" class="item-count">
                    <?php echo $user ? $item_count : 0 ?>
                </span>
                <i class="gg-shopping-cart"></i>    
                Cart
            </a>
            <a href="index.php?page=about">About</a>
            <?php if($user==NULL){?>
            <div class="signin_login_cont">
                <a href="index.php?page=register">
                    Sign up    
                </a>
                |
                <a href="index.php?page=login">
                   Login 
                </a>
            </div>
     
            <?php }else{ ?>
                <div class="nav-profile <?php echo isset($_GET['login']) ? 'loggedin':'' ?>">
                    <div class="pfp-cont">
                        <img src="<?=$user['pfp_path']?>" alt="">
                    </div>
                    <span><?php print_r($user['first_name']) ?></span>
                    <div class="profile-modal">
                        <div class="banner">
                            <div class="pfp-cont">
                            <img src="<?=$user['pfp_path']?>" alt="Profile">
                            </div>
                        </div>
                        <div class="info-cont">
                            <h3 class="name">
                                <?php print_r($user['first_name']) ?>
                                <?php print_r($user['last_name']) ?>
                            </h3>
                            <p class="email"><?php print_r($user['email']) ?></p>
                            <div class="menu-cont">
                                <a id="modal-menu" href="index.php?page=user">My Account</a>
                                <a id="modal-menu" href="index.php?page=purchase&column=all">My Purchase</a>
                            </div>
                            <a href="/food-ordering-system/includes/logout.php" class="logout-btn">
                                <i class="gg-log-in"></i>
                                Sign Out
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </nav>
    <div class="banner">
        <img src="./assets/images/banner.jpg" alt="">
        <div class="banner-content">
            <h1>Welcome to Online Food Ordering System</h1>
            <button id="order-now-btn">ORDER NOW</button>
        </div>
    </div>
    