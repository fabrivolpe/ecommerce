<?php

session_start();

if ($_SESSION['auth'] === 'loggedin') {

    if (isset($_POST['product_id']) && isset($_POST['product_quantity'])) {

        $productId = $_POST['product_id'];
        $productQuantity = $_POST['product_quantity'];
        $productName = $_POST['product_name'];
        $productImage = $_POST['product_image'];
        $productPrice = $_POST['product_price'];
        $userId = $_SESSION['id'];

        include('connection.php');

        $sql = "INSERT INTO cart(user_id, product_id, product_quantity, product_name, product_image1, product_price) 
        VALUES('$userId','$productId','$productQuantity','$productName','$productImage','$productPrice')";

        $result = mysqli_query($connection, $sql);

        header('location:../cart.php');

    }

} else {

    if (isset($_POST['product_id'])) {
        $id = $_POST['product_id'];
        $_SESSION['redirect'] = "single_product.php?product_id={$id}";
    }

    header("location:../login.php?");

}

?>