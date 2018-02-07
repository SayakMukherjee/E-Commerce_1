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
          <!--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
            <div class="dropdown-menu" style="width:400px;">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-3">Sl.No</div>
                    <div class="col-md-3">Product Image</div>
                    <div class="col-md-3">Product Name</div>
                    <div class="col-md-3">Price in $.</div>
                  </div>
                </div>
                <div class="panel-body"></div>
                <div class="panel-footer"></div>
              </div>
            </div>
          </li>-->
          <!--Login Section-->
          <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
            <ul class="dropdown-menu">
              <div style="width:300px;">
                <div class="panel panel-primary">
                  <div class="panel-heading">Login</div>
                  <div class="panel-body">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" required/>
                    <label for="email">Password</label>
                    <input type="password" class="form-control" id="password" required/>
                    <p><br/></p>
                    <a href="forgotPassword.php" style="list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login">
                  </div>
                  <div class="panel-footer" id="e_msg"></div>
                </div>
              </div>
            </ul>
          </li>
          <!--Registration Section-->
          <li><a href="customer_register.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
        </ul>
    </div><!--Navbar Body End-->
  </div><!--Conatiner End-->
</div>
<!--Navbar End-->
