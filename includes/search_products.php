<?php
    //search products
    if(isset($_POST['search'])){
        $key_word = filter_input(INPUT_POST, 'keyword', FILTER_SANITIZE_STRING);
        $qry = $mysqli->query("SELECT * FROM products WHERE food_name LIKE '%$key_word%'");
        $product_data = mysqli_fetch_all($qry, MYSQLI_ASSOC); 
            
        // for auto scroll to results
        echo '<script>
                setTimeout(() => {
                    window.scrollTo(0, 420);
                }, 300)
            </script>';
    }
?>