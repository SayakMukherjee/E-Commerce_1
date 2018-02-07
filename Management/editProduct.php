<?php
include "../dbscripts/connection.php";

$pid = mysqli_real_escape_string($con, $_POST["product_id"]);
$category = mysqli_real_escape_string($con, $_POST["product_cat"]);
$title = mysqli_real_escape_string($con, $_POST["product_title"]);
$price = mysqli_real_escape_string($con, $_POST["product_price"]);
$desc = mysqli_real_escape_string($con, $_POST["product_description"]);
$keyword = mysqli_real_escape_string($con, $_POST["product_keyword"]);
$credit = mysqli_real_escape_string($con, $_POST["photo_credit"]);

$check = "/^[A-Z][a-zA-Z ]+$/";
$number = "/^[0-9]+$/";

/*if(!preg_match($check, $title)){
  echo "
  <b>Title is not valid..!</b><a href='inventory_add.php'>Click Here</a>
  ";
  exit();
}

if(!preg_match($number, $price)){
  echo "
  <b>Price is not valid..!</b><a href='inventory_add.php'>Click Here</a>
  ";
  exit();
}

if(!preg_match($check, $desc)){
  echo "
  <b>Description is not valid..!</b><a href='inventory_add.php'>Click Here</a>
  ";
  exit();
}

if(!preg_match($check, $keyword)){
  echo "
  <b>Keyword is not valid..!</b><a href='inventory_add.php'>Click Here</a>
  ";
  exit();
}

if(!preg_match($check, $credit)){
  echo "
  <b>Credit is not valid..!</b><a href='inventory_add.php'>Click Here</a>
  ";
  exit();
}*/

$sql = "SELECT cat_id FROM Categories WHERE cat_title = '$category' LIMIT 1";
$run_query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($run_query);
$cid = $row["cat_id"];

//echo $pid;

$edit_sql = "UPDATE products SET product_cat = $cid, product_title = '$title', product_price = $price, product_description = '$desc', product_keyword = '$keyword', photo_credit = '$credit' WHERE product_id = $pid";
$edit_query = mysqli_query($con, $edit_sql);

//echo $_FILES['product_image']['tmp_name'];

if($_FILES['product_image']['tmp_name']!=""){
  $thumbnail = "$pid.jpg";
  if(file_exists("../display_images/$thumbnail")){
    unlink("../display_images/$thumbnail");
  }

  move_uploaded_file($_FILES['product_image']['tmp_name'], "../display_images/$thumbnail");
}

if($_FILES['download_link']['tmp_name']!=""){
  $pic = "$pid.jpg";

  if(file_exists("../Images/$pic")){
    unlink("../Images/$pic");
  }
  echo "in";
  move_uploaded_file($_FILES['download_link']['tmp_name'], "../Images/$pic");
}

header("location: inventory_list.php");

?>
