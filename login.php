<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Snack Bites Cafe</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="auth.php">Login/Register</a></li>
            </ul>
        </nav>
    </header>

    <section class="auth-section">
        <h2>Login or Register</h2>
        <?php if (isset($message)) echo "<p class='message'>$message</p>"; ?>

        <div class="auth-container">
            <!-- Login Form -->
            <div class="login">
                <h3>Login</h3>
                <form action="auth.php" method="POST">
                    <input type="text" name="emailOrUsername" placeholder="Email or Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                </form>
            </div>

            <!-- Registration Form -->
            <div class="register">
                <h3>Register</h3>
                <form action="auth.php" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

