<?php
// Database connection
$db = new mysqli("localhost", "root", "password", "password_manager");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get user input
$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

// Insert data into the database
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$db->close();
?>
