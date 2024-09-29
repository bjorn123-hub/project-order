<?php
session_start();
$sname= "Localhost";
$uname= "root";
$password= "";


// Database connection
$conn = new mysqli("localhost", "your_db_username", "your_db_password", "your_db_name");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to register a new user
function registerUser($conn, $username, $email, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email exists
    $checkUserSql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($checkUserSql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return false; // User already exists
    }

    // Insert new user
    $insertSql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        return true; // Registration successful
    }

    return false;
}

// Function to login a user
function loginUser($conn, $emailOrUsername, $password) {
    // Search for user by username or email
    $loginSql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($loginSql);
    $stmt->bind_param("ss", $emailOrUsername, $emailOrUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            return true; // Login successful
        }
    }

    return false; // Login failed
}

// Handle registration
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        $message = "Please fill out all fields.";
    } elseif (registerUser($conn, $username, $email, $password)) {
        $message = "Registration successful! Please log in.";
    } else {
        $message = "Error: Username or Email already exists.";
    }
}

// Handle login
if (isset($_POST['login'])) {
    $emailOrUsername = $_POST['emailOrUsername'];
    $password = $_POST['password'];

    if (empty($emailOrUsername) || empty($password)) {
        $message = "Please fill out all fields.";
    } elseif (loginUser($conn, $emailOrUsername, $password)) {
        header("Location: home.php"); // Redirect after login
        exit();
    } else {
        $message = "Invalid login credentials!";
    }
}
?>
