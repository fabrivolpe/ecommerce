<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <!-- Register -->
    <section id="register" class="login page-title">
        <div>
            <h2>Register</h2>
            <hr>
        </div>
        <div class="register-form-container">
            <form id="register-form" class="register-form" action="register.php" method="post">
                <div class="register-email-password-rows form-group">
                    <label for="register-name">Name</label>
                    <input type="text" id="register-name" name="name" placeholder="Name" required>
                    <label for="register-email">Email</label>
                    <input type="email" id="register-email" name="email" placeholder="Email" required>
                    <label for="register-password">Password</label>
                    <input type="password" id="register-password" name="password" placeholder="Password" required>
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password"
                        placeholder="Confirm your password" required>
                </div>
                <div>
                    <button name="register" type="submit">Register</button>
                </div>
                <div>
                    <p>Have an account? Log in <a href="login.php">here</a></p>
                </div>
            </form>
        </div>
        <div class="error-message">
            <?php
            include('server/connection.php');
            if (isset($_POST['register'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirm-password'];
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $sql = "INSERT INTO users(user_name, user_email, user_password)
                VALUES('$name', '$email', '$hashedPassword')";

                $emailSql = "SELECT * FROM users WHERE user_email = '$email'";

                if ($password === $confirmPassword) {

                    $checkIfEmailTaken = mysqli_query($connection, $emailSql);

                    if (mysqli_num_rows($checkIfEmailTaken) > 0) {
                        echo 'Email already taken';
                    } else {
                        $result = mysqli_query($connection, $sql);
                        $userInfo = $connection->query($emailSql);
                        while ($row = $userInfo->fetch_assoc()) {
                            session_start();
                            $_SESSION['auth'] = 'loggedin';
                            $_SESSION['id'] = $row['user_id'];
                            $_SESSION['name'] = $row['user_name'];
                            $_SESSION['email'] = $row['user_email'];
                            header('location:index.php');
                        }
                    }

                } else {
                    echo 'Passwords do not match';
                }
            }
            ?>
        </div>
    </section>

    <script src="assets/js/script.js"></script>

</body>

</html>