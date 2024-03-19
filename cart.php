<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    $user_id=$_SESSION['id'];
    $user_products_query="select it.product_id,it.product_image,it.product_name,it.product_price,ut.item_qty from users_items ut inner join items it on product_id=ut.item_id where ut.customer_id='$user_id'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No items in the cart!!");
        </script>
    <?php
    }else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['product_price']; 
       }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/mhounes.png" />
        <title>Mhounes Vape Shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php 
               require 'header.php';
            ?>
            <br>
	        
	        		
            <div class="container">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 15%">Photo</th>
                            <th style="width: 30%">Item Name</th>
                            <th style="width: 5%">Qty</th>
                            <th style="width: 10%">Price</th>
                            <th style="width: 10% "></th>
                        </tr>
                       <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){
                           
                         ?>
                        <tr>
                        <th>
                    <div class="thumbnail2">
                        <?php if($row['product_image'] != ""): ?>
                        <img src="admin/product_images/<?php echo $row['product_image']; ?>" width="10px" height="10px"/>
                        <?php else: ?>
                         <img src="admin/product_images/noimage.jpg" width="300px" height="200px">
                         <?php endif; ?>
                     
                        
                        
                        </th>
                        <th><?php echo $row['product_name']?></th><th><?php echo $row['item_qty']?></th><th>₱ <?php echo $row['product_price'] ?></th>
                            <th><a href='cart_remove.php?id=<?php echo $row['product_id'] ?>'>Remove</a></th>
                        </tr>
                       <?php $counter=$counter+1;}?>          
           
                        <tr>
                       <th></th><th>Total</th><th></th><th>₱ <?php echo $sum;?></th>
                            <th>
 <a href="checkout.php?id=<?php echo $row['id'];?>" class="btn btn-success btn-round" name="add" value="add" class="btn btn-block btr-primary">Checkout</a>
</th>

                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
            <footer class="footer">
               <div class="container">
                <center>
                <p>Copyright &copy Mhounes Vape Shop All Rights Reserved.</p>
                   <p>Made by Group 3 of BSCSA81</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
