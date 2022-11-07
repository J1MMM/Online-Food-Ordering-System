<?php
    $user_record = $mysqli->query("SELECT users.pfp_path, users.id, users.first_name, users.last_name, users.email, address.fullname, address.phone_number, address.address, address.additional_info FROM users, address WHERE users.id = '{$user['id']}' AND address.user_id ='{$user['id']}'"); 
    $UserRecord = mysqli_fetch_array($user_record, MYSQLI_ASSOC);    
    // print_r($UserRecord);

    // print_r($user);
    if(isset($_POST['change'])){
        if(!empty($_FILES['upload']['name'])){
            $allowed_ext = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
           
            $file_name = $_FILES['upload']['name'];
            $file_size = $_FILES['upload']['size'];
            $file_tmp = $_FILES['upload']['tmp_name'];
            
            // Get file extension
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
            $file_name = "{$user['id']}-pfp.webp";

            $target_dir = "assets/images/pfp/{$file_name}";

            // if(array_filter($allowed_ext, fn($ext) => $ext == $file_ext)){
                if(in_array($file_ext, $allowed_ext)){
                    if($file_size <= 1000000){ 
                        $message = '<p style="color: #2DA544; margin: 0">File uploaded successfuly</p>';
                        
                        $mysqli->query("UPDATE users SET pfp_path = './assets/images/pfp/{$user['id']}-pfp.webp' WHERE id = '{$user['id']}'");
                        move_uploaded_file($file_tmp, $target_dir);
                        die("<meta http-equiv='refresh' content='0'>");

                        
                    }else{
                        $message = '<p style="color: red; margin: 0">File is too large</p>';
                    }
                }else{
                    $message = '<p style="color: red; margin: 0">Invalid file type</p>';
            }

        }else{
            $message = '<p style="color: red; margin: 0">Please choose a file</p>';
        }
        
    }

    if(isset($_POST['save'])){
        $user_id = $user['id'];
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
        $phone_num = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $addressInfo = filter_input(INPUT_POST, 'additional-info', FILTER_SANITIZE_STRING);
        
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);


        //update or insert user info
        if($user_record->num_rows){
            $mysqli->query("UPDATE address SET fullname='$fullname', phone_number='$phone_num', address='$address', additional_info='$addressInfo' WHERE user_id='$user_id'"); 
            $mysqli->query("UPDATE users SET first_name='$fname', last_name='$lname' WHERE id='$user_id'"); 
            die("<meta http-equiv='refresh' content='0'>");
        }else{
            $mysqli->query("INSERT INTO address (user_id, fullname, phone_number, address, additional_info) VALUES ('$user_id','$fullname','$phone_num','$address','$addressInfo')"); 
            die("<meta http-equiv='refresh' content='0'>");
        }
    }

?>

<script>
    <?php include './js/scroll.js'?>
</script>
<style>
    <?php include './css/user-page.css'?>
</style>
