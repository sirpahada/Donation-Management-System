<!DOCTYPE html>
<html>
<head>
    <title>View Message</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <style>
         body {
            display: flex;
            flex-direction: row;
        }

        #sidebar {
            width: 20%;
            background-color: #f2f2f2;
            padding: 20px;
        }

        #content {
            width: 80%;
            padding: 50px;
            background-color: #fff;
        }

        .para {
            border: 1px solid #ddd!important;
            padding: 10px;
            margin-bottom: 20px;
        }

        .para:hover{
            max-height:8000px!important;
            background-color:#fff!important;
        }
        h2{
            font-family: Raleway, sans-serif;
            font-weight:bold!important;
            margin-bottom: 8px;
        }

        h4 {
            margin-bottom: 5px;
        }

        .btn {
            display: inline-block!important;
            padding: 10px 20px!important;
            background-color: #ffd700!important;
            color: black!important;
            text-decoration: none!important;
            border-radius: 4px!important;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <?php include 'admin-dashboard.php'; ?>
    </div>
    <div id="content">
        <?php
        // Retrieve the message ID from the URL parameter
        $messageId = $_GET['id'];

        // Perform necessary database connection and query to fetch the message details based on the ID
        $conn = new mysqli("localhost", "root", "", "message");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("SELECT * FROM messages WHERE id = ?");
        $stmt->bind_param("i", $messageId);

        // Execute statement
        $stmt->execute();

        // Fetch the message details
        $result = $stmt->get_result();
        $messageDetails = $result->fetch_assoc();

        // Close statement and connection
        $stmt->close();
        $conn->close();

        // Check if the message details are found
        if ($messageDetails) {
            echo '<center><h2>VIEW <span style="color:#FDB813;">MESSAGE</span></h2></center>';
            echo '<div class="message-box">';
            echo '<h4>Email:</h4> <p class="para">' . $messageDetails["email"] . '</p>';
            echo '<h4>Message:</h4> <p class="para">' . $messageDetails["message"] . '</p>';
            echo '</div>';

            // Display a reply button that redirects to the reply page
            echo '<a href="process-reply.php?id=' . $messageDetails["id"] . '&email=' . $messageDetails["email"] . '" class="btn" target="_blank">Reply</a>';
        } else {
            echo 'Message not found.';
        }
        ?>
    </div>
</body>
</html>
