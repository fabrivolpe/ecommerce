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

    <!-- Orders -->
    <section id="orders">

        <div class="page-title">
            <h2>Your Orders</h2>
            <hr>
        </div>

        <div class="orders">

            <table class="orders-table">
                <tr>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Product(s)</th>
                    <th>Quantity</th>
                </tr>

                <?php include('server/add_order.php'); ?>

                <?php while ($row = $orders->fetch_assoc()) { ?>

                    <tr>
                        <td>
                            <a href="single_order.php?order_id=<?php echo $row['order_id']; ?>&user_id=<?php echo $row['user_id']; ?>">
                                <?php echo $row['order_date']; ?>
                            </a>
                        </td>
                        <td>
                            <?php echo "$" . $row['order_total']; ?>
                        </td>
                        <td>
                            <?php
                            $orderId = $row['order_id'];

                            $fetchOrderItemsSql->bind_param('s', $orderId);
                            $fetchOrderItemsSql->execute();
                            $fetchOrderItems = $fetchOrderItemsSql->get_result();
                            while ($item = $fetchOrderItems->fetch_assoc()) {
                                $name = $item['product_name'];
                                echo "<p>{$name}</p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $orderId = $row['order_id'];
                            $fetchOrderItemsSql->bind_param('s', $orderId);
                            $fetchOrderItemsSql->execute();
                            $fetchOrderItems = $fetchOrderItemsSql->get_result();
                            while ($item = $fetchOrderItems->fetch_assoc()) {
                                $quantity = $item['product_quantity'];
                                echo "<p>{$quantity}</p>";
                            }
                            ?>
                        </td>
                    </tr>

                <?php } ?>

            </table>

        </div>

    </section>
    <script src="assets/js/script.js"></script>
</body>

</html>