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
    <meta name="viewport" content="width=device-width", initial-scale=1, maximum-scale=1.0>
    <title>XplrART</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
  </head>
  <body>
    <!--Loader-->
    <div id = "Loader">
      <svg width="100" height="100" viewBox="0 0 30 30" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <path d="M0,15.089434 C0,16.3335929 5.13666091,24.1788679 14.9348958,24.1788679 C24.7325019,24.1788679 29.8697917,16.3335929 29.8697917,15.089434 C29.8697917,13.8456167 24.7325019,6 14.9348958,6 C5.13666091,6 0,13.8456167 0,15.089434 Z" id="outline"></path>
        <mask id="mask">
          <rect width="100%" height="100%" fill="white"></rect>
          <use xlink:href="#outline" id="lid" fill="black"/>
        </mask>
    </defs>
    <g id="eye">
        <path d="M0,15.089434 C0,16.3335929 5.13666091,24.1788679 14.9348958,24.1788679 C24.7325019,24.1788679 29.8697917,16.3335929 29.8697917,15.089434 C29.8697917,13.8456167 24.7325019,6 14.9348958,6 C5.13666091,6 0,13.8456167 0,15.089434 Z M14.9348958,22.081464 C11.2690863,22.081464 8.29688487,18.9510766 8.29688487,15.089434 C8.29688487,11.2277914 11.2690863,8.09740397 14.9348958,8.09740397 C18.6007053,8.09740397 21.5725924,11.2277914 21.5725924,15.089434 C21.5725924,18.9510766 18.6007053,22.081464 14.9348958,22.081464 L14.9348958,22.081464 Z M18.2535869,15.089434 C18.2535869,17.0200844 16.7673289,18.5857907 14.9348958,18.5857907 C13.1018339,18.5857907 11.6162048,17.0200844 11.6162048,15.089434 C11.6162048,13.1587835 13.1018339,11.593419 14.9348958,11.593419 C15.9253152,11.593419 14.3271242,14.3639878 14.9348958,15.089434 C15.451486,15.7055336 18.2535869,14.2027016 18.2535869,15.089434 L18.2535869,15.089434 Z" fill="#FFFFFF"></path>
        <use xlink:href="#outline" mask="url(#mask)" fill="#FFFFFF"/>
    </g>
</svg>
    </div>

    <?php include("header_index.php"); ?>
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
            <div class="col-md-12" id="product_msg"></div><!--Display Message-->
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
    									<a href="product_page.php"><img src="websiteImages/back.JPG" style="width:200px; height:120px;"/></a>
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