<!DOCTYPE html>
<html>
<head>
    <title>Messages List</title>
    <!--fontawesome icon-->
  <script src="https://kit.fontawesome.com/b79911c0d7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <style>
        BODY{
            margin-top:25px!important;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
		  margin-bottom: 20px;
		  border: 2px solid gold;
        }

        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd!important;
            border-right: 1px solid #ddd!important;
        }

        th {
            padding: 10px;
            text-align: left;
            background-color: gold;
            color: black;
            font-family:sans-serif;
        }

        .message-content {
            
            overflow: hidden;
        }

        #content {
            background-color: #fff;
            padding-left:23%;
        }
        h2{
            font-family: Raleway, sans-serif;
            font-weight:bold!important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".view-more").click(function() {
                $(this).prev().css("max-height", "none");
                $(this).remove();
            });
        });
    </script>
</head>
<body>
<div id="sidebar">
        <?php include 'admin-dashboard.php'; ?>
    </div>
    <div id="content">
    <h2>MESSAGES<span style="color: #FDB813;"> LIST</span></h2>

    <?php
    
    // Database connection
    $conn = new mysqli("localhost", "root", "", "message");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to generate a unique token
    function generateToken() {
        $length = 10; // Length of the generated token
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $token;
    }

    // Retrieve data from messages table
    $selectQuery = "SELECT * FROM messages";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Email</th><th>Message</th><th>View</th><th>Date</th><th>Reply</th><th>Status</th><th>Delete</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["email"] . '</td>';
            echo '<td>';

            $fullMessage = $row["message"];
            $truncatedMessage = strlen($fullMessage) > 100 ? substr($fullMessage, 0, 100) . '...' : $fullMessage;
            echo '<div class="message-content">' . $truncatedMessage . '</div>';

            echo '</td>';
            echo '<td><a href="view-message.php?id=' . $row["id"] . '"><i class="fa-solid fa-eye" style="color: #51491f;padding:8px;"></i></a></td>';
            echo '<td>' . $row["created_at"] . '</td>'; // Assuming there is a 'created_at' column in your messages table for the date
            echo '<td><a href="process-reply.php?id=' . $row["id"] . '&email=' . $row["email"] . '" target="_blank"><i class="fas fa-envelope" style="color:#51491f; padding:8px;"></a></td>';
            $status = $row["status"]; // Get the status from the table
            if ($status == "replied") {
                echo '<td style="background-color:#90EE90;">REPLIED</td>';
            } else {
                echo '<td style="background-color:red;">NOT REPLIED</td>';
            }
            
           
            echo '<td><a href="delete-message.php?id=' . $row["id"] . '"><i class="fa-solid fa-trash" style="color: #51491f;padding:8px;"></i></a></td>'; // Assuming the primary key column is 'id'
            
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No data found.';
    }

    $conn->close();
    echo '</div>';
    ?>
</body>
</html>
