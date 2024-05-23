<?php
require 'connection.php'
;// Database connection setting
// Check the user's credentials against the database
$username = $_POST['username'];
$password = $_POST['password'];
$success = false;
$message = '';

$sql = "SELECT * FROM users WHERE uName = '$username' and uPassword='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Username exists in the database, check the password
    $row = $result->fetch_assoc();
       // Password is correct, set the success flag
        $success = true;
        $message = 'Login successful';
        $role=$row['uRole'];
        
} else {
    // Username does not exist in the database, set the error message
    $message = 'Invalid username';
}

// Close the database connection
$conn->close();

// Return a JSON-encoded response
header('Content-Type: application/json');
echo json_encode([
    'success' => $success,
    'message' => $message,
    'uRole' => $role
]);
?>
