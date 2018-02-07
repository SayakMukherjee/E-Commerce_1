<?php
session_start();
if(!isset($_SESSION["manager"])){
  header("location:adminlogin.php");
  exit();
}
//Check if correct session data is available with database
?>

<?php

include "../dbscripts/connection.php";

if(isset($_GET["pid"])){
  $targetId = $_GET["pid"];
  $sql = "SELECT * FROM products WHERE product_id=$targetId LIMIT 1";
  $run_query = mysqli_query($con, $sql) or die(mysqli_error($con));

  if(mysqli_num_rows($run_query) > 0){
    while($row=mysqli_fetch_array($run_query)){
      $cat = $row["product_cat"];
      $title = $row["product_title"];
      $price = $row["product_price"];
      $desc = $row["product_description"];
      $key = $row["product_keyword"];
      $credit = $row["photo_credit"];
    }
  }
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
          <div class="panel panel-primary">
            <div class="panel-heading">Manage Product</div>
            <div class="panel-body">
              <form method="post" action="editProduct.php" enctype="multipart/form-data" name="myForm" id="myForm">
                <input type="hidden" class="form-control" id="product_id" name="product_id" value="<?php echo $targetId; ?>"/>
                <label for="product_cat">Category</label>
                <select class="form-control" id="product_cat" name="product_cat" required>
                  <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
                  <!--<option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>-->
                </select>
                <label for="product_title">Title</label>
                <input type="text" class="form-control" id="product_title" name="product_title" value="<?php echo $title; ?>" required/>
                <label for="product_price">Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $price; ?>" required/>
                <label for="product_description">Description</label>
                <input type="text" class="form-control" id="product_description" name="product_description" value="<?php echo $desc; ?>" required/>
                <label for="product_keyword">Keyword</label>
                <input type="text" class="form-control" id="product_keyword" name="product_keyword" value="<?php echo $key; ?>" required/>
                <label for="photo_credit">Photo Credit</label>
                <input type="text" class="form-control" id="photo_credit" name="photo_credit" value="<?php echo $credit; ?>" required/>
                <label for="product_image">Thumbnail</label>
                <input type="file" class="form-control" id="product_image" name="product_image"/>
                <label for="download_link">Picture</label>
                <input type="file" class="form-control" id="download_link" name="download_link"/>
                <p><br/></p>
                <input type="submit" class="btn btn-success  btn-lg" style="float:right;" id="update" value="UPDATE">
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
