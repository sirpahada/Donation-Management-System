<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donor";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donorID = $_POST["username"];
    $donorPassword = $_POST["pw"];

    // Check if donor ID and password match
    $checkQuery = "SELECT * FROM donor_table WHERE donor_id = ?";
    $checkStatement = $conn->prepare($checkQuery);
    $checkStatement->bind_param("s", $donorID);
    $checkStatement->execute();
    $checkResult = $checkStatement->get_result();

    if ($checkResult->num_rows == 1) {
        $row = $checkResult->fetch_assoc();
        $hashedPassword = $row["donor_password"];

        if (password_verify($donorPassword, $hashedPassword)) {
            // Authentication successful, store user information in session
            $_SESSION["donor_id"] = $row["donor_id"];
            $_SESSION["fullname"] = $row["fullname"];
            $_SESSION["location"] = $row["location"];
            $_SESSION["username"] = $donorID;
            // Set the user_type session value
            $_SESSION["user_type"] = "donor";
            // Redirect to the authenticated page
            header("Location: index.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid username or password.";
            header("Location: donor-login.php");
            exit();
        }
    } else {
        // Invalid username
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: donor-login.php");
        exit();
    }
}

$conn->close();
