<?php

include('server/connection.php');

if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $stmt = $connection->prepare('SELECT * FROM products WHERE product_id = ?');

    $stmt->bind_param('i', $product_id);

    $stmt->execute();

    $product = $stmt->get_result();

} else {

    header('location: index.php');

}

?>

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

    <section class="single-product-section">
        <?php while ($row = $product->fetch_assoc()) { ?>
            <div class="single-product">
                <img id="main-image" class="big-image" src="assets/images/<?php echo $row['product_image1'] ?>" alt="<?php echo $row['product_name']?>">
                <div class="small-images">
                    <img class="small-image small-image-first" src="assets/images/<?php echo $row['product_image1'] ?>"
                        alt="<?php echo $row['product_name']?>">
                    <img class="small-image small-image-second" src="assets/images/<?php echo $row['product_image2'] ?>"
                        alt="<?php echo $row['product_name']?>">
                    <img class="small-image small-image-third" src="assets/images/<?php echo $row['product_image3'] ?>"
                        alt="<?php echo $row['product_name']?>">
                    <img class="small-image small-image-fourth" src="assets/images/<?php echo $row['product_image4'] ?>"
                        alt="<?php echo $row['product_name']?>">
                </div>
                <div class="single-product-text">
                    <h3>
                        <?php echo $row['product_name']; ?>
                    </h3>
                    <h2>
                        <?php echo $row['product_price']; ?>
                    </h2>
                    <h1>
                        <?php echo $row['product_name']; ?>
                    </h1>
                    <form action="server/add_to_cart.php" method="post">
                        <input name="product_quantity" type="number" value="1" min="1">
                        <input name="product_id" type="hidden" value="<?php echo $row['product_id']; ?>">
                        <input name="product_name" type="hidden" value="<?php echo $row['product_name']; ?>">
                        <input name="product_image" type="hidden" value="<?php echo $row['product_image1']; ?>">
                        <input name="product_price" type="hidden" value="<?php echo $row['product_price']; ?>">
                        <button type="submit">Add to Cart</button>
                    </form>


                    <h4>Product Details</h4>
                    <span>
                        <?php echo $row['product_description']; ?>
                    </span>
                </div>
            </div>
        <?php } ?>
    </section>

    <section id="related" class="four-products-row related">
        <div class="four-products-row-header related-header">
            <h3>Related Products</h3>
            <hr>
        </div>

        <?php

        include('server/connection.php');

        if (isset($_GET['product_id'])) {

            $product_id = $_GET['product_id'];

            $stmt = $connection->prepare('SELECT * FROM products WHERE product_id = ?');

            $stmt->bind_param('i', $product_id);

            $stmt->execute();

            $product = $stmt->get_result();

            $row = $product->fetch_assoc();

            $related_stmt = $connection->prepare('SELECT * FROM products 
            WHERE product_id != ? AND (product_category = ? OR product_brand = ?)
            ORDER BY RAND() LIMIT 4');

            $related_stmt->bind_param(
                'iss', $row['product_id'], $row['product_category'], $row['product_brand']
            );

            $related_stmt->execute();

            $related_products = $related_stmt->get_result();

        } else {

            header('location:index.php');

        }

        ?>

        <?php while ($row = $related_products->fetch_assoc()) { ?>
            <div class="four-products-row-product featured-product">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                    <img src="assets/images/<?php echo $row['product_image1']; ?>" alt="<?php echo $row['product_name']?>">
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

    <script>
        let mainImage = document.getElementById("main-image");
        let smallImages = document.getElementsByClassName("small-image");


        for (let i = 0; i < smallImages.length; i++) {
            smallImages[i].onclick = function () {
                mainImage.src = smallImages[i].src;
            }
        }
    </script>
    <script src="assets/js/script.js"></script>
</body>

</html>