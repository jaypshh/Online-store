<?php
    require 'connection.php';
    //require 'header.php';
    session_start();
    $item_id=$_GET['prod_id'];
    $user_id=$_SESSION['id'];
    $add_to_cart_query="insert into users_items(customer_id,item_id,status,item_qty) values ('$user_id','$item_id','Added to cart','1')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    
    header('location: cart.php');
?>