<?php
// Database configuration
$dbHost = 'localhost';
$dbUsername = '';
$dbPassword = 'root';
$dbName = 'education';

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user inputs
function sanitizeInput($input)
{
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($input)));
}

// Function to validate email
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $location = sanitizeInput($_POST['location']);
    $materials = isset($_POST['materials']) ? $_POST['materials'] : [];
    $material_amount = sanitizeInput($_POST['material_amount']);
    $description = sanitizeInput($_POST['description']);
    $collection_method = sanitizeInput($_POST['collection_method']);

    // Validate email
    if (!validateEmail($email)) {
        die("Invalid email address");
    }

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO donations (name, email, location, material, material_amount, description, collection_method)
            VALUES ('$name', '$email', '$location', '" . implode(',', $materials) . "', '$material_amount', '$description', '$collection_method')";

    if ($conn->query($sql) === TRUE) {
        echo "Donation submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
