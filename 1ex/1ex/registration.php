<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminID = $_POST["username"];
    $address=$_POST["address"];
    $adminPassword = $_POST["pw"];
    $confirmPassword = $_POST["confirm_pw"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["mobile"];
    $fullname = $_POST["fullname"];
    $position = $_POST["position"];

    // Check if admin ID is already taken
    $checkQuery = "SELECT * FROM admin_table WHERE admin_id = ?";
    $checkStatement = $conn->prepare($checkQuery);
    $checkStatement->bind_param("s", $adminID);
    $checkStatement->execute();
    $checkResult = $checkStatement->get_result();

    if ($checkResult->num_rows > 0) {
        echo "Admin Username already taken. Please choose a different one.";
        $conn->close();
        exit();
    }

    // Check if password and confirm password match
    if ($adminPassword != $confirmPassword) {
        echo "Passwords do not match. Please try again.";
        $conn->close();
        exit();
    }

    // Insert new admin into the database
    $insertQuery = "INSERT INTO admin_table (admin_id, admin_password, fullname, address, position, email, phone_number) VALUES (?, ?, ?, ?, ?, ?,?)";
    $insertStatement = $conn->prepare($insertQuery);
    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT); // Hash the password
    $insertStatement->bind_param("sssssss", $adminID, $hashedPassword, $fullname,$address, $position, $email, $phoneNumber);

    if ($insertStatement->execute()) {
        // Set session variables
        $_SESSION['username'] = $adminID;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;

        echo '<script>alert("Registration successful! Please login.."); window.location = "admin-login.php";</script>';
        exit();
    } else {
        echo "Error: " . $insertStatement->error;
    }

    $insertStatement->close();
    $conn->close();
}
?>
