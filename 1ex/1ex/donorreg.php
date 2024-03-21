<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donor";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donorID = $_POST["username"];
    $donorPassword = $_POST["pw"];
    $confirmPassword = $_POST["confirm_pw"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["mobile"];
    $fullname = $_POST["fullname"];
    $location = $_POST["location"];

    // Check if donor ID is already taken
    $checkQuery = "SELECT * FROM donor_table WHERE donor_id = ?";
    $checkStatement = $conn->prepare($checkQuery);
    $checkStatement->bind_param("s", $donorID);
    $checkStatement->execute();
    $checkResult = $checkStatement->get_result();

    if ($checkResult->num_rows > 0) {
        echo "donor ID already taken. Please choose a different one.";
        $conn->close();
        exit();
    }

    // Check if password and confirm password match
    if ($donorPassword != $confirmPassword) {
        echo "Passwords do not match. Please try again.";
        $conn->close();
        exit();
    }

    // Insert new donor into the database
    $insertQuery = "INSERT INTO donor_table (donor_id, donor_password, fullname, location, email, phone_number) VALUES (?, ?, ?, ?, ?, ?)";
    $insertStatement = $conn->prepare($insertQuery);
    $hashedPassword = password_hash($donorPassword, PASSWORD_DEFAULT); // Hash the password
    $insertStatement->bind_param("ssssss", $donorID, $hashedPassword, $fullname, $location, $email, $phoneNumber);

    if ($insertStatement->execute()) {
        echo '<script>alert("Registration successful! Please login.."); window.location = "donor-login.php";</script>';
        exit();
    } else {
        echo "Error: " . $insertStatement->error;
    }

    $insertStatement->close();
    $conn->close();
}
?>