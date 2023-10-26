<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

require_once 'vendor/autoload.php';

// Connect to MongoDB Database
$databaseConnection = new MongoDB\Client("mongodb+srv://romariobarahona:TE2iCzsCTtQ8gjfY@homework3.f6bgtbm.mongodb.net/");

// Connecting to the specific database in MongoDB
$myDatabase = $databaseConnection->assignment3;

// Connecting to our MongoDB Collections
$userCollection = $myDatabase->users;

$userEmail = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    // User has confirmed the deletion, so proceed with account deletion
    $deleteResult = $userCollection->deleteOne(['Email' => $userEmail]);

    if ($deleteResult->getDeletedCount() === 1) {
        // Account deleted successfully
        session_destroy(); // Optional: You can destroy the user's session if desired
        header('Location: index.html');
        exit();
    } else {
        // Handle the case where deletion failed
        echo "Failed to delete the account. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Account</title>
</head>
<body>
    <h1>Delete Your Account</h1>
    <p>Are you sure you want to delete your account?</p>
    <form method="POST">
        <input type="submit" name="confirm_delete" value="Yes, I'm sure">
        <a href="profile.php">Cancel</a>
    </form>
</body>
</html>