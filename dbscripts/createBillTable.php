<?php

require "connection.php";

$sqlCommand = "CREATE TABLE bill (
		 		 bill_id int(100) NOT NULL auto_increment,
         user_id int(100) NOT NULL,
         bill_date date NOT NULL,
         amount int(100) NOT NULL,
		 		 PRIMARY KEY (bill_id),
         FOREIGN KEY (user_id) REFERENCES users(user_id)
		 		 ) ";
if (mysqli_query($con, $sqlCommand)){
    echo "Your bill table has been created successfully!";
} else {
    echo "CRITICAL ERROR: admin table has not been created.";
}

?>
