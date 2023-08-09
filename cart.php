<?php

session_start();

$_SESSION['redirect'] = 'cart.php';

if ($_SESSION['auth'] !== 'loggedin') {

    header('location:login.php');

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

    <!-- Cart -->
    <section class="cart">
        <div class="cart-contents page-title">
            <h2>Your Cart</h2>
            <hr>
        </div>
        <table class="cart-table">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>


            <?php include('server/get_cart_products.php'); ?>
            <?php while ($row = $cart_products->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img class="cart-image" src="assets/images/<?php echo $row['product_image1'] ?>"
                                alt="cart-image">
                            <div>
                                <p>
                                    <?php echo $row['product_name']; ?>
                                </p>
                                <small><span>$</span>
                                    <?php echo $row['product_price']; ?>
                                </small>
                                <br>
                                <form action="server/delete_product.php" method="post">
                                    <input name="item_id" type="hidden" value=<?php echo $row['item_id']; ?>>
                                    <button type="submit">Remove</button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <form action="server/edit_product_quantity.php" method="post">
                            <input class="quantity" name="quantity" type="number" min="1" value=<?php echo $row['product_quantity']; ?>>
                            <input name="item_id" type="hidden" value=<?php echo $row['item_id']; ?>>
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                    <td>
                        <span>$</span>
                        <span class="cart-subtotal-price">
                            <?php echo $row['product_price'] * $row['product_quantity']; ?>
                        </span>
                    </td>
                </tr>
            <?php } ?>

            <div class="cart-totals">
                <tr>
                    <td></td>
                    <td>Subtotal</td>
                    <td id="subtotal">$419.97</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Shipping</td>
                    <td id="shipping">$419.97</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Taxes</td>
                    <td id="taxes">$419.97</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td id="total">$419.97</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <form action="server/checkout.php">
                            <input id="amount" name="amount" type="hidden" value="" step="0.01">
                            <input id="name" name="name" type="hidden" 
                            value="<?php echo $_SESSION['name']; ?>">
                            <button type="submit">Check Out</button>
                        </form>
                    </td>
                </tr>
            </div>
        </table>
    </section>
    <section id="disclaimer">
        <p>*More than 5 items will require an increase in shipping costs to $10.</p>
    </section>
   <!-- Footer -->
   <section id="footer">
        <footer class="footer">
            <div class="footer-child">
                <div class="footer-shop">
                    <h3>Shop</h3>
                    <a href="shop.php?category=shirts">Shirts</a>
                    <a href="shop.php?category=shorts">Shorts</a>
                    <a href="shop.php?category=shoes">Shoes</a>
                    <a href="shop.php?category=backpacks">Backpacks</a>
                </div>
                <div class="footer-help">
                    <h3>Help</h3>
                    <a href="contact.php">Contact Us</a>
                </div>
            </div>

            <div class="footer-child">
                <div>
                    <h4>Sign up for 10% off!</h4>
                    <form action="server/add_collected_email.php">
                        <input name="email" type="email" placeholder="Enter Your Email Here" required>
                        <button type="submit">Sign Up</button>
                    </form>
                </div>
                <div class="footer-social-media">
                    <a href="https://www.instagram.com/"><i class="fa fa-instagram footer-social-media-child"></i></a>
                    <a href="https://www.facebook.com/"><i class="fa fa-facebook footer-social-media-child"></i></a>
                    <a href="https://twitter.com/"><i class="fa fa-twitter footer-social-media-child"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin footer-social-media-child"></i></a>
                </div>
            </div>

            <p class="footer-copyright">©<span id="year">2023</span> OnlySports, Inc. All Rights Reserved</p>
        </footer>
    </section>

    <script src="assets/js/script.js"></script>
    <script>
        let prices, subtotal, shipping, taxes, total;
        prices = document.getElementsByClassName("cart-subtotal-price");
        subtotal = document.getElementById("subtotal");
        shipping = document.getElementById("shipping");
        taxes = document.getElementById("taxes");
        total = document.getElementById("total");
        quantity = document.getElementsByClassName("quantity");

        let priceArray = Array.from(prices);

        let subtotalArray = [];

        priceArray.forEach(price => {
            subtotalArray.push(Number(price.innerText));
        });

        const sum = subtotalArray.reduce((partialSum, a) => partialSum + a, 0);
        const roundedSum = Math.round(sum * 100) / 100;
        subtotal.innerText = roundedSum.toFixed(2);

        if (subtotalArray.length == 0) {
            shipping.innerText = 0.00;
        } else if (subtotalArray.length <= 5) {
            shipping.innerText = 5.49;
        } else {
            shipping.innerText = 9.99;
        }

        const tax = Math.round((roundedSum * 0.05) * 100) / 100;
        taxes.innerText = tax.toFixed(2);

        totalPrice =

            Number(subtotal.innerText) +
            Number(shipping.innerText) +
            Number(taxes.innerText);

        total.innerText = totalPrice.toFixed(2);

        //Checkout Inputs
        let amount, name;

        amount = document.getElementById('amount');
        name = document.getElementById('name');
        amount.value = totalPrice.toFixed(2);

    </script>
</body>

</html>