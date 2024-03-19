<!DOCTYPE html>
<html>
<head>
  <title>Admin Area | Insert-Category</title>
  <?php include "top_scripts.php"; ?>
</head>
<body>


  <div class="panel panel-default panel-box-shadow">
    <!-- Default panel contents -->
    <div class="panel-heading main_bg_color"><i class="fa fa-plus"></i> Insert Category</div>
    <div class="panel-body">
      <!-- Table -->
      <form action="" method="POST">
        <div class="form-group row">
          <div class="col-sm-6 ">
            <input type="text" name="new_cat" class="form-control" placeholder="Enter Category....">
            <br>
            <button class="btn btn-success" type="submit" name="add_cat" >Add Category</button>
          </div>
        </div>
      </form>
    </div>

    <?php
    include("../connection.php");

    if (isset($_POST['add_cat'])) {

      $new_cat = $_POST['new_cat'];

      $insert_cat = "insert into categories (cat_title) values ('$new_cat')";

      $run_cat = mysqli_query($con, $insert_cat);

      if ($run_cat) {

        echo "<script>alert('New Category has been inserted!')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
      }
    }

    ?>

  </div>
</body>
</html>


