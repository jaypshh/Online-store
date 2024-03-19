<?php
    session_start();
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <?php require "header.php"; ?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
       
</head>
    <br>
    <div class="section section-basic">
     <div class="container">
     <div class="col-md-12">
     <div class="row justify-content-center">
    		
    				<div class="panel-heading"><h2>Product Details<h2></div>
	                </div><div class="col-8">
                    
<?php
    include('connection.php');
    $prod_id=$_GET['prod_id'];
    $query = "SELECT * FROM items WHERE product_id='$prod_id'";
    $result = mysqli_query($con,$query);
    while($res = mysqli_fetch_array($result)) {  
    
?>   
                
               
        <br><br>
      <ul>
        <img src="admin/product_images/<?php echo $res['product_image']; ?>" width="300px" height="300px"/>
</ul>
        <h5>
       <div class="float">
       <ul><b>Product name: </b> 
        <?php echo $res['product_name']; ?>
        </ul><br>
        <ul><b>Description: </b>
        <?php echo $res['product_desc']; ?>
        </ul><br>
        <ul><b>Price: </b>
        <?php echo '₱'.$res['product_price'].''; ?>
        </ul>
        <ul>
        <?php $prod_qty=$res['product_qty'];?> 
        <?php
        if ($prod_qty==0){
        ?>
         <span style="color:red;">Product Sold Out!</span>   
         <?php
        }else{
       ?>
       <b>Items in stock: </b><?php echo $res['product_qty'];    ?>          
       <div class=but>    
       <?php 
      include('check_if_added.php');
       if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-success btn-round">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart($res['product_id'])){
                                               echo '<a href="#" class=btn btn-success btn-round disabled>Added to cart</a>';
                                            }
                                            else{
                                                ?>
                                                <a href="cart_add.php?prod_id=<?php echo $res['product_id'];?>" class="btn btn-success btn-round" name="add" value="add" class="btn btn-block btr-primary">Add to Cart</a>
                                                <?php 
                                            
                                            }
                                        }
                                        ?>  

             </div>
       </ul>
       <?php 
    }
?>
        <?php }?>
        
</h5>
<br><br><br>
        
       


</div>
</div>
</div>

        <br>
       </div>
        </div>
    </div>
</div>
    </div>
</body>

<br><br> <br><br><br><br>
           <footer class="footer"> 
               <div class="container">
               <center>
               <p>Copyright &copy Mhounes Vape Shop All Rights Reserved.</p>
                   <p>Made by Group 3 of BSCSA81</p>
               </center>
               </div>
</html>