<!DOCTYPE html>
<html>
<head>
  <title>Admin Area | Edit-Category</title>
</head>
<body>
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading main_bg_color">Edit Category</div>
    <div class="panel-body">

      <?php

     require "../connection.php";
      if (isset($_GET['edit_cat'])) {

        $cat_id = $_GET['edit_cat'];

        $get_cat = "select * from categories where cat_id='$cat_id'";

        $run_cat = mysqli_query($con, $get_cat);

        $row_cat = mysqli_fetch_array($run_cat);

        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];
      }
      ?>

      <form action="" method="POST">
        <div class="form-group row">
          <div class="col-sm-6 ">
            <input type="text" name="new_cat" class="form-control" value="<?php echo $cat_title; ?>">
            <br>
            <button class="btn btn-success" type="submit" name="update_cat" >Update Category</button>
          </div>
        </div>
      </form>


      <?php
      if (isset($_POST['update_cat'])) {

        $update_id = $cat_id;

        $new_cat = $_POST['new_cat'];

        $update_cat = "update categories set cat_title='$new_cat' where cat_id='$update_id'";

        $run_cat = mysqli_query($con, $update_cat);

        if ($run_cat) {

          echo "<script>alert(' Category has been updated!')</script>";
          echo "<script>window.open('index.php?view_cats','_self')</script>";
        }
      }

      ?>
    </div>
  </div>

</body>
</html>

