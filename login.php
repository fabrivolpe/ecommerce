<?php

session_start();

if ($_SESSION['auth'] === 'loggedin') {
    header('location:account.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <!-- Login -->
    <section id="login" class="login page-title">
        <div>
            <h2>Login</h2>
            <hr>
        </div>
        <div class="login-form-container">
            <form id="login-form" class="login-form" action="login.php">
                <div class="login-email-password-rows form-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" placeholder="Email" required>
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <button name="login" type="submit">Log In</button>
                </div>
                <div>
                    <p>Need an account? Register <a href="register.php">here</a></p>
                </div>
            </form>
        </div>

        <div class="error-message">
            <?php
            include('server/connection.php');

            if (isset($_GET['login'])) {
                $email = $_GET['email'];
                $password = $_GET['password'];

                $sql = "SELECT * FROM users WHERE user_email = '$email'";

                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) == 1) {

                    if (password_verify($password, $result->fetch_column(3))) {

                        $result = mysqli_query($connection, $sql);

                        while ($row = $result->fetch_assoc()) {

                            $userId = $row['user_id'];
                            $userName = $row['user_name'];
                            $userEmail = $row['user_email'];
                            $redirect = $_SESSION['redirect'];

                            session_start();
                            $_SESSION['auth'] = 'loggedin';
                            $_SESSION['id'] = $userId;
                            $_SESSION['name'] = $userName;
                            $_SESSION['email'] = $userEmail;

                            header("location:{$redirect}");

                        }
                    } else {
                        echo 'Incorrect password';
                    }
                } else {
                    echo 'Email not registered';
                }
            }
            ?>
        </div>
    </section>

    <script src="assets/js/script.js"></script>
</body>

</html>