<?php
// Database connection
$db = new mysqli("localhost", "root", "password", "password_manager");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get user input
$username = $_POST["username"];
$password = $_POST["password"];

// Retrieve the stored hash
$sql = "SELECT password FROM users WHERE username=?";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($storedHash);

if ($stmt->fetch() && password_verify($password, $storedHash)) {
    echo "Login successful!";
} else {
    echo "Login failed. Invalid username or password.";
}

$stmt->close();
$db->close();
?>
