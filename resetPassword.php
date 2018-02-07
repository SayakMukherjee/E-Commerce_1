<?php
include "dbscripts/connection.php";

$answer = $_POST['secret_answer'];
$new_password = $_POST['new_password'];
$repassword = $_POST['repassword'];
$email = $_POST['email'];

if(empty($answer) || empty($new_password) || empty($repassword) || empty($email)){
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

  $sql = "SELECT * FROM users WHERE email='$email' AND secretAnswer='$answer' LIMIT 1" ;
  $check_query = mysqli_query($con,$sql);
  if(mysqli_num_rows($check_query)>0){
    $pass = md5($new_password);
    $update_sql = "UPDATE users SET password='$pass' WHERE email='$email'";
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
      <b>User Not Found..!</b>
    </div>
    ";
  }

}
?>
