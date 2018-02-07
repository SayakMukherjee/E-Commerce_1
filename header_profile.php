<!--Navbar-->
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!--Header-->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
      <span class="sr-only">navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="#" class="navbar-brand">XplrART</a>
    </div>
    <!--Navbar Body-->
    <div class="collapse navbar-collapse" id="collapse">
        <!--Left Aligned Items-->
        <ul class="nav navbar-nav">
          <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
          <li><a href="about.php"><span class="glyphicon glyphicon-comment"></span>About Us</a></li>
          <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
          <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
        </ul>
        <!--Right Aligned Items-->
        <ul class="nav navbar-nav navbar-right">
          <!--Cart Section-->
          <li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
            <div class="dropdown-menu" style="width:400px;">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-3">Sl.No</div>
                    <div class="col-md-3">Product Image</div>
                    <div class="col-md-3">Product Name</div>
                    <div class="col-md-3">Price in Rs.</div>
                  </div>
                </div>
                <div class="panel-body">
                  <div id="cart_product">
                    <!--Dummy Data-->
                    <!--<div class="row">
                      <div class="col-md-3">Sl.No</div>
                      <div class="col-md-3">Product Image</div>
                      <div class="col-md-3">Product Name</div>
                      <div class="col-md-3">Price in $.</div>
                    </div>-->
                    <!--Dummy Data-->
                  </div>
                </div>
                <div class="panel-footer">
                  <a style="float:right;" class="btn btn-success btn-xs" href="cart.php">CART</a>
                </div>
              </div>
            </div>
          </li>
          <!--User Section-->
          <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Hi, <?php echo $_SESSION["name"];?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
						<li class="divider"></li>
            <li><a href="order.php" style="text-decoration:none; color:blue;">My Orders</a></li>
						<li class="divider"></li>
						<li><a href="changepassword.php" style="text-decoration:none; color:blue;">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
				</li>
        </ul>
    </div><!--Navbar Body End-->
  </div><!--Conatiner End-->
</div>
<!--Navbar End-->
