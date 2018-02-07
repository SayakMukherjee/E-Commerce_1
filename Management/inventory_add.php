<?php
session_start();
if(!isset($_SESSION["manager"])){
  header("location:adminlogin.php");
  exit();
}
//Check if correct session data is available with database
?>
<?php
if(isset($_GET["error"])){
  $errorCode = $_GET["error"];
  if($error_code=1){
    $msg = "Product already exist..";
  }
}else if(isset($_GET["success"])){
  $msg = "Product successfully inserted..";
}else{
  $msg ="Enter the details.";
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
    <?php require_once("adminHeader.php") ?>
  	<p><br/></p>
    <p><br/></p>
    <p><br/></p>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1"></div><!--Left Space-->
        <div class="col-md-10">
          <div class='alert alert-success'>
    						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    						<b><?php echo $msg; ?></b>
    			</div>
          <div class="panel panel-primary">
            <div class="panel-heading">Manage Product</div>
            <div class="panel-body">
              <form method="post" action="addProduct.php" enctype="multipart/form-data" name="myForm" id="myForm">
                <label for="product_cat">Category</label>
                <select class="form-control" id="product_cat" name="product_cat" required>
                  <!--<option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>-->
                </select>
                <label for="product_title">Title</label>
                <input type="text" class="form-control" id="product_title" name="product_title" required/>
                <label for="product_price">Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" required/>
                <label for="product_description">Description</label>
                <input type="text" class="form-control" id="product_description" name="product_description" required/>
                <label for="product_keyword">Keyword</label>
                <input type="text" class="form-control" id="product_keyword" name="product_keyword" required/>
                <label for="photo_credit">Photo Credit</label>
                <input type="text" class="form-control" id="photo_credit" name="photo_credit" required/>
                <label for="product_image">Thumbnail</label>
                <input type="file" class="form-control" id="product_image" name="product_image" required/>
                <label for="download_link">Picture</label>
                <input type="file" class="form-control" id="download_link" name="download_link"required/>
                <p><br/></p>
                <input type="submit" class="btn btn-success  btn-lg" style="float:right;" id="insert" value="SUBMIT">
              </form>
            </div>
            <div class="panel-footer" id="e_msg"></div>
          </div>
        </div>
        <div class="col-md-1"></div><!--Right Space-->
      </div>


    </div><!--Container Ends-->
  </body>
</html>
