<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }  
    $old_password= md5(md5(mysqli_real_escape_string($con,$_POST['oldPassword'])));
    $new_password= md5(md5(mysqli_real_escape_string($con,$_POST['newPassword'])));
    $email=$_SESSION['email'];
    //echo $email;
    $password_from_database_query="select customer_pass from users where customer_email='$email'";
    $password_from_database_result=mysqli_query($con,$password_from_database_query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($password_from_database_result);
    //echo $row['password'];
    if($row['customer_pass']==$old_password){
        $update_password_query="update users set customer_pass='$new_password' where customer_email='$email'";
        $update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($con));
        echo "Your password has been updated.";
        ?>
        <meta http-equiv="refresh" content="3;url=profile.php" />
        <?php
    }else{
        ?>
        <script>
            window.alert("Wrong Password");
        </script>
        <meta http-equiv="refresh" content="1;url=settings.php" />
        <?php
        //header('location:settings.php');
    }
?>