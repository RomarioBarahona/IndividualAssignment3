<?php
// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb+srv://romariobarahona:TE2iCzsCTtQ8gjfY@homework3.f6bgtbm.mongodb.net/");
$db = $mongoClient->mydb; // Replace with your database name
$collection = $db->users;

// Get user input
$username = $_POST["username"];
$password = $_POST["password"];

// Retrieve the user document
$userDocument = $collection->findOne(["username" => $username]);

if ($userDocument && password_verify($password, $userDocument["password"])) {
    echo "Login successful!";
} else {
    echo "Login failed. Invalid username or password.";
}
?>
