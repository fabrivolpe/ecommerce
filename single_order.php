<?php

if (isset($_GET['order_id']) && isset($_GET['user_id'])) {

    $orderId = $_GET['order_id'];
    $userId = $_GET['user_id'];

} else {

    header("location:orders.php");

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/images/logo3.jpeg">
    <script src="https://kit.fontawesome.com/6e897e35e2.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Nav -->
    <nav>
        <div class="nav-bar">
            <div class="nav-bar-child">
                <a href="index.php"><img class="logo" src="assets/images/logo3.png" alt="logo"></a>
            </div>
            <div class="nav-bar-child collapsed-nav-bar">
                <i class="fa fa-bars" onclick="showNavBar()"></i>
            </div>
            <div class="nav-bar-child">
                <a href="index.php">Home</a>
            </div>
            <div class="nav-bar-child">
                <a href="shop.php">Products</a>
            </div>
            <div class="nav-bar-child">
                <a href="contact.php">Contact Us</a>
            </div>
            <div class="nav-bar-child">
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="nav-bar-child">
                <a href="account.php"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </nav>

    <section id="single-order">

        <div class="page-title">
            <h2>
                <?php
                $title = substr($orderId, 0, 11);
                echo "Order made on " . $title;
                ?>
            </h2>
            <hr>

        </div>


        <div class="single-order">

            <?php

            include('server/connection.php');

            $orderItemsSql = "SELECT * FROM order_items WHERE order_id = '$orderId' AND user_id = '$userId'";

            $result = $connection->query($orderItemsSql);

            ?>

            <table class="single-order-table">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price Per Unit</th>
                    <th></th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php echo $row['product_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['product_quantity']; ?>
                        </td>
                        <td>
                            <?php echo $row['product_price']; ?>
                        </td>
                        <td><img src="assets/images/<?php echo $row['product_image1']; ?>" alt="<?php echo $row['product_name']?>"></td>
                    </tr>
                <?php } ?>

            </table>

        </div>

    </section>
    <script src="assets/js/script.js"></script>
</body>

</html>