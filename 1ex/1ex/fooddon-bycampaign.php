<!DOCTYPE html>
<html>
<head>
    <title>Donation List</title>
    <!--fontawesome icon-->
    <script src="https://kit.fontawesome.com/b79911c0d7.js" crossorigin="anonymous"></script>
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
        }
        .content{
            padding-left:155px!important;
        }
        .search-container {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .search-container input[type=text] {
            padding: 10px;
            width: 300px;
        }
        .total-donations {
            background-color: #f0f0f0;
            padding: 10px;
            margin-bottom: 20px;
            width:100px;
            height:100px;
        }
    </style>
</head>
<body>
<div id="sidebar">
    <?php include 'admin-dashboard.php'; ?>
</div>
<div class="content">
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

// Check if the donation status value is received from another file
if (isset($_GET['donation_status'])) {
    // Get the donation status from the URL parameter
    $donationStatus = $_GET['donation_status'];
    $campaignId = $_GET['campaign_id'];

    // Update the donation status in the "education" database
    $sql = "UPDATE donations SET donationStatus = '$donationStatus' WHERE campaignId = '$campaignId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Show an alert box to indicate the donation status was updated successfully
        echo "<script>alert('Donation status updated successfully.');</script>";
    } else {
        // Show an alert box to indicate the update failed
        echo "<script>alert('Failed to update donation status.');</script>";
    }
}
$beneficiaries = isset($_GET['beneficiaries']) ? $_GET['beneficiaries'] : '';
$beneficiaries_location = isset($_GET['beneficiaries_location']) ? $_GET['beneficiaries_location'] : '';
$beneficiaries_phone = isset($_GET['beneficiaries_phone']) ? $_GET['beneficiaries_phone'] : '';
$campaign_end_date = isset($_GET['campaign_end_date']) ? $_GET['campaign_end_date'] : '';



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


    // Fetch the donations for the specified campaign
    $sql = "SELECT * FROM donations WHERE campaignId = '$campaignId'";
    $result = mysqli_query($conn, $sql);

    // Display the donation list
    if (mysqli_num_rows($result) > 0) {
        // Display the donation details in a table
        echo "<div class='search-container'>
                <form method='GET'>
                    <input type='text' placeholder='Search...' name='search'>
                    <button type='submit'><i class='fa-solid fa-search'></i></button>
                </form>
            </div>";

        echo "<div class='total-donations'>Total Donations: " . mysqli_num_rows($result) . "</div>";

        

        echo "<table>";
        echo "<tr>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Collection Method</th>
                <th>Donation Date/ Time </th>
                <th>View Details</th>
                <th>Collection Status</th>
                <th>Donation Status</th>
                <th>Delete</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // Display the donation details
            echo "<td>";
            if (isset($row["name"])) {
                echo $row["name"];
            }
            echo "</td>";

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
            echo "</td>";
            echo "<td>";
            if (isset($row["donationDate"])) {
                echo $row["donationDate"];
            }
            echo "</td>";

            echo "<td><a href='fooddonationdetail.php?id=" . $row["id"] . "&beneficiaries=" . urlencode($beneficiaries) . "&beneficiaries_location=" . urlencode($beneficiaries_location) . "&beneficiaries_phone=" . urlencode($beneficiaries_phone) . "&campaign_end_date=" . urlencode($campaign_end_date) . "'><center><i class='fa-solid fa-eye' style='color: #51491f;padding:8px;'></center></a></td>";

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
if (isset($donationStatus)) {
    echo $donationStatus;
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

        echo "</table>";
    } else {
        echo "No donations found for the specified campaign.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this donation?");
        }
    </script>
</div>
</body>
</html>
