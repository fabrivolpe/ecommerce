<?php

session_start();

include('connection.php');

if (isset($_POST['quantity'])) {

    $userId = $_SESSION['id'];
    $quantity = $_POST['quantity'];
    $itemId = $_POST['item_id'];

    $sql = "UPDATE cart 
    SET product_quantity = '$quantity' 
    WHERE item_id = '$itemId' AND user_id = '$userId'";

    $updatedTable = $connection->query($sql);

    header('location:../cart.php');

}

?>