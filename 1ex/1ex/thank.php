<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
// Include the PHPMailer library
require 'C:\Users\Tisa Hada\Desktop\xampp\htdocs\1ex\1ex\src\PHPMailer.php';
require 'C:\Users\Tisa Hada\Desktop\xampp\htdocs\1ex\1ex\src\SMTP.php';
require 'C:\Users\Tisa Hada\Desktop\xampp\htdocs\1ex\1ex\src\Exception.php';

// Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "education";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_SESSION['username'];

// Retrieve the donor's email address from the database
$stmt = $conn->prepare("SELECT email FROM donations WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$email = $row['email'];
$stmt->close();

// Send thank you email to the donor
$thankYouSubject = "Thank You for Your Donation";
$thankYouMessage = "Dear Donor,\n\nThank you for your generous donation. We appreciate your support in helping us provide for those in need.\n\nSincerely,\nThe SAAN Team";

$mail = new PHPMailer();

// Configure SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'Senderformail@gmail.com'; 
$mail->Password = 'wbkrebmidkocxpuw'; 
$mail->Port = 587; // Replace with the appropriate port number
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->addAddress($email);
$mail->setFrom('Senderformail@gmail.com', 'SANN'); 


$mail->addAddress($email); // Recipient email address

$mail->Subject = $thankYouSubject;
$mail->Body = $thankYouMessage;

// Send the thank you email
if ($mail->send()) {
    echo "<script>alert('We have received your form, Thank you for your donation! We kindly encourage you to explore other ongoing campaigns as well. ');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
} else {
    echo "<script>alert('Failed to send the thank you email.');</script>";
}

// Close the database connection
$conn->close();
?>
