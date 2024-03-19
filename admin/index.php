<?php
session_start();

if (!isset($_SESSION['aemail'])) {

  echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";

} 

else {
  ?>
  <!--Data-Base-->
  <?php include "../connection.php"; ?>

  <!DOCTYPE>
  <html>
  <head> 
  <?php include("top_headers.php");?>
  <link rel="shortcut icon" href="../img/mhounes.png" />
  <?php include("top_scripts.php");?>
      </head>

             <body>
    <div class="container">
      <div class="row">
         <!--- Aside-Bar -->
        <div class="col-md-3">
          <div class="list-group panel-box-shadow">
            <a href="index.php" class="list-group-item active main-color-bg">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
            </a>
            <a href="index.php?view_products" class="list-group-item"><i class="fa fa-eye"></i> View Product <span class="badge"> <?php
                        $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM items"));
                        echo $count;
                        ?></span></a>

            <a href="index.php?view_cats" class="list-group-item"><i class="fa fa-eye"></i> View Categories <span class="badge"><?php
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM categories"));
                          echo $count;
                          ?></span></a>

            <a href="index.php?view_brands" class="list-group-item"><i class="fa fa-eye"></i> View Brands <span class="badge"><?php
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM brands"));
                          echo $count;
                          ?></span></a>
            <a href="index.php?view_orders" class="list-group-item"><i class="fa fa-eye"></i> View Orders <span class="badge"><?php
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user_orders"));
                          echo $count;
                          ?></span></a>

            <a href="index.php?view_users" class="list-group-item"><i class="fa fa-eye"></i> View Users <span class="badge"><?php
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users"));
                          echo $count;
                          ?></span></a>



              


            <a href="index.php?insert_cat" class="list-group-item"><i class="fa fa-plus"></i> Insert New Category</a>

            <a href="index.php?insert_brand" class="list-group-item"><i class="fa fa-plus"></i> Insert New Brand</a>

            <a href="index.php?insert_product" class="list-group-item"><i class="fa fa-plus"></i> Insert New Product</a>
          </div>
        </div><!---/Aside-Bar -->


        <!--Main-Content-Area-->
        <div class="col-md-9">
            <div class="panel panel-default panel-box-shadow">
              <div class="panel-heading main_bg_color">
                <h3 class="panel-title ">Overview</h3>
              </div>
              <div class="panel-body">

                <div class="col-md-4 counter-mb">
                  <a class="counter-styling" href="index.php?view_products">
                    <div class="well dash-box">
                      <h2><i class="fa fa-houzz"></i>
                        <?php
                        $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM items"));
                        echo $count;
                        ?></h2>
                        <h4>Products</h4>
                      </div>
                    </a>
                  </div>

                  <div class="col-md-4 counter-mb">
                    <a class="counter-styling" href="index.php?view_cats"> 
                      <div class="well dash-box">
                        <h2><i class="fa fa-list-alt"></i>
                          <?php
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM categories"));
                          echo $count;
                          ?></h2>
                          <h4>Categories</h4>
                        </div>
                      </a>
                    </div>

                    <div class="col-md-4 counter-mb">
                      <a class="counter-styling" href="index.php?view_brands">
                        <div class="well dash-box">
                          <h2><i class="fa fa-bookmark"></i>
                            <?php
                            $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM brands"));
                            echo $count;
                            ?></h2>
                            <h4>Brands</h4>
                          </div>
                        </a>
                      </div>

                      <div class="col-md-4 counter-mb">
                        <a class="counter-styling" href="index.php?view_orders">
                          <div class="well dash-box">
                            <h2><i class="fa fa-shopping-cart"></i>
                              <?php
                              $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user_orders"));
                              echo $count;
                              ?></h2>
                              <h4>Orders</h4>
                            </div>
                          </a>
                        </div>

                      <div class="col-md-4 counter-mb">
                        <a class="counter-styling" href="index.php?view_users">
                          <div class="well dash-box">
                            <h2><i class="fa fa-shopping-cart"></i>
                              <?php
                              $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users"));
                              echo $count;
                              ?></h2>
                              <h4>Customers</h4>
                            </div>
                          </a>
                        </div>


                          </div>
                        </div>        
                      
                      <?php
                      if (isset($_GET['insert_product'])) {

                        include("insert_product.php");
                      }
                      if (isset($_GET['view_products'])) {

                        include("view_products.php");
                      }
                      if (isset($_GET['edit_pro'])) {

                        include("edit_pro.php");
                      }
                      if (isset($_GET['insert_cat'])) {

                        include("insert_cat.php");

                      }
                      if (isset($_GET['view_cats'])) {

                        include("view_cats.php");

                      }
                      if (isset($_GET['edit_cat'])) {

                        include("edit_cat.php");

                      }
                      if (isset($_GET['insert_brand'])) {

                        include("insert_brand.php");

                      }
                      if (isset($_GET['view_brands'])) {

                        include("view_brands.php");
                      }
                      if (isset($_GET['edit_brand'])) {

                        include("edit_brand.php");

                      }
                      if (isset($_GET['view_customers'])) {

                        include("view_customers.php");

                      }
                      if (isset($_GET['view_orders'])) {

                        include("view_orders.php");

                      }
                      if (isset($_GET['view_payments'])) {

                        include("view_payments.php");
                      }
                      if (isset($_GET['view_users'])) {

                        include("view_users.php");
                      }
                      ?>
                    </div><!--/Main-Content-Area--->
                  </div>
                </div>
              </body>
              </html>
              <?php } ?>