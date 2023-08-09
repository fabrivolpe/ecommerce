<?php

session_start();

$_SESSION['redirect'] = 'account.php';

if ($_SESSION['auth'] !== 'loggedin') {

    header('location:login.php?from_account=y');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
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
    <!-- Account -->
    <section id="account-section" class="account-section page-title">
        <div class="account-info">
            <div>
                <h3>Account Info</h3>
                <hr>
                <div>
                    <p>Name: <span>
                            <?php echo $_SESSION['name']; ?>
                        </span></p>
                    <p>Email: <span>
                            <?php echo $_SESSION['email']; ?>
                        </span></p>
                    <p><a href="orders.php">Your orders</a></p>
                    <p><a href="server/logout.php">Log out</a></p>
                </div>
            </div>
        </div>

        <div>
            <form action="account.php" method="post">
                <h3>Change Password</h3>
                <hr>
                <div class="account-change-password ">
                    <label for="account-password">Password</label>
                    <input type="password" id="account-password" name="password" placeholder="Password" required>
                    <label for="confirm-account-password">Confirm Password</label>
                    <input type="password" id="confirm-account-password" name="confirm-password"
                        placeholder="Confirm password" required>
                    <button name="change-password" type="submit">Change Password</button>
                </div>
            </form>
            <div class="error-message">

                <?php

                include('server/connection.php');

                if (isset($_POST['change-password'])) {
                    $password = $_POST['password'];
                    $confirmpassword = $_POST['confirm-password'];
                    $email = $_SESSION['email'];
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    $sql = "UPDATE users
                    SET user_password = '$hashedPassword'
                    WHERE user_email = '$email'";

                    if ($password === $confirmpassword) {
                        $result = $connection->query($sql);
                        echo "Password changed!";
                    } else {
                        echo 'Passwords do not match';
                    }
                }

                ?>

            </div>
        </div>
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
</body>

</html>