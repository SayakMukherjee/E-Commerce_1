<?php

require "connection.php";

$sqlCommand = "CREATE TABLE products (
		 		 product_id int(100) NOT NULL auto_increment,
				 product_cat int(100) NOT NULL,
         product_title varchar(200) NOT NULL,
         product_price int(100) NOT NULL,
         product_description text NOT NULL,
         product_keyword text NOT NULL,
         photo_credit text NOT NULL,
		 		 PRIMARY KEY (product_id),
         FOREIGN KEY (product_cat) REFERENCES categories(cat_id)
		 		 ) ";
if (mysqli_query($con, $sqlCommand)){
    echo "Your products table has been created successfully!";
} else {
    echo "CRITICAL ERROR: admin table has not been created.";
}

?>
