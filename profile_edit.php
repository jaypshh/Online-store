<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }  
    $id=(mysqli_real_escape_string($con,$_POST['txtCustomerID']));
    $oname= (mysqli_real_escape_string($con,$_POST['cname']));
    $oemail= (mysqli_real_escape_string($con,$_POST['cemail']));
    $ocontact= (mysqli_real_escape_string($con,$_POST['ccontact']));
    $oaddress= (mysqli_real_escape_string($con,$_POST['caddress']));
    $email=$_SESSION['email'];
    //echo $email;
    $query="select * from users where customer_email='$email'";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($result);
    //echo $row['password'];
    if($row['customer_id']==$id){
        $update="UPDATE `users` SET `customer_name`='$oname',`customer_contact`='$ocontact',`customer_address`='".mysqli_real_escape_string($con,$_POST['caddress'])."' WHERE `customer_id`='".mysqli_real_escape_string($con,$_POST['txtCustomerID'])."'";    
        $update_result=mysqli_query($con,$update) or die(mysqli_error($con));
        echo "<script>alert('Profile Updated');</script>";
        echo "<script>window.open('profile.php?name=TXkgQWNjb3VudA==','_self');</script>";
        }else{
        ?>
        <script>
            window.alert("Wrong Query!");
        </script>
        <meta http-equiv="refresh" content="1;url=settings.php" />
        <?php
        //header('location:settings.php');
    }
?>