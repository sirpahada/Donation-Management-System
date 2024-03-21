<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edu_camp";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the campaignId is provided in the request
if (isset($_GET['id'])) {
    $campaignId = $_GET['id'];

    // Prepare and execute the SQL query to delete the campaign
    $sql = "DELETE FROM campaigns WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $campaignId);

    if ($stmt->execute()) {
        // Campaign deleted successfully
        echo "<script>alert('Campaign deleted successfully.');</script>";
        echo "<script>window.location.href = 'educamplist.php';</script>";
    } else {
        // Failed to delete the campaign
        echo "<script>alert('Failed to delete campaign: " . $stmt->error . "');</script>";
        echo "<script>window.location.href = 'educamplist.php';</script>";
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Invalid request, campaignId is not provided
    echo "<script>alert('Invalid request.');</script>";
    echo "<script>window.location.href = 'educamplist.php';</script>";
}

// Close the database connection
$conn->close();
?>
