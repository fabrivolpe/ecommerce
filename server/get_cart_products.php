<?php

include('connection.php');

$userId = $_SESSION['id'];
$sql = "SELECT * FROM cart WHERE user_id = '$userId'";
$cart_products = $connection->query($sql);

?>