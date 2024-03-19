<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <ul class="nav navbar-nav navbar-left">
  
               <li><a href="index.php" class="navbar-brand">Mhounes Vape Shop</a></li>
                           
    
                   </div>
                   </ul>

                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['email'])){
                           ?> 
   
							       <li style="width:200px; left:-10px; top:12px;">	<div class="w3l_search">
			<form action="search.php" method="get">
				<input type="text" name="search" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
			</form>
		</div></li>
                <li><a href="products.php"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
                   
                          <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>

    
                           <li><a href="profile.php?id="><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                           <?php
                           }else{
                            ?>
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                           <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                           <?php
                           }
                           ?>
                       </ul>
                   </div>
               </div>
</nav>
