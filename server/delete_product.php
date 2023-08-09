<?php

session_start();

include('connection.php');

if (isset($_POST['item_id'])) {

    $userId = $_SESSION['id'];
    $itemId = $_POST['item_id'];

    $sql = "DELETE FROM cart
    WHERE item_id = '$itemId' AND user_id = '$userId'";

    $updatedTable = $connection->query($sql);

    header('location:../cart.php');

}

?>