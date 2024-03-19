<!DOCTYPE html>
<html>
<head>
  <title>Admin Area | Insert-Brand</title>
  <?php include "top_scripts.php"; ?>
</head>
<body>
  
  <div class="panel panel-default panel-box-shadow">
    <!-- Default panel contents -->
    <div class="panel-heading main_bg_color"><i class="fa fa-plus"></i> Insert Brand</div>

    <div class="panel-body">
      <!-- Table -->
      <form action="" method="POST">
        <div class="form-group">
          <div class="col-sm-6">
            <input type="text" name="new_brand" class="form-control" placeholder="Enter Brand....">
            <br>
            <button class="btn btn-success" type="submit" name="add_brand" >Add Brand</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  <?php
  include("../connection.php");

  if (isset($_POST['add_brand'])) {

    $new_brand = $_POST['new_brand'];

    $insert_brand = "insert into brands (brand_title) values ('$new_brand')";

    $run_brand = mysqli_query($con, $insert_brand);

    if ($run_brand) {

      echo "<script>alert('New Brand has been inserted!')</script>";
      echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
  }

  ?>

</body>
</html>


