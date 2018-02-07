<?php
session_start();
if(!isset($_SESSION["manager"])){
  header("location:adminlogin.php");
  exit();
}
//Check if correct session data is available with database
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
    <?php require_once("adminHeader.php") ?>
  	<p><br/></p>
    <p><br/></p>
    <p><br/></p>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1"></div><!--Left Space-->
        <!--Category Bar-->
        <div class="col-md-2">
          <div id="get_category"></div><!--Fetch Category Data-->
          <!--Dummy Category-->
          <!--<div class="nav nav-pills nav-stacked">
  					<li class="active"><a href="#"><h4>Categories</h4></a></li>
  					<li><a href="#">Categories</a></li>
  					<li><a href="#">Categories</a></li>
  					<li><a href="#">Categories</a></li>
  					<li><a href="#">Categories</a></li>
  				</div>-->
          <!--Dummy Category End-->
        </div>
        <!--Category Ends-->
        <!--All Product Display Space-->
        <div class="col-md-8">
          <div class="col-md-12" id="product_msg"></div><!--Display Message-->
          <div class="row">
            <!--All Products Panel-->
            <div class="panel panel-info">
              <div class="panel-heading">All Product</div>
              <div class="panel-body">
                <div id="get_product"></div>
                <!--Dummy Product-->
                <!--<div class="col-md-4">
    							<div class="panel panel-info">
    								<div class="panel-heading">Samsung Galaxy</div>
    								<div class="panel-body">
    									<a href="product_page.php"><img src="../websiteImages/back.JPG" style="width:200px; height:120px;"/></a>
    								</div>
    								<div class="panel-heading">$.500.00
                      <div class="btn-group" style="float:right;">
                        <button class="btn btn-danger btn-xs">Edit</button>
                        <button class="btn btn-danger btn-xs">Delete</button>
                      </div>
    								</div>
    							</div>
    						</div>-->
                <!--Dummy Product End-->
              </div>
              <div class="panel-footer">&copy; Store</div>
            </div><!--All Product Panel End-->
          </div>
        </div><!--Product Display Space End-->
        <div class="col-md-1"></div><!--Right Space-->
      </div>
      <!--Pagination-->
      <div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<!--<li><a href="#">1</a></li>-->
					</ul>
				</center>
			</div>
		</div>
    <!--Pagination-->
    </div><!--Container Ends-->
  </body>
</html>
