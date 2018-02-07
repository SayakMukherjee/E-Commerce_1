<?php
session_start();
if(!isset($_SESSION["uid"])){
  header("location:index.php");
}
//Check whether session data correct with database.
?>
<?php
$uid = $_SESSION["uid"];
$name = $_SESSION["name"];

$error = $_GET["errorcode"];
if($error == 0){

	$msg = "Details not completely filled";

}else if($error == 11 || $error == 12){

	$msg = "Invalid card number";

}else if($error == 2){

	$msg = "Invalid Expiry Month/Year";

}else if($error == 3){

	$msg = "Invalid CVV";

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
	<?php require_once("header_profile.php"); ?>?>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1 style="color:red;">Payment Failed </h1>
						<hr/>
						<p>Hello User,Your payment process failed. Reason: <?php echo $msg;?>.<br/>
						You can continue your Shopping <br/></p>
						<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>