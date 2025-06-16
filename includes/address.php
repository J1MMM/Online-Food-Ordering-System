<?php
if(isset($_POST['submit'])){
    $user_id = $user['id'];
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $phone_num = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $addressInfo = filter_input(INPUT_POST, 'additional-info', FILTER_SANITIZE_STRING);

    $mysqli->query("INSERT INTO address (user_id, fullname, phone_number, address, additional_info) VALUES ('$user_id','$fullname','$phone_num','$address','$addressInfo')"); 
    header('Location: index.php?page=cart-list');
}
?>

<script>
    <?php include 'js/scroll.js'?>
</script>
<style>
    <?php include './css/address.css'?>
</style>