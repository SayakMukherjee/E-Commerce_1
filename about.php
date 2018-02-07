<?php
session_start();
if(isset($_SESSION["uid"])){
  $head="header_profile.php";
}else{
  $head="header_index.php";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale=1, maximum-scale=1.0>
    <title>Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
  </head>
  <body>
    <?php include($head); ?>
    <!--Parallax Box-->
    <div class="parallax parallax_img2">
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
        <div class="col-md-10">
          <div class="panel panel-primary">
            <div class="panel-heading">XplrART</div>
            <div class="panel-body">
              <!--Description-->
              <h1>About the store:</h1><br/>
              <p> We observe to explore,explore to share.Photography is just the art of visual storytelling and explore art is the platform to get all the visual stories you want in an affordable price.The photos you get here are from a street photographers personal collection.Akash,who roams through the streets of the vibrant city of joy and tries to capture the utter brilliance of Calcutta ;the motto is to never stop exploring ,and XplrART is happy to archive ,share and sell these enigmatic observations.</p>
              <!--Description End-->

            </div>
            <div class="panel-footer">&copy; XplrART</div>
          </div>
        </div>
        <div class="col-md-1"></div><!--Right Space-->
      </div>
    </div><!--Container Ends-->
  </body>
</html>