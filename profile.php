<?php

session_start();

if(!isset($_SESSION['email'])){
	header('Location: index.php');
	exit();
}
else{

	//this pulls the MongoDB driver from vendor folder
	require_once  'vendor/autoload.php';

	//connect to MongoDB Database
	$databaseConnection = new MongoDB\Client("mongodb+srv://romariobarahona:TE2iCzsCTtQ8gjfY@homework3.f6bgtbm.mongodb.net/");

	//connecting to specific database in mongoDB
	$myDatabase = $databaseConnection->assignment3;

	//connecting to our mongoDB Collections
	$userCollection = $myDatabase->users;

	$userEmail = $_SESSION['email'];

	
	$data = array(
		"Email" => $userEmail,
	);

	//fetch user from MongoDB Users Collection
	$fetch = $userCollection->findOne($data);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
</head>
<body>

<table>
    <tr>
        <td>Firstname : </td>
        <td><?php echo isset($fetch['Firstname']) ? $fetch['Firstname'] : ''; ?></td>
    </tr>
    <tr>
        <td>Lastname : </td>
        <td><?php echo isset($fetch['Lastname']) ? $fetch['Lastname'] : ''; ?></td>
    </tr>
    <tr>
        <td>Email : </td>
        <td><?php echo $fetch['Email']; ?></td>
    </tr>
    <tr>
        <td>Phone Number : </td>
        <td><?php echo isset($fetch['Phone Number']) ? $fetch['Phone Number'] : ''; ?></td>
    </tr>
    <tr>
        <td><a href="edit-profile.php?id=<?php echo $fetch['_id']; ?>">Edit</a> </td>
        <td><a href="logout.php">Logout</a></td>
		<td><a href="delete-account.php">Delete Account</a></td>
    </tr>
</table>


</body>
</html>

<?php } ?>