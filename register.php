<?php
// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb+srv://romariobarahona:TE2iCzsCTtQ8gjfY@homework3.f6bgtbm.mongodb.net/");
$db = $mongoClient->mydb; // Replace with your database name
$collection = $db->users;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the user already exists
    $existingUser = $collection->findOne(["username" => $username]);
    if ($existingUser) {
        echo "Username already exists. Please choose another.";
    } else {
        // Insert the new user into the collection
        $userDocument = [
            "username" => $username,
            "email" => $email,
            "password" => $hashedPassword,
        ];
        $collection->insertOne($userDocument);
        echo "Registration successful!";
    }
}
?>
