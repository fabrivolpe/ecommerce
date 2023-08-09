<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
    <!-- Contact -->
    <section id="contact">
        <div class="contact page-title">
            <h3>Contact Us</h3>
            <hr>
            <p>Phone: <span>+1 (234) 567-8901</span></p>
            <p>Email: <span>my@email.com</span></p>
            <p>We do our best to answer as quickly as possible!</p>
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