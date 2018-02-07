<?php
session_start();
if(isset($_SESSION["manager"])){
  header("location:inventory_list.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale=1, maximum-scale=1.0>
    <title>Store</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
		<script src="../js/jquery2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="main_admin.js"></script>
  </head>
  <body>
    <p><br/></p>
  	<p><br/></p>
  	<p><br/></p>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1"></div><!--Left Space-->
        <div class="col-md-10">
          <div class="panel panel-primary">
            <div class="panel-heading">Admin Login</div>
            <div class="panel-body">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" required/>
              <label for="email">Password</label>
              <input type="password" class="form-control" id="password" required/>
              <p><br/></p>
              <input type="submit" class="btn btn-success" style="float:right;" id="admin_log" value="Login">
            </div>
            <div class="panel-footer" id="e_msg"></div>
          </div>
        </div>
        <div class="col-md-1"></div><!--Right Space-->
      </div>
    </div><!--Container Ends-->
  </body>
</html>
