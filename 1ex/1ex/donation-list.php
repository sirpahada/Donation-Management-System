<?php
// Assuming your database credentials
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'education';

// Create a database connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$campaignId = $_GET['campaignId'];
$campaignTable = "campaign_" . $campaignId;

// Retrieve the donation data for the campaign
$sql = "SELECT * FROM $campaignTable";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display the donation list
    echo "<table>";
    echo "<tr><th>Name</th><th>Email</th><th>Location</th><th>Materials</th><th>Book Amount</th><th>Copy Amount</th><th>Pen Amount</th><th>Bag Amount</th><th>Shoes Amount</th><th>Other Amount</th><th>Description</th><th>Collection Method</th><th>Donation Date</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['materials'] . "</td>";
        echo "<td>" . $row['book_amount'] . "</td>";
        echo "<td>" . $row['copy_amount'] . "</td>";
        echo "<td>" . $row['pen_amount'] . "</td>";
        echo "<td>" . $row['bag_amount'] . "</td>";
        echo "<td>" . $row['shoes_amount'] . "</td>";
        echo "<td>" . $row['other_amount'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['collection_method'] . "</td>";
        echo "<td>" . $row['donation_date'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No donations found";
}

// Close the database connection
mysqli_close($conn);
?>
