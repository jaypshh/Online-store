<?php
include("../connection.php");

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];


    $delete_query = "delete from feedback where feedback_id='$delete_id'";

    $run_delete = mysqli_query($con, $delete_query);

    if ($run_delete) {

        echo "<script>alert('A Feedback has been deleted!')</script>";
        echo "<script>window.open('index.php?view_feedbacks','_self')</script>";
    }

}


?>