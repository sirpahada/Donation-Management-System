<?php
// Get the ID of the message to delete
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create connection
    $conn = new mysqli("localhost", "root", "", "message");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the message from the database
    $deleteQuery = "DELETE FROM messages WHERE id = $id";
    $result = $conn->query($deleteQuery);

    if ($result) {
        // Update the IDs
        $updateQuery = "ALTER TABLE messages AUTO_INCREMENT = 1";
        $conn->query($updateQuery);
    }

    $conn->close();
}

// Redirect back to the messages list
header("Location: message.php");
exit();
?>
