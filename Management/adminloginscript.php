<?php
include "../dbscripts/connection.php";

session_start();

if(isset($_POST["adminLogin"])){
	$manager = mysqli_real_escape_string($con,$_POST["username"]);
	$password = ($_POST["password"]);
	$sql = "SELECT * FROM admin WHERE username = '$manager' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["id"] = $row["admin_id"];
		$_SESSION["manager"] = $row["username"];
			echo "truedata";
		}else {
		  echo "Invalid credentials. Try Agian! ";
		}

}

?>
