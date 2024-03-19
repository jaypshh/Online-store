<?php
require "connection.php";
session_start();
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
        
            
                 <?php
                require 'header.php';
                 ?>
              <div class="banner">
                  <img src="img/banner.jpg" alt="banner" class="responsive"/>
</div>

    <div class="container">
    <div class="row">            
 
    <div class="panel-heading"><h3><center>Check out our new Products!<h3></center>
    </div></div>
	
                    <?php 
                    $query = "SELECT * FROM items  ORDER BY RAND() DESC LIMIT 20";
                    $result = mysqli_query($con,$query);
                    while($res = mysqli_fetch_array($result)) {  
                    $prod_id=$res['product_id'];                
                     ?>   
                <div class="col-xs-3">
                    <div style="height:auto" class="thumbnail" alt="prodimgs" class="responsive">
                        <?php if($res['product_image'] != ""): ?>
                        <img src="admin/product_images/<?php echo $res['product_image']; ?>" width="300px" height="100px" alt=''  class='img-responsive'/>
                        <?php elseif($res['product_image'] = ""): ?>
                         <img src="admin/product_images/noimage.jpg" width="300px" height="200px" alt=''  class='img-responsive'>
                        <?php endif; ?>
                     <div class="caption">
                        <h5><b><?php echo $res['product_name'];?></b></h5>
                        <h6><a class="btn btn-success btn-round" title="Click for more details!" href="product_details.php?prod_id=<?php echo $res['product_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a><medium class="pull-right"><p align="right">₱ <?php echo $res['product_price'];?></medium></p></h6>
                     </div>
                  </div>
                </div> 
             <?php }?> 
 </div>
            </div>
            <br><br> <br><br><br><br>
           <footer class="footer"> 
               <div class="container">
               <center>
               <p>Copyright &copy Mhounes Vape Shop All Rights Reserved.</p>
                   <p>Made by Group 3 of BSCSA81</p>
               </center>
               </div>
           </footer>
        
    </body>
</html>\