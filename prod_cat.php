<?php
require 'connection.php';
session_start();
include_once('view.php');
?>
<?php
$cat_id=getcategorydeatilsbyid($_GET['type']);
?>
<!DOCTYPE html>
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
                require 'header.php';?>

			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="container">
					<ul class="nav navbar-nav nav_1">
						<?php
							viewcategories();
						?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<!-- //banner -->
<div class="container">
				<h3><?php echo $cat_id['cat_title']; ?></h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">

					<?php viewproductbycategory($_GET['type']); ?>

					<div class="clearfix"> </div>
				</div>
				
			</div>
            <br><br><br><br><br><br><br><br>
           <footer class="footer">
                <center>
                <p>Copyright &copy Mhounes Vape Shop All Rights Reserved.</p>
                   <p>Made by Group 3 of BSCSA81</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
