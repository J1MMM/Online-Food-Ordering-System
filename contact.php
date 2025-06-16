<?php include "./includes/contact.php" ?>

<section class="contact-page">
    <div class="left-container">
        <div class="wrapper">
            <h1>PLEASE GET IN TOUCH</h1>
            <p>Get in touch with us through the email address below or via the contact form.</p>
            <p>We will get back to you as soon as possible.</p>
            <i class="ri-mail-send-line"></i>
            <a href="mailto:devjim.emailservice@gmail.com">devjim.emailservice@gmail.com</a>
        </div>
    </div>
    <div class="right-container">
        <form method="POST">
            <label for="">NAME</label>
            <input type="text" placeholder="Your full name" name="name" required>

            <label for="">EMAIL</label>
            <input type="email" placeholder="Email Address" name="email" required>

            <label for="">CONTACT NUMBER</label>
            <input type="text" name="contact" required>

            <label for="">CITY</label>
            <input type="text" placeholder="Your city" name="city" required>

            <label for="">SUBJECT</label>
            <input type="text" placeholder="Party reservation" name="subject" required>

            <label for="">MESSAGE</label>
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your message here" required></textarea>
            <p class="message"><?=$message?></p>
            <button name="submit" type="submit">SUBMIT</button>
        </form>
    </div>
</section>


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
                <img src="./assets/images/Pinakbet.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <img src="./assets/images/Adobong Sitaw.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <img src="./assets/images/Bangus BBQ.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <img src="./assets/images/Bulalo.webp" alt="" draggable="false">
            </li>
            <li class="slide">
                <img src="./assets/images/Ginataang kalabasa.webp" alt="" draggable="false">
            </li>
         
        
        </ul>
    </div>
</section>