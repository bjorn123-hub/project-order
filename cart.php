<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart & Receipt</title>
    <style>
        /* Global Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5DC; /* Beige background */
            color: #4B3E2F; /* Dark brown text */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #8B4513; /* Brown header */
            color: #FFF;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: #FFF;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .menu-container {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #F5DEB3; /* Light beige background for menu section */
        }

        .menu-item {
            text-align: center;
            background-color: #FFF8DC; /* Light beige box */
            border: 1px solid #8B4513; /* Brown border */
            padding: 10px;
            border-radius: 10px;
            width: 200px;
        }

        .menu-item h3 {
            color: #4B3E2F; /* Dark brown text */
        }

        .menu-item button {
            background-color: #8B4513; /* Brown button */
            color: #FFF;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }

        .menu-item button:hover {
            background-color: #A0522D; /* Slightly lighter brown on hover */
        }

        .cart {
            padding: 20px;
            background-color: #F5DEB3; /* Light beige background for cart */
            text-align: center;
        }

        .cart ul {
            list-style: none;
            padding: 0;
        }

        .cart ul li {
            background-color: #FFF8DC; /* Light beige box for cart items */
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #8B4513;
            border-radius: 10px;
        }

        .cart h3 {
            color: #4B3E2F; /* Dark brown text */
        }

        .receipt {
            padding: 20px;
            background-color: #F5DEB3;
            text-align: center;
        }

        .receipt ul {
            list-style: none;
            padding: 0;
        }

        .receipt ul li {
            background-color: #FFF8DC;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #8B4513;
            border-radius: 10px;
        }

        .receipt h3 {
            color: #4B3E2F;
        }

        .receipt button {
            background-color: #8B4513;
            color: #FFF;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }

        .receipt button:hover {
            background-color: #A0522D;
        }
    </style>
</head>
<body>
    <header>
        <h1>Snack Bites Cafe</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="menu">
        <h2>Menu</h2>
        <div class="menu-container">
            <?php foreach ($menuItems as $name => $details): ?>
                <div class="menu-item">
                    <img src="<?php echo $details['img']; ?>" alt="<?php echo htmlspecialchars($name); ?>" width="150" height="150">
                    <h3><?php echo htmlspecialchars($name); ?></h3>
                    <p>Price: $<?php echo htmlspecialchars($details['price']); ?></p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="item" value="<?php echo htmlspecialchars($name); ?>">
                        <button type="submit" name="add_to_cart">Order <?php echo htmlspecialchars($name); ?></button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="cart">
        <h2>Your Cart</h2>
        <ul>
            <?php if (empty($orders)): ?>
                <li>Your cart is empty.</li>
            <?php else: ?>
                <?php foreach ($orders as $item): ?>
                    <?php if (isset($menuItems[$item])): ?>
                        <li>
                            <img src="<?php echo htmlspecialchars($menuItems[$item]['img']); ?>" alt="<?php echo htmlspecialchars($item); ?>" width="100" height="100">
                            <?php echo htmlspecialchars($item); ?> - $<?php echo htmlspecialchars($menuItems[$item]['price']); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

        <?php if (!empty($orders)): ?>
            <h3>Total Price: $<?php echo $totalPrice; ?></h3>
            <form action="cart.php" method="POST">
                <button type="submit" name="checkout">Checkout</button>
            </form>
        <?php endif; ?>
    </section>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])): ?>
        <section class="receipt">
            <h2>Receipt</h2>
            <ul>
                <?php foreach ($orders as $item): ?>
                    <?php if (isset($menuItems[$item])): ?>
                        <li>
                            <?php echo htmlspecialchars($item); ?> - $<?php echo htmlspecialchars($menuItems[$item]['price']); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <h3>Total Price: $<?php echo $totalPrice; ?></h3>
            <form action="home.php" method="POST">
                <button type="submit">Return to Home</button>
            </form>
        </section>
    <?php endif; ?>
</body>
</html>               

<?php
// Start session to track cart data
session_start();

// Check if the 'add_to_cart' button was clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $item = $_POST['item']; // Get the item name

    // Add item to cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // Initialize cart if it doesn't exist
    }

    // Add item to cart session
    if (isset($_SESSION['cart'][$item])) {
        $_SESSION['cart'][$item]['quantity'] += 1; // Increase quantity if item already in cart
    } else {
        $_SESSION['cart'][$item] = [
            'name' => $item,
            'price' => $menuItems[$item]['price'],
            'quantity' => 1
        ]; // Add item with default quantity 1
    }

    header('Location: cart.php'); // Redirect to cart page
    exit();
}
?>
