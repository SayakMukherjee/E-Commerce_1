<?php

session_start();

unset($_SESSION["id"]);

unset($_SESSION["manager"]);

header("location:adminlogin.php");

?>
