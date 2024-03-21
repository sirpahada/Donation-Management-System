<br\>
<?php
// define variables and set to empty values
$email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $message = test_input($_POST["message"]);

  // Create connection
  $conn = new mysqli("localhost", "root", "", "message");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and bind SQL statement
  $stmt = $conn->prepare("INSERT INTO messages (email, message) VALUES (?, ?)");
  $stmt->bind_param("ss", $email, $message);

  // Execute statement
  $stmt->execute();

  // Close statement and connection
  $stmt->close();
  $conn->close();
}

// Function to test input and prevent XSS attacks
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="email" name="email" class="text-input contact-input" placeholder="Your Email Address.." style="padding:10px;"><br/><br/>
    <textarea name="message" class="text-input contact-input" placeholder="Your Message.." style="padding:10px; height:100px; margin-bottom:8px;"></textarea>
    <button type="submit" class="btn  btn-big" style="background-color:#ffdf00; padding:8px; width:100px;">
        <i class="fas fa-envelope"></i> <b>Send</b>
    </button>
</form>
  