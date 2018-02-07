<?php

require "connection.php";

$sqlCommand = "CREATE TABLE users (
		 		 user_id int(100) NOT NULL auto_increment,
         first_name varchar(100) NOT NULL,
         last_name varchar(100),
         email varchar(300) NOT NULL,
         password varchar(300) NOT NULL,
         mobile varchar(10),
         secretAnswer varchar(100) NOT NULL,
		 		 PRIMARY KEY (user_id)
		 		 ) ";
if (mysqli_query($con, $sqlCommand)){
    echo "Your users table has been created successfully!";
} else {
    echo "CRITICAL ERROR: admin table has not been created.";
}

?>
