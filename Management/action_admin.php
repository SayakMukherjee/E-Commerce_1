<?php
include "../dbscripts/connection.php";

//Get category list
if(isset($_POST["category"]) || isset($_POST["category_dropdown"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	//Populate category list
	if(isset($_POST["category"])){
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


	//Populate category dropdown
	if(isset($_POST["category_dropdown"])){
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){
				$cid = $row["cat_id"];
				$cat_name = $row["cat_title"];
				echo "
						<option value='$cat_name' cid='$cid'>$cat_name</option>
				";
			}
		}
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
	//$product_query = "SELECT * FROM products";
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
						<div class='panel panel-info'>
							<div class='panel-heading'>$pro_title</div>
							<div class='panel-body'>
								<img src='$pro_image' style='width:160px; height:250px;'/>
							</div>
							<div class='panel-heading'>Rs.$pro_price.00
								<div class='btn-group' style='float:right;'>
									<a class='btn btn-danger btn-xs' id='productEdit' href='inventory_edit.php?pid=$pro_id'>Edit</a>
									<button class='btn btn-danger btn-xs' pid='$pro_id' id='productDelete'>Delete</button>
								</div>
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

//Delete product
if(isset($_POST["deleteProduct"])){
	$p_id = $_POST["pid"];
	$query = "DELETE FROM products WHERE product_id = $p_id";
	$run_query = mysqli_query($con, $query);

	if($run_query){
		$pictodelete = "../display_images/$p_id.jpg";
		$picdelete = "../Images/$p_id.jpg";

		if(file_exists($pictodelete)){
			unlink($pictodelete);
		}
		if(file_exists($picdelete)){
			unlink($picdelete);
		}

		echo "
		<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is Deleted..!</b>
				</div>
		";
	}else{
		echo "
		<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product delete failed..!</b>
				</div>
		";
	}
}
//Get products from category
if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";

		$run_query = mysqli_query($con,$sql);
		if(mysqli_num_rows($run_query)>0){
			while($row=mysqli_fetch_array($run_query)){
				$pro_id    = $row['product_id'];
				$pro_cat   = $row['product_cat'];
				$pro_title = $row['product_title'];
				$pro_price = $row['product_price'];
				$pro_image = "../display_images/$pro_id.jpg";
				echo "
				<div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$pro_title</div>
							<div class='panel-body'>
								<img src='$pro_image' style='width:160px; height:250px;'/>
							</div>
							<div class='panel-heading'>Rs.$pro_price.00
								<div class='btn-group' style='float:right;'>
									<a class='btn btn-danger btn-xs' id='productEdit' href='inventory_edit.php?pid=$pro_id'>Edit</a>
									<button class='btn btn-danger btn-xs' pid='$pro_id' id='productDelete'>Delete</button>
								</div>
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

?>
