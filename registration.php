<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="username"><br>
        Email: <input type="email" name="email"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>


<?php
$conn = new mysqli("localhost", "your_db_username", "your_db_password", "your_db_name");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Basic Validation 
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill out all fields.";
    } else {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

