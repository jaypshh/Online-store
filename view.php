<?php

function viewcategories()
{
	global $con;
	$sql="SELECT cat_id,cat_title FROM `categories`";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<li><a href='prod_cat.php?type=".($row['cat_id'])."&name=".($row['cat_title'])."'>".$row['cat_title']."</a></li>";
		}
	}
	else
	{
		echo "no banner found";
	}
}

//this function to show category products
function getcategorydeatilsbyid($id)
{
	global $con;
	$sql="SELECT * FROM `categories` WHERE `cat_id`='".$id."'  ";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return $row;
	}
	else{
		echo "<script>window.open('index.php','_self');</script>";
	}
}

function viewproductbycategory($cat)
{
	global $con;
	

	$sql="SELECT items.product_id , categories.cat_id FROM items inner join categories on  items.product_cat = categories.cat_id  where items.product_cat= '".$cat."' ";
	$result=$con->query($sql);
	 	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sql1="SELECT * FROM items WHERE product_id='".$row['product_id']."' ";
			$result1=$con->query($sql1);
			if($result1->num_rows > 0)
			{
				while($row1 = $result1->fetch_assoc())
		{	
				?>
				<div class="col-xs-3">
				<div style="height:auto;" class="thumbnail">
					<?php if($row1['product_image'] != ""):?>  
						<img src="admin/product_images/<?php echo $row1['product_image']; ?>" width="200px" height="100px" alt=''  class='img-responsive'/>
					<?php else: ?>
						 <img src="admin/product_images/noimage.jpg" width="300px" height="200px" alt=''  class='img-responsive'>
					 <?php endif; ?>
						 <div class="caption">
						<h5><b><?php echo $row1['product_name'];?></b></h5>
						<h6><a class="btn btn-success btn-round" title="Click for more details!" href="product_details.php?prod_id=<?php echo $row1['product_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a><medium class="pull-right">₱ <?php echo $row1['product_price']; ?></medium></h6>						 
					</div>
		  		</div>
				</div>
							<?php 
			}	
		
		}
			else
			{
		echo "<script>window.open('index.php','_self');</script>";
			}
	
        }
			}
		
	else{
		echo "<h2 align='center'>No Product Found</h2>";
	}
}




//This Function To Show Search Result 


function SearchResult($keyword)
{
	global $con;
	$sql="SELECT * FROM `items` WHERE `product_name` LIKE '%".$keyword."%' LIMIT 20";
	$res = $con->query($sql);
	if ($res->num_rows > 0) {
		while($row = $res->fetch_assoc()) {
			
			$prod_id=$row['product_id'];
			if (!isset($_row['product_id']))

			{ ?>

				<div class="col-xs-3">
				<div style="height:auto;" class="thumbnail">
			<?php if($row['product_image'] != ""):?>  
				<img src="admin/product_images/<?php echo $row['product_image']; ?>" width="200px" height="100px" alt=''  class='img-responsive'/>
			
					<?php else: ?>
					 <img src="admin/product_images/noimage.jpg" width="300px" height="200px" alt=''  class='img-responsive'>
					 <?php endif; ?>
				 <div class="caption">
					<h5><b><?php echo $row['product_name'];?></b></h5>
					<h6><a class="btn btn-success btn-round" title="Click for more details!" href="product_details.php?prod_id=<?php echo $row['product_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a><medium class="pull-right">₱ <?php echo $row['product_price']; ?></medium></h6>
				 </div>
			  </div>
			</div> 
		 <?php } 

			
					}
	}
	else
	{
		echo "<h2 align='center'>No Match Found In This Keyword -- '".$keyword."'</h2>";
	}
}

?>