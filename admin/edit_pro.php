<!DOCTYPE html>
<html>
<head>
	<title>Admin Area | Edit-Product</title>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>
		tinymce.init({selector: 'textarea'});
	</script>
</head>
<body>

	<?php

	require "../connection.php" ;

	if (isset($_GET['edit_pro'])) {

		$get_id = $_GET['edit_pro'];

		$get_pro = "select * from items where product_id='$get_id'";

		$run_pro = mysqli_query($con, $get_pro);

		$i = 0;

		$row_pro = mysqli_fetch_array($run_pro);

		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_name'];
		$pro_image = $row_pro['product_image'];
		$pro_price = $row_pro['product_price'];
		$pro_qty = $row_pro['product_qty'];
		$pro_desc = $row_pro['product_desc'];
		$pro_keywords = $row_pro['product_keywords'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];

		$get_cat = "select * from categories where cat_id = '$pro_cat'";

		$run_cat = mysqli_query($con, $get_cat);

		$row_cat = mysqli_fetch_array($run_cat);

		$category_title = $row_cat['cat_title'];
		$get_brand = "select * from brands where brand_id = '$pro_brand'";

		$run_brand = mysqli_query($con, $get_brand);

		$row_brand = mysqli_fetch_array($run_brand);

		$brand_title = $row_brand['brand_title'];
	}
	?>


	<div class="panel panel-default">
		<div class="panel-heading main_bg_color">
			<h3 class="panel-title">Edit Product</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Product Title</label>
					<input type="text" name="product_name" class="form-control" placeholder="Product Title" required  value="<?php echo $pro_title; ?>"/>
				</div>


				<div class="form-group">
					<label>Product Category</label>
					<select class="form-control" name="product_cat">
						<option><?php echo $category_title; ?></option>
						<?php
						$get_cats = "select * from categories";

						$run_cats = mysqli_query($con, $get_cats);

						while ($row_cats = mysqli_fetch_array($run_cats)) {

							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];

							echo "<option value='$cat_id'>$cat_title</option>";
						}
						?>
					</select>
				</div>


				<div class="form-group">
					<label>Product Brand</label>
					<select class="form-control" name="product_brand">
						<option><?php echo $brand_title; ?></option>
						<?php
						$get_brands = "select * from brands";

						$run_brands = mysqli_query($con, $get_brands);

						while ($row_brands = mysqli_fetch_array($run_brands)) {

							$brand_id = $row_brands['brand_id'];
							$brand_title = $row_brands['brand_title'];

							echo "<option value='$brand_id'>$brand_title</option>";

						}

						?>

					</select>
				</div>



				<div class="form-group" height="20px" margin-bottom:20px;>
					<label>Product Image</label>
					<input type="file" class="form-control" name="product_image"> <br><img src="http://localhost/Mhounes%20Vape%20Shop/admin/product_images/<?php echo $pro_image; ?>" width="300"
					height="200"/>
				</div>


				<div class="form-group">
					<label>Product Price</label>
					<input type="text" class="form-control" name="product_price" required value="<?php echo $pro_price; ?>">
				</div>

				<div class="form-group">
					<label>Product Quantity</label>
					<input type="text" class="form-control" name="product_qty" required value="<?php echo $pro_qty; ?>">
				</div>

				<div class="form-group">
					<label>Product Description</label>
					<textarea name="product_desc" cols="20" rows="10"><?php echo $pro_desc; ?></textarea>
				</div>

				<div class="form-group">
					<label>Product Keywords</label>
					<input type="text" class="form-control" name="product_keywords" required="" value="<?php echo $pro_keywords; ?>">
				</div>

				<input type="submit" class="btn btn-success" name="update_product" value="Update Product">
			</form>
		</div>
	</div>
	<?php

	if (isset($_POST['update_product'])) {

    //getting the text data from the fields

		$update_id = $pro_id;

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

		$update_product = "update items set product_cat='$product_cat',product_brand='$product_brand',product_name='$product_title',product_price='$product_price',product_qty='$product_qty',product_desc='$product_desc',product_image='$product_image', product_keywords='$product_keywords' where product_id='$update_id'";

		$run_product = mysqli_query($con, $update_product);

		if ($run_product) {

			echo "<script>alert('Product has been updated!')</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";

		}
	}


	?>




</body>
</html>

