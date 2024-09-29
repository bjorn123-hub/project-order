<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .menu-container { display: flex; justify-content: space-around; padding: 20px; }
        .menu-item { text-align: center; }
        img { width: 150px; height: 150px; }
        .menu-item button { margin-top: 10px; padding: 10px 15px; }
    </style>
</head>
<body>
    <section class="food-menu">
        <h2>Menu</h2>
        <form action="order.php" method="POST">
            <div class="menu-items">

                <!-- Nachos Section -->
                <div class="menu-item">
                    <img src="images/nachos.jpg" alt="Nachos" width="150" height="150">
                    <h3>Nachos</h3>
                    <p>Price: $5.00</p>
                    <p>Made with tortilla chips, cheese, and optional toppings.</p>
                    <button type="submit" name="item" value="Nachos">Order Nachos</button>
                </div>

                <!-- Regular Burger Section -->
                <div class="menu-item">
                    <img src="images/regular_burger.jpg" alt="Regular Burger" width="150" height="150">
                    <h3>Regular Burger</h3>
                    <p>Price: $6.00</p>
                    <p>Grilled beef patty in a soft bun, simple and classic.</p>
                    <button type="submit" name="item" value="Regular Burger">Order Regular Burger</button>
                </div>

                <!-- Cheesy Burger with Egg Section -->
                <div class="menu-item">
                    <img src="images/cheesy_burger.jpg" alt="Cheesy Burger with Egg" width="150" height="150">
                    <h3>Cheesy Burger w/ Egg</h3>
                    <p>Price: $7.50</p>
                    <p>A burger with melted cheese and a fried egg.</p>
                    <button type="submit" name="item" value="Cheesy Burger w/ Egg">Order Cheesy Burger w/ Egg</button>
                </div>

                <!-- Mini Donuts Section -->
                <div class="menu-item">
                    <img src="images/mini_donuts.jpg" alt="Mini Donuts" width="150" height="150">
                    <h3>Mini Donuts</h3>
                    <p>Price: $3.50</p>
                    <p>Delicious mini donuts topped with chocolate crumbs.</p>
                    <button type="submit" name="item" value="Mini Donuts">Order Mini Donuts</button>
                </div>

            </div>
        </form>
    </section>
</body>
</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
</head>
<body>
    <h2>Your Orders</h2>

    <?php
    // Display the list of ordered items
    if (isset($_SESSION['orders']) && count($_SESSION['orders']) > 0) {
        echo "<ul>";
        foreach ($_SESSION['orders'] as $order) {
            echo "<li>" . htmlspecialchars($order) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>You have not placed any orders yet.</p>";
    }
    ?>

    <a href="menu.php">Go Back to Menu</a>
</body>
</html>
