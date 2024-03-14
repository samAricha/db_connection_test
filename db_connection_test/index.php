<?php
// Include the file containing database functions
require_once 'db_functions.php';

// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the create form was submitted
if(isset($_POST['create'])) {
    // Call createRecord function if form was submitted
    createRecord($conn, $_POST['name'], $_POST['email']);
}

// Check if the update form was submitted
if(isset($_POST['update'])) {
    // Call updateRecord function if form was submitted
    updateRecord($conn, $_POST['id'], $_POST['newName'], $_POST['newEmail']);
}

// Check if the delete form was submitted
if(isset($_POST['delete'])) {
    // Call deleteRecord function if form was submitted
    deleteRecord($conn, $_POST['delete_id']);
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
</head>
<body>
    <h1>CRUD Operations</h1>
    
    <!-- Create Record Form -->
    <h2>Create Record</h2>
    <form method="post">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        <input type="submit" name="create" value="Create">
    </form>
    
    <!-- Read Records -->
    <h2>Read Records</h2>
    <?php readRecords($conn); ?>
    
    <!-- Update Record Form -->
    <h2>Update Record</h2>
    <form method="post">
        ID of record to update: <input type="number" name="id" required><br>
        New Name: <input type="text" name="newName" required><br>
        New Email: <input type="email" name="newEmail" required><br>
        <input type="submit" name="update" value="Update">
    </form>
    
    <!-- Delete Record Form -->
    <h2>Delete Record</h2>
    <form method="post">
        ID of record to delete: <input type="number" name="delete_id" required><br>
        <input type="submit" name="delete" value="Delete">
    </form>
</body>
</html>
