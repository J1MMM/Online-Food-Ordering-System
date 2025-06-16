<footer>
    <form class="footer-form">
        <h4>SUBSCRIBE TO STAY UPDATED</h4>
        <input type="email" placeholder="your email address here" required>
        <span>
            <input type="checkbox" name="" id="cb" required>
            <label for="cb">I want to receive news & updates</label>
        </span>
        <button>SUBSCRIBE</button>
    </form>

    <div class="footer-nav">
        <a class="<?= isset($_GET['page']) && $_GET['page'] == 'about' ? 'active' : '' ?>" href="index.php?page=about#team">OUR TEAM</a>
        <a class="<?= isset($_GET['page']) && $_GET['page'] == 'contact' ? 'active' : '' ?>" href="index.php?page=contact">CONTACT US</a>
        <a class="<?= isset($_GET['page']) && $_GET['page'] == 'location' ? 'active' : '' ?>" href="index.php?page=location">LOCATIONS</a>
        <a class="<?= isset($_GET['page']) && $_GET['page'] == 'site-map' ? 'active' : '' ?>" href="index.php?page=site-map">SITE MAP</a>
        <a class="<?= isset($_GET['page']) && $_GET['page'] == 'privacy-policy' ? 'active' : '' ?>" href="index.php?page=privacy-policy">PRIVACY POLICY</a>
        <a class="<?= isset($_GET['page']) && $_GET['page'] == 'tnc' ? 'active' : '' ?>" href="index.php?page=tnc">TERMS & CONDITIONS</a>
    </div>

    <div class="footer-logo">
        <img src="./assets/images/logo.png" alt="" draggable="false">
    </div>

    <div class="footer-fs">
        <h4>FOLLOW US</h4>       
        <span>
        © 2022 Jopay's Kitchen. All Rights Reserved | DedSec
        </span>
    </div>
</footer>
