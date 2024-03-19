<?php
include_once('connection.php');
function getuserdetailsbyemail()
{
	global $con;
	$sql="SELECT * FROM `users` WHERE `customer_email`='".mysqli_real_escape_string($con,$_SESSION['email'])."' ";
	$result=$con->mysqli_query($sql);

	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		return $row;
	}
	else
	{
		echo "<script>window.open('login.php?name=VXNlciBMb2dpbg==','_self');</script>";
	}
}

?>