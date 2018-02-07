<?php
session_start();
if(isset($_SESSION["uid"])){
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
	</head>
<body>
        <style>
			body{
				background-color: #000000;
			}
		</style>
	<?php include('header_index.php'); ?>?>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="fp_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div id="p_msg"></div>
				<div class="panel panel-primary">
					<div class="panel-heading">Forgot Password Form</div>
					<div class="panel-body">

					<form method="post">
					<div class="row">
							<div class="col-md-12">
								<label for="email">Email</label>
                    			<input type="email" id="email" name="email" class="form-control" id="email" required/>
							</div>
					</div>
            		<div class="row">
							<div class="col-md-12">
								<label for="secret_answer">Name your hometown.</label>
								<input type="text" id="secret_answer" name="secret_answer" class="form-control" required/>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="new_password">New Password</label>
								<input type="password" id="new_password" name="new_password" class="form-control" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="repassword">Re-enter New Password</label>
								<input type="password" id="repassword" name="repassword" class="form-control" required/>
							</div>
						</div>



						<p><br/></p>
						<div class="row">
							<div class="col-md-12">
								<input style="float:right;" value="Reset Password" type="button" id="fpass_btn" name="fpass_btn" class="btn btn-success btn-lg">
							</div>
						</div>
						</form>
					</div>
					<div class="panel-footer">&copy; XplrART</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>