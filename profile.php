<!DOCTYPE html>
<html>
    <head>
 <?php 
 session_start();  require "header.php"; ?>
        <link rel="shortcut icon" href="img/mhounes.png" />
        <title>Mhounes Vape Shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">

<?php
	require_once('connection.php');
	if(!isset($_SESSION['email'])){
        header('location:index.php');
	}  
	 $email=$_SESSION['email'];
	 //echo $email;
	 $query="select * from users where customer_email='$email'";
	 $result=mysqli_query($con,$query) or die(mysqli_error($con));
	 $row=mysqli_fetch_array($result);
  
	?> 
<div style="margin-top: 50px;">&nbsp;</div>

<div class="col-sm-10 col-sm-offset-1">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">My Account</a></li>
    <li><a data-toggle="tab" href="#menu1">Edit Account</a></li>
    <li><a data-toggle="tab" href="#menu2">Change Password</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     <table class="table" style="border:1px solid #5bc0de;">
     	<tr>
     		<td>Name : </td>
      <td><?php echo $row['customer_name']; ?></td>
     	</tr>
	        <tr>
     		<td>Email : </td>
     		<td><?php echo $row['customer_email']; ?></td>
     	</tr>
     	<tr>
     		<td>Phone : </td>
     		<td><?php echo $row['customer_contact']; ?></td>
     	</tr>
     	<tr>
            <td>Address : </td>
            <td><?php echo $row['customer_address']; ?></td>
        </tr>
        <tr>
            <td>City : </td>
            <td><?php echo $row['customer_city']; ?></td>
        </tr>
     </table>
    </div>
<div id="menu1" class="tab-pane fade">
    <form action="profile_edit.php" method="post">
      <table class="table" style="border:1px solid #5bc0de;">
     	<tr>
     		<td>Name : </td>
     		<td> <input type="text" name="cname" required value="<?php echo $row['customer_name']; ?>" style="width: 100%;"></td>
     	</tr>
     	<tr>
     		<td>Email : </td>
     		<td> <input type="text" readonly name="cemail" value="<?php echo $row['customer_email']; ?>" style="width: 100%;"></td>
     	</tr>
     	<tr>
     		<td>Phone : </td>
     		<td> <input type="text" name="ccontact" required value="<?php echo $row['customer_contact']; ?>" style="width: 100%;"></td>
     	</tr>
     	<tr>
     		<td>Billing Address : </td>
     		<td> <input type="text" name="caddress" value="<?php echo $row['customer_address']; ?>" style="width: 100%;"></td>
     	</tr>
        <tr>
            <td>City : </td>
            <td> <input type="text" name="ccity" value="<?php echo $row['customer_city']; ?>" style="width: 100%;"></td>
        </tr>
        
     	<tr>
     		<input type="hidden" name="txtCustomerID"  value="<?php echo $row['customer_id']; ?>">
     	</tr>
     	<tr>
     		<td colspan="2" align="center"> <input type="submit" value="Update Info" class="btn btn-info"  name="btnSubmit"></td>
     	</tr>
     </table>
     </form>
    </div>
    <div id="menu2" class="tab-pane fade">
    <form action="setting_script.php?name=TXkgQWNjb3VudA==" method="post">  
    <table class="table" style="border:1px solid #5bc0de;">
    	<tr>
    		<td class="text-right"> Old Password : </td>
    		<td> <input type="password" class="form-control" name="oldPassword" placeholder="Old Password"> </td>
    	</tr>
    	<tr>
    		<td class="text-right"> New Password : </td>
			<td><input type="password" class="form-control" name="newPassword" placeholder="New Password"></td>
                   	</tr>
			<tr>
			<td class="text-right"> Re-type Password :</td>		   
<td>		   <input type="password" class="form-control" name="retype" placeholder="Re-type new password"></td>
                           </tr>
        <tr align="center">
    		<td colspan="2">       <input type="submit" class="btn btn-info" value="Change">
                           </td>
    	</tr>
    </table>
    </form>
   </div>
  </div><div style="margin-bottom: 50px;">&nbsp;</div>
</div>

</div>


<br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
               <p>Copyright &copy Mhounes Vape Shop All Rights Reserved.</p>
                   <p>Made by Group 3 of BSCSA81</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>