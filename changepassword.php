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
		<title>Store</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
	</head>
<body>
        <style>
			
			body{
				background-color: #000000;
			}
		</style>
	<?php include('header_profile.php'); ?>?>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div id="p_msg"></div>
				<div class="panel panel-primary">
					<div class="panel-heading">Change Password Form</div>
					<div class="panel-body">

					<form method="post">
            <div class="row">
							<div class="col-md-12">
								<label for="old_password">Old Password</label>
								<input type="password" id="old_password" name="old_password" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="new_password">New Password</label>
								<input type="password" id="new_password" name="new_password" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="repassword">Re-enter New Password</label>
								<input type="password" id="repassword" name="repassword" class="form-control">
							</div>
						</div>



						<p><br/></p>
						<div class="row">
							<div class="col-md-12">
								<input style="float:right;" value="Change Password" type="button" id="chngpass_button" name="chngpass_button"class="btn btn-success btn-lg">
							</div>
						</div>
						</form>
					</div>
					<div class="panel-footer">&copy; Store</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>