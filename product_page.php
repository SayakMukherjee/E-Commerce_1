<?php
session_start();
if(isset($_SESSION["uid"])){
  $head="header_profile.php";
}else{
  $head="header_index.php";
}
?>

<?php
include "dbscripts/connection.php";
$pid = $_GET["id"];
$sql = "SELECT * FROM products WHERE product_id = $pid LIMIT 1";
$run_query = mysqli_query($con, $sql);
if(mysqli_num_rows($run_query)>0){
	while($r=mysqli_fetch_array($run_query)){
		$pro_name = $r["product_title"];
		$pro_price = $r["product_price"];
		$pro_desc = $r["product_description"];
		$pro_image = "display_images/$pid.jpg";
		$pro_credit = $r["photo_credit"];
	}
}else{
	header("location:profile.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>XplrART</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			table tr td {padding:10px;}
			body{
				background-color: #000000;
			}
		</style>
	</head>
<body>
	<?php include($head); ?>?>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div id="product_msg"></div><!--Display Message-->
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
		            <!--Data-->
		            <h1><?php echo $pro_name;?></h1>
						<hr/>
						<div class="row">
							<div class="col-md-6">
								<img style="float:right; height:200px; width:400px;" src=<?php echo $pro_image;?> class="img-thumbnail"/>
							</div>
							<div class="col-md-6">
								<table>
									<tr><td>Name</td><td><b><?php echo $pro_name;?></b> </td></tr>
									<tr><td>Price</td><td><b>Rs.<?php echo $pro_price;?></b></td></tr>
									<tr><td>Credit</td><td><b><?php echo $pro_credit;?></b></td></tr>
									<tr><td>Description</td><td><b><?php echo $pro_desc;?></b></td></tr>
                  					<tr><td><button pid="<?php echo $pid;?>" id="product" class="btn btn-success btn-lg">AddToCart</button></td></tr>
								</table>
							</div>
						</div><hr/>
            		<!--Data End-->
					</div>
					<div class="panel-footer">&copy; XplrART</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
