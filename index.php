<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Store</title>
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

    <section id="home" class="home">
        <div class="home-content">
            <h1>New Products</h1>
            <p><span>Best Prices</span> Anywhere Online</p>
            <a href="shop.php">
                <button>Shop Now</button>
            </a>
        </div>
    </section>

    <!-- Brands -->
    <section id="brand">
        <div class="brands">
            <img src="assets/images/adidas.jpeg" alt="adidas logo">
            <img src="assets/images/nike.jpeg" alt="nike logo">
            <img src="assets/images/puma.webp" alt="puma logo">
            <img src="assets/images/yankees.jpeg" alt="yankees logo">
        </div>
    </section>

    <!-- New Products -->
    <section id="new" class="new">
        <div class="new-child new-first">
            <img src="assets/images/pumashoes.webp" alt="puma shoes">
            <div class="new-details">
                <h2>Shoes & <br> Sneakers</h2>
                <a href="shop.php?category=shoes"><button>Shop Now</button></a>
            </div>
        </div>

        <div class="new-child new-second">
            <img src="assets/images/adidasshirt.webp" alt="puma shoes">
            <div class="new-details">
                <h2>Workout <br> Shirts</h2>
                <a href="shop.php?category=shirts"><button>Shop Now</button></a>
            </div>
        </div>

        <div class="new-child new-third">
            <img src="assets/images/adidasjoggers.webp" alt="adidas joggers">
            <div class="new-details">
                <h2>Shorts & <br> Joggers</h2>
                <a href="shop.php?category=shorts"><button>Shop Now</button></a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="featured" class="four-products-row featured">
        <div class="four-products-row-header featured-header">
            <h3>Our Featured Products</h3>
            <hr>
            <p>Check our featured products here!</p>
        </div>

        <?php include('server/get_featured_products.php'); ?>
        <?php while ($row = $featured_products->fetch_assoc()) { ?>
            <div class="four-products-row-product featured-product">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                    <img src="assets/images/<?php echo $row['product_image1']; ?>" alt="<?php echo $row['product_name']; ?>">
                </a>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="featured-product-text">
                    <h5>
                        <?php echo $row['product_name']; ?>
                    </h5>
                    <h4>
                        <?php echo $row['product_price']; ?>
                    </h4>
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                        <button>Buy Now</button>
                    </a>
                </div>
            </div>
        <?php } ?>
    </section>
    <script src="assets/js/script.js"></script>

    <!-- Clothes -->
    <section id="clothes" class="four-products-row clothes">
        <div class="four-products-row-header clothes-header">
            <h3>Our Clothing Products</h3>
            <hr>
            <p>Check our clothes here!</p>
        </div>
        <?php include('server/get_featured_products.php'); ?>
        <?php while ($row = $featured_products->fetch_assoc()) { ?>
            <div class="four-products-row-product clothes-product">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                    <img src="assets/images/<?php echo $row['product_image1']; ?>" alt="<?php echo $row['product_name']; ?>">
                </a>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="featured-product-text">
                    <h5>
                        <?php echo $row['product_name']; ?>
                    </h5>
                    <h4>
                        <?php echo $row['product_price']; ?>
                    </h4>
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                        <button>Buy Now</button>
                    </a>
                </div>
            </div>
        <?php } ?>
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