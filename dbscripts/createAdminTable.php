<?php

require "connection.php";

$sqlCommand = "CREATE TABLE admin (
		 		 admin_id int(100) NOT NULL auto_increment,
         username varchar(100) NOT NULL,
         email varchar(300) NOT NULL,
         password varchar(300) NOT NULL,
         mobile varchar(10),
		 		 PRIMARY KEY (admin_id)
		 		 ) ";
if (mysqli_query($con, $sqlCommand)){
    echo "Your admin table has been created successfully!";
} else {
    echo "CRITICAL ERROR: admin table has not been created.";
}

?>