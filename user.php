<?php include './includes/user_page.php'?>
<div class="user-page">
    <div id="user-page-cont"">
        <h1>My Profile</h1>
        <p>Manage and protect your account</p>
        <hr>
        <div class="info-cont">
            <div class="pfp-section">
                <!-- form to change pfp  -->
                <form id="change-pfp-form" method="POST" action="" enctype="multipart/form-data">
                    <label for="select-file" class="pfp-cont">
                        <img src="<?=$user['pfp_path']?>" alt="">
                        <input type="file" name="upload" id="select-file" >
                    </label>
                    <?php echo $message ?? null ?>
                    <div class="btn-cont">
                        <label class="select-img-btn" for="select-file">Select Image</label>
                        <input id="change-btn" type="submit" name="change" value="Change">
                    </div>
                </form>
            </div>
            <!-- form to update or insert user info -->
            <form action="" method="POST">
                <div class="info-sect">
               
                    <div class="split-row">
                        <span>
                            <label for="">First Name</label>
                            <input type="text" name="fname" value="<?=$UserRecord['first_name'] ?? ''?>">
                        </span>
                        <span style="margin-left: -1rem;">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" value="<?=$UserRecord['last_name'] ?? ''?>">
                        </span>
                    </div>
                    <div class="info-sect-row">
                        <label for="">Full Name</label>
                        <input type="text" name="fullname" value="<?=$UserRecord['fullname'] ?? ''?>">
                    </div>
                    <div class="info-sect-row">
                        <label for="">Email</label>
                        <input disabled type="text" name="" id="" value="<?=$user['email'] ?? ''?>">
                    </div>
                    <div class="info-sect-row">
                        <label for="">Phone Number</label>
                        <input type="text" name="number" id="" value="<?=$UserRecord['phone_number'] ?? ''?>">
                    </div>
                    <div class="info-sect-row">
                        <label for="">Address</label>
                        <input type="text" name="address" id="" value="<?=$UserRecord['address'] ?? ''?>">
                    </div>
                    <div class="info-sect-row">
                        <label id="label-location-info" for="location-info">Additional Info</label>
                        <textarea 
                        spellcheck="false" 
                        placeholder="Addtional info about your Address" 
                        name="additional-info" 
                        id="location-info" 
                        cols="30" 
                        rows="5"
                        ><?=$UserRecord['additional_info'] ?? ''?></textarea>
                    </div>
                    <div class="info-sect-row">
                        <span></span>
                        <button id="save-btn" type="submit" name="save">Save</button>
                    </div>
                </div>
            </form>
        </div>
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