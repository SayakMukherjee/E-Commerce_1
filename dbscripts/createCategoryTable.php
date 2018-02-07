<?php

include "connection.php";

$sqlCommand = "CREATE TABLE categories (
		 		 cat_id int(100) NOT NULL auto_increment,
				 cat_title varchar(200) NOT NULL,
		 		 PRIMARY KEY (cat_id)
		 		 ) ";

if (mysqli_query($con, $sqlCommand)){
    echo "Your categories table has been created successfully!";
} else {
    echo "CRITICAL ERROR: categories table has not been created.";
}
?>
