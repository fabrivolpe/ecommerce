<?php

include('connection.php');

session_start();

$userId = $_SESSION['id'];

if (isset($_GET['total'])) {


    $total = $_GET['total'];

    $sql = "INSERT INTO orders(order_id, user_id, order_date, order_total) VALUES(NOW(),$userId, curdate(), $total)";

    $result = $connection->query($sql);

    $cartSql = "SELECT * FROM cart WHERE user_id = $userId";

    $cart = $connection->query($cartSql);

    while ($row = $cart->fetch_assoc()) {

        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_quantity = $row['product_quantity'];
        $product_price = $row['product_price'];
        $product_image = $row['product_image1'];

        $orderItemsSql = "INSERT INTO order_items(order_id, user_id, product_id, product_quantity, product_name, product_price, product_image1) VALUES(NOW(), '$userId', '$product_id', '$product_quantity', '$product_name', '$product_price', '$product_image')";
        $orderItems = $connection->query($orderItemsSql);
    }

    $deleteCartSql = "DELETE FROM cart WHERE user_id = $userId";

    $deleteCart = $connection->query($deleteCartSql);

    header('location:../account.php');

}

$ordersSql = "SELECT * FROM orders WHERE user_id = $userId";

$orders = $connection->query($ordersSql);

$fetchOrderItemsSql = $connection->prepare("SELECT * FROM order_items WHERE order_id = ?");

?>