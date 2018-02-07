<?php
include "dbscripts/connection.php";
session_start();

//Populate category list
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}

//Get Products
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = "../display_images/$pro_id.jpg";
			echo "
				<div class='col-md-4'>
							<div class='panel panel-primary'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;' id='no_download'/>
								</div>
								<div class='panel-heading'>Rs.$pro_price.00<hr/>
									<button pid='$pro_id' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
									<a href='product_page.php?id=$pro_id'class='btn btn-success btn-xs'>View</a>
								</div>
							</div>
						</div>
			";
		}
	}else{
		echo "
		<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>No Product to Display..!</b>
				</div>
		";
	}
}
//Get no. of pages
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
//Get product from selected category
if(isset($_POST["get_seleted_Category"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keyword LIKE '%$keyword%'";
	}

	$run_query = mysqli_query($con,$sql);
	if($run_query && mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = "../display_images/$pro_id.jpg";
			echo "
				<div class='col-md-4'>
							<div class='panel panel-primary'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;' id='no_download'/>
								</div>
								<div class='panel-heading'>Rs.$pro_price.00<hr/>
									<button pid='$pro_id' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
									<a href='product_page.php?id=$pro_id'class='btn btn-success btn-xs'>View</a>
								</div>
							</div>
						</div>
			";
		}
	}else{
		echo "
		<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>No Product to Display in This Category..!</b>
				</div>
		";
	}
	}
//Add to cart
	if(isset($_POST["addToProduct"])){
		if(isset($_SESSION["uid"])){
			$p_id = $_POST["proId"];
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE product_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";
		} else {
			$sql = "INSERT INTO `cart`
			(`cart_id`, `product_id`, `user_id`, `isInCart`)
			VALUES (NULL, '$p_id', '$user_id', 1)";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Sorry..!go and Sign Up First then you can add a product to your cart</b>
					</div>
				";
		}
	}
//Get no. of product in cart
	if(isset($_POST["cart_count"]) AND isset($_SESSION["uid"])){
		$uid = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE user_id = '$uid' AND isInCart = 1";
		$run_query = mysqli_query($con,$sql);
		echo mysqli_num_rows($run_query);
	}
//Get products in cart
	if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){
		$uid = $_SESSION["uid"];
		$cart_sql = "SELECT * FROM cart WHERE user_id = '$uid' AND isInCart = 1";
		$run_query = mysqli_query($con,$cart_sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			$no = 1;
			$total_amt = 0;
			while($row = mysqli_fetch_array($run_query)){
				$id = $row["cart_id"];
				$pro_id = $row["product_id"];

				$product_sql = "SELECT * FROM products WHERE product_id = $pro_id";
				$product_query = mysqli_query($con, $product_sql);
				while($rw = mysqli_fetch_array($product_query)){
					$pro_name = $rw["product_title"];
					$pro_image = "display_images/$pro_id.jpg";
					$pro_price = $rw["product_price"];
				}/*while loop for product*/

				$price_array = array($pro_price);
				$total_sum = array_sum($price_array);
				$total_amt = $total_amt + $total_sum;
				//setcookie("ta",$total_amt,strtotime("+1 day"),"/","","",TRUE);
				if(isset($_POST["get_cart_product"])){
					echo "
					<div class='row'>
						<div class='col-md-3 col-xs-3'>$no</div>
						<div class='col-md-3 col-xs-3'><img src='$pro_image' width='60px' height='50px' id='no_download'></div>
						<div class='col-md-3 col-xs-3'>$pro_name</div>
						<div class='col-md-3 col-xs-3'>Rs.$pro_price.00</div>
					</div><hr/>
				";
				$no = $no + 1;
			}/*Cart dropdown*/
			else{
					echo "
						<div class='row'>
								<div class='col-md-2 col-sm-2'>
									<a href='#' remove_id='$pro_id' class='btn btn-danger btn-lg remove'><span class='glyphicon glyphicon-trash'></span></a>
								</div>
								<div class='col-md-2 col-sm-2'><img src='$pro_image' width='50px' height='60px' id='no_download'></div>
								<div class='col-md-2 col-sm-2'>$pro_name</div>
								<div class='col-md-2 col-sm-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='1' disabled></div>
								<div class='col-md-2 col-sm-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
								<div class='col-md-2 col-sm-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$pro_price' disabled></div>
						</div><hr/>
					";
				}/*Check out page*/
			}/*while loop for cart*/
			if(isset($_POST["cart_checkout"])){
				echo "
					<div class='row'>
					<div class='col-md-8'></div>
					<div class='col-md-4'>
						<h1>Total Rs$total_amt</h1><br/>
						<form action='pay.php' method='POST'>
							<input type='hidden' name='totalAmt' value='$total_amt'>
							<input type='submit' value='PAY NOW' class='btn btn-lg btn-danger'>
						</form>
					</div>
					";
			}
			//paypal check_out button
		}/*Count > 0 loop*/
	}
//Remove product from cart
	if(isset($_POST["removeFromCart"])){
		$pid = $_POST["removeId"];
		$uid = $_SESSION["uid"];
		$sql = "DELETE FROM cart WHERE user_id = '$uid' AND product_id = '$pid'";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is Removed from Cart Continue Shopping..!</b>
				</div>
			";
		}
	}
//Get ordered products
	if(isset($_POST["getOrder"])){
		$uid = $_SESSION["uid"];
		$order_sql = "SELECT * FROM cart WHERE user_id = '$uid' AND isInCart = 0";//isInCart = 0
		$run_query = mysqli_query($con,$order_sql);
		$count = mysqli_num_rows($run_query);
		if($count>0){
			while($row=mysqli_fetch_array($run_query)){
				$id = $row["cart_id"];
				$pro_id = $row["product_id"];

				$product_sql = "SELECT * FROM products WHERE product_id = $pro_id";
				$product_query = mysqli_query($con, $product_sql);
				while($rw = mysqli_fetch_array($product_query)){
					$pro_name = $rw["product_title"];
					$pro_image = "display_images/$pro_id.jpg";
					$pro_credit = $rw["photo_credit"];
				}/*while loop for product*/

				echo "
				<div class='row'>
					<div class='col-md-6'>
						<img style='float:right; height:150px; width:300px;' src=$pro_image class='img-thumbnail' id='no_download'/>
					</div>
					<div class='col-md-6'>
						<table>
							<tr><td>Photo Name</td><td><b>$pro_name</b> </td></tr>
							<!--<tr><td>Price</td><td><b>Rs.</b></td></tr>-->
							<tr><td>Credit</td><td><b>$pro_credit</b></td></tr>
							<tr><td>
							<a target='_blank' href='Images/$pro_id.jpg' style='float:right;' id='download_button' class='btn btn-success btn-lg'>Download</a>
							</td></tr>
						</table>
					</div>
				</div><hr/>
				";
			}
		}else{
			echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>No Product to show..!</b>
			</div>
			";
		}
	}

?>