<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
    <div class="search">
        <div class="sort">
            <button class="dropbtn" onclick="showSort()">Sort by <i class="fa fa-caret-down"></i></button>
            <?php if (isset($_GET['category'])) {
                $sortCategory = $_GET['category'];
                $categoryUrl = "&category=$sortCategory";
            } else {
                $categoryUrl = "";
            } ?>
            <div class="sort-dropdown-content" id="dropdown">
                <a href="shop.php?sort=product_name<?php echo $categoryUrl ?>">Name: A to Z<i
                        class="fa-solid fa-arrow-up-a-z"></i></a>
                <a href="shop.php?sort=product_name%20DESC<?php echo $categoryUrl ?>">Name: Z to A<i
                        class="fa-solid fa-arrow-down-z-a"></i></a>
                <a href="shop.php?sort=product_price<?php echo $categoryUrl ?>">Price: Low to High<i
                        class="fa-solid fa-arrow-up-1-9"></i></a>
                <a href="shop.php?sort=product_price%20DESC<?php echo $categoryUrl ?>">Price: High to Low<i
                        class="fa-solid fa-arrow-down-9-1"></i></a>
                <a href="shop.php?sort=product_brand<?php echo $categoryUrl ?>">Brand: A to Z<i
                        class="fa-solid fa-arrow-up-a-z"></i></a>
                <a href="shop.php?sort=product_brand%20DESC<?php echo $categoryUrl ?>">Brand: Z to A<i
                        class="fa-solid fa-arrow-down-z-a"></i></a>
            </div>
        </div>
        <div class="filter">
            <label for="filterInput">Search:</label>
            <input type="text" name="" id="filterInput" onkeyup="filterProducts()">
        </div>
    </div>
    <section id="all-products" class="four-products-row shop">
        <?php include('server/get_all_products.php'); ?>
        <?php if (isset($_GET['category'])) {
            $category = $_GET['category'];
            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
                $categoryQuery = "SELECT * FROM products WHERE product_category = ? ORDER BY $sort";
                $categorySql = $categorySql = $connection->prepare($categoryQuery);
            }
            $categorySql->bind_param('s', $category);
            $categorySql->execute();
            $categoryProducts = $categorySql->get_result(); ?>
            <div class="four-products-row-header shop-header">
                <h3>Shop Our
                    <?php echo ucfirst($category); ?>
                </h3>
                <hr>
            </div>
            <?php while ($row = $categoryProducts->fetch_assoc()) { ?>
                <div class="four-products-row-product product">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                        <img src="assets/images/<?php echo $row['product_image1']; ?>"
                            alt="<?php echo $row['product_name']; ?>">
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
            <?php }
        } else {
            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
                $stmt = "SELECT * FROM products ORDER BY $sort";
            }
            $allProducts = $connection->query($stmt); ?>
            <div class="four-products-row-header shop-header">
                <h3>Shop All Our Products</h3>
                <hr>
            </div>
            <?php while ($row = $allProducts->fetch_assoc()) { ?>
                <div class="four-products-row-product product">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                        <img src="assets/images/<?php echo $row['product_image1']; ?>"
                            alt="<?php echo $row['product_name']; ?>">
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
            <?php }
        } ?>
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

        function filterProducts() {
            // Declare variables
            let input, filter, products, product, a, i;
            input = document.getElementById('filterInput');
            filter = input.value.toUpperCase();
            products = document.getElementById("all-products");
            productTitle = products.getElementsByTagName('h5');
            product = document.getElementsByClassName("product");

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < productTitle.length; i++) {
                a = productTitle[i].innerText;
                if (a.toUpperCase().indexOf(filter) > -1) {
                    product[i].style.display = "";
                } else {
                    product[i].style.display = "none";
                }
            }
        }

        function showSort() {
            let dropdown = document.getElementById("dropdown");
            if (dropdown.style.display !== "block") {
                dropdown.style.display = "block";
            } else {
                dropdown.style.display = "none";
            }

        }

        window.onclick = function (e) {
            if (!e.target.matches(".dropbtn")) {
                let dropdownContent = document.getElementById("dropdown");
                dropdownContent.style.display = "none";
            }
        }
    </script>
</body>

</html>