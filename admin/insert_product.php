<!DOCTYPE>
<?php
include("../connection.php");
?>
<html>
<head>
  <title>Admin Area | Insert-Product</title>
  <?php include "top_scripts.php";?>
  <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
  <script>
    tinymce.init({selector: 'textarea'});
  </script>
</head>
<body>

  <div class="contaier">
    <div class="panel panel-default panel-box-shadow">
      <!-- Default panel contents -->
      <div class="panel-heading main_bg_color"><i class="fa fa-plus"></i> Insert Product</div>
      <div class="panel-body">

        <form action="insert_product.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label>Product Title</label>
            <input type="text" name="product_name" class="form-control" placeholder="Product Name" required="">
          </div>


          <div class="form-group">
            <label>Product Category</label>
            <select class="form-control" name="product_cat">
              <option>Select a Category.... </option>
              <?php
              $get_cats = "select * from categories";

              $run_cats = mysqli_query($con, $get_cats);

              while ($row_cats = mysqli_fetch_array($run_cats)) {

                $cat_id = $row_cats['cat_id'];
                $cat_title = $row_cats['cat_title'];

                echo "<option value='$cat_id'>$cat_title</option>";
              } ?>
            </select>
          </div>

          <div class="form-group">
           <label>Product Brand</label>
           <select class="form-control" name="product_brand">
            <option>Select a Brand....</option>
            <?php
            $get_brands = "select * from brands";

            $run_brands = mysqli_query($con, $get_brands);

            while ($row_brands = mysqli_fetch_array($run_brands)) {

              $brand_id = $row_brands['brand_id'];
              $brand_title = $row_brands['brand_title'];

              echo "<option value='$brand_id'>$brand_title</option>";
            } ?>

          </select>
        </div>


        <div class="form-group">
          <label>Product Image</label>
          <input type="file" class="form-control" name="product_image">
        </div>



        <div class="form-group">
          <label>Product Price</label>
          <input type="text" class="form-control" name="product_price" required="">
        </div>

        <div class="form-group">
          <label>Product Quantity</label>
          <input type="text" class="form-control" name="product_qty" required="">
        </div>

        <div class="form-group">
          <label>Product Description</label>
          <textarea name="product_desc" cols="20" rows="10"></textarea>
        </div>

        <div class="form-group">
          <label>Product Keywords</label>
          <input type="text" class="form-control" name="product_keywords" required="">
        </div>

        <input type="submit" class="btn btn-success" name="insert_post" value="Insert Product">
      </form>
    </div>
  </div>
</div>
</body>
</html>

<?php

if (isset($_POST['insert_post'])) {

    //getting the text data from the fields
  $product_title = $_POST['product_name'];
  $product_cat = $_POST['product_cat'];
  $product_brand = $_POST['product_brand'];
  $product_price = $_POST['product_price'];
  $product_qty = $_POST['product_qty'];
  $product_desc = $_POST['product_desc'];
  $product_keywords = $_POST['product_keywords'];

   //getting the image from the field
  $product_image = $_FILES['product_image']['name'];
  $product_image_tmp = $_FILES['product_image']['tmp_name'];

  move_uploaded_file($product_image_tmp, "product_images/$product_image");

  $insert_product = "insert into items (product_cat,product_brand,product_name,product_price,product_desc,product_image,product_keywords,product_qty) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords',$product_qty)";

  $insert_pro = mysqli_query($con, $insert_product);

  if ($insert_pro) {

    echo "<script>alert('Product Has been inserted!')</script>";
    echo "<script>window.open('index.php?insert_product','_self')</script>";

  }
}

?>





