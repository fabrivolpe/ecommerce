<?php

$servername = "localhost";
$username = "root";
$password = "mypassword";
$dbname = 'php_ecommerce_project';

$connection = mysqli_connect($servername, $username, $password, $dbname);

if(!$connection) {
    die('Connection failed: ' . $connection->connect_error);
}

?>

