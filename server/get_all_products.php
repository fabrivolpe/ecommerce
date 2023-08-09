<?php

include('connection.php');


$stmt = 'SELECT * FROM products ORDER BY RAND()';


$categorySql = $connection->prepare("SELECT * FROM products WHERE product_category = ? ORDER BY RAND()");


?>