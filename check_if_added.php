<?php
    
    function check_if_added_to_cart($product_id){
        //session_start();    
        require 'connection.php';
        $user_id=$_SESSION['id'];
        $product_check_query="select * from users_items where item_id='$product_id' and customer_id='$user_id' and status='Added to cart'";
        $product_check_result=mysqli_query($con,$product_check_query) or die(mysqli_error($con));
        $num_rows=mysqli_num_rows($product_check_result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>