<?php

require "connection.php";

$sqlCommand = "CREATE TABLE cart (
		 		 cart_id int(100) NOT NULL auto_increment,
				 product_id int(100) NOT NULL,
         user_id int(100) NOT NULL,
         isInCart boolean NOT NULL,
         bill_id int(100),
		 		 PRIMARY KEY (cart_id),
         FOREIGN KEY (product_id) REFERENCES products(product_id),
         FOREIGN KEY (user_id) REFERENCES users(user_id)
		 		 ) ";
if (mysqli_query($con, $sqlCommand)){
    echo "Your cart table has been created successfully!";
} else {
    echo "CRITICAL ERROR: admin table has not been created.";
}

?>
