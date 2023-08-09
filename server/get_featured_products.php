<?php

include('connection.php');

$stmt = 'SELECT * FROM products ORDER BY RAND() LIMIT 4';

$featured_products = $connection->query($stmt);

?>