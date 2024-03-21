<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "message");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a unique token
function generateToken() {
    $length = 10; // Length of the generated token
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $token;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['email'])) {
    $messageID = $_GET['id'];
    $email = $_GET['email'];
    $status = 'replied'; // Set the status to "replied"

    // Update the status in the database
    $updateQuery = "UPDATE messages SET status='$status' WHERE id='$messageID' AND email='$email'";
    $conn->query($updateQuery);
}

$conn->close();

// Redirect to Gmail compose page
$composeURL = 'https://mail.google.com/mail/?view=cm&to=' . $email . '&mid=' . $messageID . '&token=' . generateToken();
header("Location: " . $composeURL);
exit();
?>
