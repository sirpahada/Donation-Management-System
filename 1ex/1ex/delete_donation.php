<?php
// Assuming your database credentials
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'education';

// Create a database connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the donation ID is provided in the URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Delete the donation from the database
    $sql = "DELETE FROM donations WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Donation deleted successfully.');</script>";
        // Redirect back to the donation list page
        echo "<script>window.location.href = 'aedu.php';</script>";
    } else {
        echo "<script>alert('Failed to delete donation.');</script>";
        // Redirect back to the donation list page
        echo "<script>window.location.href = 'aedu.php';</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
