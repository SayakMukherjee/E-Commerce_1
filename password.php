<?php
include "dbscripts/connection.php";
session_start();

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$repassword = $_POST['repassword'];
$uid = $_SESSION["uid"];

if(empty($old_password) || empty($new_password) || empty($repassword)){
  echo "
  <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
  </div>
  ";
}else{
  if(strlen($new_password) < 9 ){
    echo "
      <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>Password is weak. Must be 9 characters</b>
      </div>
    ";
    exit();
  }
  if(strlen($repassword) < 9 ){
    echo "
      <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>Password is weak</b>
      </div>
    ";
    exit();
  }
  if($new_password != $repassword){
    echo "
      <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>password is not same</b>
      </div>
    ";
    exit();
  }

  $old_pass = md5($old_password);
  $sql = "SELECT * FROM users WHERE user_id = '$uid' AND password='$old_pass' LIMIT 1" ;
  $check_query = mysqli_query($con,$sql);
  if(mysqli_num_rows($check_query)>0){
    $pass = md5($new_password);
    $update_sql = "UPDATE users SET password='$pass' WHERE user_id='$uid'";
    $update_query = mysqli_query($con,$update_sql);
    if($update_query){
      echo "
      <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>password updated successfully..!</b>
      </div>
      ";
      exit();
    }else{
      echo "
      <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>Failed to update..!</b>
      </div>
      ";
      exit();
    }
  }else{
    echo "
    <div class='alert alert-warning'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <b>Wrong Password..!</b>
    </div>
    ";
  }

}
?>
