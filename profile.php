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
    <meta name="viewport" content="width=device-width", initial-scale=1, maximum-scale=1.0>
    <title>XplrART</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
  </head>
  <body>
    <?php include("header_profile.php"); ?>
    <!--Parallax Box-->
    <div class="parallax parallax_img1">
      <div class="container">
        <div class="caption_logo">
          <span class="border"><img src="websiteImages/logo.png" style="height: 200px; width: 200px;"/></span>
        </div>
        <div class="caption">
          <span class="border">We Observe to EXPLORE, EXPLORE to SHARE....</span>
        </div>
      </div>
    </div>
    <!--Parallax Ends-->
    <p><br/></p>
  	<p><br/></p>
  	<p><br/></p>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1"></div><!--Left Space-->
        <!--Category Bar-->
        <div class="col-md-2">
          <div id="get_categories"></div><!--Fetch Category Data-->
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
          <div class="row">
            <div class="col-md-12"></div>
            <div id="product_msg"></div><!--Display Message-->
            <!--All Products Panel-->
            <div class="panel panel-primary">
              <div class="panel-heading">All Product</div>
              <div class="panel-body">
                <div id="get_product"></div>
                <!--Dummy Product-->
                <!--<div class="col-md-4">
    							<div class="panel panel-info">
    								<div class="panel-heading">Samsung Galaxy</div>
    								<div class="panel-body">
    									<img src="images/back.JPG" style="width:160px; height:250px;"/>
    								</div>
    								<div class="panel-heading">$.500.00
    									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
    								</div>
    							</div>
    						</div>-->
                <!--Dummy Product End-->
              </div>
              <div class="panel-footer">&copy; XplrART</div>
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