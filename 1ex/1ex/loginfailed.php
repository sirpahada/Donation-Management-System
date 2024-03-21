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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminID = $_POST["username"];
    $adminPassword = $_POST["pw"];

    // Check if admin ID and password match
    $checkQuery = "SELECT * FROM admin_table WHERE admin_id = ?";
    $checkStatement = $conn->prepare($checkQuery);
    $checkStatement->bind_param("s", $adminID);
    $checkStatement->execute();
    $checkResult = $checkStatement->get_result();

    if ($checkResult->num_rows == 1) {
        $row = $checkResult->fetch_assoc();
        $hashedPassword = $row["admin_password"];

        if (password_verify($adminPassword, $hashedPassword)) {
            // Authentication successful, store user information in session
            $_SESSION["admin_id"] = $row["admin_id"];
            $_SESSION["fullname"] = $row["fullname"];
            $_SESSION["position"] = $row["position"];
            $_SESSION["username"] = $adminID;
            // Set the user_type session value
             $_SESSION["user_type"] = "admin";
            // Redirect to the authenticated page
            header("Location: index.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid username or password.";
            header("Location: admin-login.php");
            exit();
        }
    } else {
        // Invalid username
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: admin-login.php");
        exit();
    }
}

$conn->close();
