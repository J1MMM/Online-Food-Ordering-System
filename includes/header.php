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
    <!-- favicon  -->
    <link rel="icon" type="image/png" href="./assets/images/favicon.png">
    <!-- title  -->
    <title>Online Food Ordering System</title>
    <!-- css  -->
    <link rel="stylesheet" href="./css/index.css">
    <!-- css gg icons  -->
    <link href='https://css.gg/css' rel='stylesheet'>
    <!-- icons  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- js  -->
    <script defer src="js/jquery.min.js"></script>
    <script defer src="js/parallax.min.js"></script>
    <script defer src="./js/index.js"></script>

</head>
<body>
    <nav class="navbar" id="navbar">
        <div class="nav-control">
            <a href="index.php" class="brand-name">
                <img src="assets/images/logo.png" alt="">
            </a>
            <span id="menu-btn">
                <span id="bar" class="bar1"></span>
                <span id="bar" class="bar2"></span>
                <span id="bar" class="bar3"></span>
            </span>
        </div>
        <div id="nav-items" class="nav-items">
            <a href="index.php" class="<?=!isset($_GET['page']) ? 'active' : '' ?>">HOME</a>
       
            <a href="index.php?page=cart-list" class="<?= isset($_GET['page']) && $_GET['page'] == 'cart-list' ? 'active' : '' ?> cart-link">
                <span style="color: white;" id="item-count" class="item-count">
                    <?php echo $user ? $item_count : 0 ?>
                </span>
                <i class="gg-shopping-cart"></i>    
                CART
            </a>
            <a href="index.php?page=about" class="<?= isset($_GET['page']) && $_GET['page'] == 'about' ? 'active' : '' ?>">ABOUT US</a>
            <a href="index.php?page=location" class="<?= isset($_GET['page']) && $_GET['page'] == 'location' ? 'active' : '' ?>">LOCATION</a>
            <?php if($user==NULL){?>
            <div class="signin_login_cont">
                <a href="index.php?page=register" class="<?= isset($_GET['page']) && $_GET['page'] == 'register' ? 'active' : '' ?>">
                    SIGN UP    
                </a>
                |
                <a href="index.php?page=login" class="<?= isset($_GET['page']) && $_GET['page'] == 'login' ? 'active' : '' ?>">
                   LOGIN 
                </a>
            </div>
     
            <?php }else{ ?>
                <div id="nav-profile" class="nav-profile <?php echo isset($_GET['login']) ? 'loggedin':'' ?>">
                    <div class="pfp-cont">
                        <img src="<?=$user['pfp_path']?>" alt="">
                    </div>
                    <span><?php print_r($user['first_name']) ?></span>
                    <div class="profile-modal">
                        <div class="user-modal-banner">
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
                            <a href="index.php?page=logout" class="logout-btn">
                                <i class="gg-log-in"></i>
                                SIGN OUT
                            </a>
                        </div>
                    </div>
                </div>
                <!-- burger menu  -->
            <a id="modal-menu" href="index.php?page=user" class="<?= isset($_GET['page']) && $_GET['page'] == 'user' ? 'active' : '' ?> burger-menu-links">MY ACCOUNT</a>
            <a id="modal-menu" href="index.php?page=purchase&column=all" class="<?= isset($_GET['page']) && $_GET['page'] == 'purchase' ? 'active' : '' ?> burger-menu-links">MY PURCHASE</a>
            <a href="index.php?page=logout" class="logout-btn burger-menu-links">SIGN OUT</a>
            <?php } ?>
            

        </div>
    </nav>

    