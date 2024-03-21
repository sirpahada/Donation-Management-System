<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
    <title>Donation List</title>
    <!--fontawesome icon-->
    <script src="https://kit.fontawesome.com/b79911c0d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 1200px;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 2px solid gold;
        }

        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd!important;
            border-right: 1px solid #ddd!important;
        }

        th {
            padding: 8px;
            text-align: left;
            background-color: gold;
            color: black;
            border-right: 1px solid #ddd!important;
            font-family: sans-serif;
        }
		.content{
			padding-left:155px!important;
		}
		h2{
            font-family: Raleway, sans-serif;
            font-weight:bold!important;
        }
    </style>
</head>
<body>
	<div id="sidebar">
        <?php include 'admin-dashboard.php'; ?>
    </div>
    <div class="content">
        <h2><center>DONATION <SPAN STYLE="color: #FDB813;">LIST</SPAN></center></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Campaign Title</th>
                <th>Email</th>
                <th>Location</th>
                <th>Collection Method</th>
                <th>Donation Date/ Time</th>
                <th>View Details</th>
                <th>Collection Status</th>
                <th>Donation Status</th>
                <th>Delete</th>
            </tr>
            <?php
            // Assuming your database credentials
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'food';

            // Create a database connection
            $conn = mysqli_connect($hostname, $username, $password, $database);

            // Check if the connection was successful
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

                        // Check if the form was submitted for deleting a donation
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
        // Get the ID from the form
        $id = $_POST["delete"];

        // Delete the donation from the database
        $sql = "DELETE FROM donations WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Show an alert box to indicate the donation was deleted successfully
            echo "<script>alert('Donation deleted successfully.');</script>";
        } else {
            // Show an alert box to indicate the deletion failed
            echo "<script>alert('Failed to delete donation.');</script>";
        }
    }
            
            // Check if the form was submitted for updating status
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"]) && isset($_POST["status"])) {
                // Get the ID and status from the form
                $id = $_POST["id"];
                $status = $_POST["status"];

                // Update the status in the database
                $sql = "UPDATE donations SET status='$status' WHERE id='$id'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    // Show an alert box to indicate the status was updated successfully
                    echo "<script>alert('Status updated successfully.');</script>";
                } else {
                    // Show an alert box to indicate the status update failed
                    echo "<script>alert('Failed to update status.');</script>";
                }
            }
             
             


            // Retrieve data from the database
            $sql = "SELECT * FROM donations";
            $result = mysqli_query($conn, $sql);

            // Display the data in a table
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>";
                    if (isset($row["name"])) {
                        echo $row["name"];
                    }
                    echo "</td>";
                    echo "<td>" . $row["campaignTitle"] . "</td>";
                    echo "<td>";
                    if (isset($row["email"])) {
                        echo $row["email"];
                    }
                    echo "</td>";
                    echo "<td>";
                    if (isset($row["location"])) {
                        echo $row["location"];
                    }
                    echo "</td>";
                    echo "<td>";
                    if (isset($row["collectionMethod"])) {
                        echo $row["collectionMethod"];
                    }
                    echo "</td>";
                    echo "<td>";
                    if (isset($row["donationDate"])) {
                        echo $row["donationDate"];
                    }
                    echo "</td>";
                    echo "<td><a href='fooddonationdetail.php?id=" . $row["id"]  . "&status=" . $row["status"] . "'><center><i class='fa-solid fa-eye' style='color: #51491f;padding:8px;'></center></a></td>";
                    echo "<td>";
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                    echo '<select name="status" onchange="this.form.submit()">';
                    echo '<option value="Not Collected" ' . ($row["status"] === "Not Collected" ? "selected" : "") . '>Not Collected</option>';
                    echo '<option value="Collected" ' . ($row["status"] === "Collected" ? "selected" : "") . '>Collected</option>';
                    echo '</select>';
                    
                    echo '</form>';
                    
                    echo "</td>";
                    echo "<td>";
                    if (isset($row["donationStatus"])) {
                        echo $row["donationStatus"];
                    }
                    echo "</td>";
                    echo "<td>
                        <form action='' method='post' onsubmit='return confirmDelete()'>
                            <input type='hidden' name='delete' value='" . $row["id"] . "'>
                            <center><button type='submit' style='background: none; border: none; cursor: pointer;'><i class='fa-sharp fa-solid fa-trash' style='color: #f00000;'></i></button></center>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No results found.</td></tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </table>
    </div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this donation?");
        }
    </script>
</body>
</html>
