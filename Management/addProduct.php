<?php
include "../dbscripts/connection.php";

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

$sql = "SELECT product_id FROM products WHERE product_title = '$title' LIMIT 1";
$check_query = mysqli_query($con, $sql);
$count = mysqli_num_rows($check_query);
if($count>0){
  //echo"Error";
  header("location:inventory_add.php?error=1");
  exit();
}else{
  $sql = "SELECT cat_id FROM Categories WHERE cat_title = '$category' LIMIT 1";
  $run_query = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($run_query);
  $cid = $row["cat_id"];

  $sql = "INSERT INTO products VALUES(NULL, $cid, '$title', $price, '$desc', '$keyword', '$credit')";
  $add_query = mysqli_query($con, $sql);

  $pid = mysqli_insert_id($con);

  $thumbnail = "$pid.jpg";
  $pic = "$pid.jpg";

  move_uploaded_file($_FILES['product_image']['tmp_name'], "../display_images/$thumbnail");
  move_uploaded_file($_FILES['download_link']['tmp_name'], "../Images/$pic");

  header("location: inventory_add.php?success=1");

  //echo "Success";
}

/*$pid = 1;

$thumbnail = "$pid.jpg";

//echo $_FILES['product_image']['tmp_name'];

if (move_uploaded_file($_FILES['download_link']['tmp_name'], "../Images/$thumbnail")){
        echo "The file has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }*/

?>
