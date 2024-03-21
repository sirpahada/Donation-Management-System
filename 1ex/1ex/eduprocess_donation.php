<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "education";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please login first.');</script>";
    echo "<script>window.location.href = 'donor-login.php';</script>"; // Replace "login.php" with the actual login page URL
    exit();
}
// Process the form submission
if (isset($_POST['submit'])) { // Changed from 'submit' to 'donationStatus'
    // Sanitize and validate form data
    $materials = sanitizeInput(implode(", ", $_POST['materials'])); // Convert array to comma-separated string
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $location = sanitizeInput($_POST['location']);

    $book_amount = sanitizeInput($_POST['book_amount']);
    $copy_amount = sanitizeInput($_POST['copy_amount']);
    $pen_amount = sanitizeInput($_POST['pen_amount']);
    $bag_amount = sanitizeInput($_POST['bag_amount']);
    $shoes_amount = sanitizeInput($_POST['shoes_amount']);
    $other_amount = sanitizeInput($_POST['other_amount']);
    $description = sanitizeInput($_POST['description']);
    $collection_method = sanitizeInput($_POST['collection_method']);
    $status = sanitizeInput($_POST['status']);
    $donationStatus = sanitizeInput($_POST["donationStatus"]);


    // Retrieve the campaign ID and campaign title from the form submission
    $campaignId = $_POST['campaignId'];
    $campaignTitle = $_POST['campaignTitle'];

    // Get the username from the session variable
    $username = $_SESSION['username'];

    // Validate form data
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($location)) {
        $errors[] = "Location is required.";
    }

    if (empty($materials)) {
        $errors[] = "Materials is required.";
    }

    // Check for errors before inserting data into the database
    if (empty($errors)) {
        // Insert the form data into the "donations" table with prepared statements
        $stmt = $conn->prepare("INSERT INTO donations (campaignId, campaignTitle, name, email, location, materials, bookAmount, copyAmount, penAmount, bagAmount, shoesAmount, otherAmount, description, collectionMethod, username, status, donationStatus)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssss", $campaignId, $campaignTitle, $name, $email, $location, $materials, $book_amount, $copy_amount, $pen_amount, $bag_amount, $shoes_amount, $other_amount, $description, $collection_method, $username, $status, $donationStatus);
        $stmt->execute();
        $stmt->close();

        // Redirect to the campaign page or any other desired location
        header("Location: thank.php");
        exit();
    } else {
        // Display error messages in an alert box
        echo "<script>alert('" . implode('\n', $errors) . "');</script>";
    }
}

// Function to sanitize form input
function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Close the database connection
$conn->close();
?>
