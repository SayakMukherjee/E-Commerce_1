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
		</style>
	</head>
<body>
        <style>
			
			body{
				background-color: #000000;
			}
		</style>
	<?php include("header_profile.php"); ?>?>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div id="msg"></div>
				<div class="panel panel-primary">
					<div class="panel-heading"></div>
					<div class="panel-body">
            <h1>Order details</h1>
						<hr/>
						<div id="get_orders"></div>
            <!--Dummy Data-->
						<!--<div class="row">
							<div class="col-md-6">
								<img style="float:right;" src="websiteImages/back.jpg" class="img-thumbnail"/>
							</div>
							<div class="col-md-6">
								<table>
									<tr><td>Product Name</td><td><b>Sony Camera</b> </td></tr>
									<tr><td>Product Price</td><td><b>$500</b></td></tr>
									<tr><td>Credit</td><td><b>Mr. Photographer</b></td></tr>
                  <tr><td><input value="Download" type="button" id="download_button" name="download_button"class="btn btn-success btn-lg"></td></tr>
								</table>
							</div>
						</div><hr/>-->
            <!--Dummy Data End-->
					</div>
					<div class="panel-footer">&copy; XplrART</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>