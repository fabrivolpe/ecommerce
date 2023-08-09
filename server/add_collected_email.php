<?php

include('connection.php');

if(isset($_GET['email'])) {

    $email = $_GET['email'];

    $sql = "INSERT INTO emails(email) VALUES('$email')";

    $result = $connection->query($sql);

    header('location:../discount.php');

}

?>