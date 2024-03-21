<!DOCTYPE html>
<html>
<head>
    <title>Food Campaign</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="footer.css">
   

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alef:wght@700&family=Nunito:wght@300&display=swap" rel="stylesheet">
    
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <style>

        body {
            margin: 0;
            padding: 0;
        }

        .campaign-image-container {
            width: 900px;
            height: 500px;
            margin-top: 15px;
            margin-left: 220px;
        }

        .campaign-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .campaign-details {
            font-family: 'Nunito', sans-serif;
            
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .campaign-title {
            font-family: Raleway, sans-serif;
            color:#F5B301!important;
            font-weight: bold;
            font-size: 40px;
            margin-bottom: 10px;
            text-align: center;
            margin-top: 40px;
        }

        .campaign-description {
            font-size: 18px;
            margin-top: 40px;
            margin-bottom: 20px;
            margin-left: 120px;
            text-align: justify;
            flex: 1;
        }

        .campaign-form {
            flex: 1;
            margin-left: 20px;
            min-width: 300px; /* Add a minimum width for the form container */
            position: relative; /* Add position relative */
        }

        .disabled-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 1;
        }

        .disabled-overlay p {
            font-size: 20px;
            text-align: center;
            margin-top: 200px;
        }

        p {
            font-family: 'Nunito', sans-serif;
            margin-bottom: 1px!important;
            font-size:18px;
        }
        .ended-status {
    color: red;
}

    </style>
</head>
<body>
<?php  include("navbar.php"); ?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food_camp";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the campaign ID from the query parameter
    $campaignId = $_GET['campaignId'];
    
    // Fetch campaign details from the database based on the campaignId
    $sql = "SELECT * FROM campaigns WHERE id = $campaignId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $campaignImageURL = $row["campaignImageURL"];
        $campaignTitle = $row["campaignTitle"];
        $campaignDescription = $row["campaignDescription"];
        $campaignStatus = $row["campaignStatus"];
        $beneficiaries = $row["beneficiaries"];
        $beneficiariesLocation = $row["beneficiariesLocation"];
        $beneficiariesPhone = $row["beneficiariesPhone"];
        $campaignEndDate = $row["campaignEndDate"];

        // Display the campaign image, title, description, and form
        echo "<div class='campaign-image-container'>";
        echo "<img src='" . $campaignImageURL . "' class='campaign-image'>";
        echo "</div>";
        echo "<h3 class='campaign-title'>" . strtoupper($campaignTitle) . "</h3>"; 
        echo "<div class='campaign-details'>";

        // Display campaign status, beneficiaries, beneficiaries location, beneficiaries phone, and campaign end date
        echo "<div class='campaign-description'>";
        
        echo "<p><strong>Beneficiaries:</strong> " . $beneficiaries . "</p>";
        echo "<p><strong>Beneficiaries's Location:</strong> " . $beneficiariesLocation . "</p>";
        echo "<p><strong>Beneficiarie's Phone No.:</strong> " . $beneficiariesPhone . "</p>";
        if ($campaignStatus === "Ended") {
            echo "<p><i><strong>Campaign Status:</strong> <span class='ended-status'>" . $campaignStatus . "</span></p></i>";
        } else {
            echo "<p><i><strong>Campaign Status:</strong> " . $campaignStatus . "</p></i>";
        }
        
        echo "<p><i><strong>Campaign End Date: " . $campaignEndDate . "</p></i></strong><br/><br/>";
    
        echo $campaignDescription . "</div>";
        

        // Check if the campaign status is "Ended" and disable the form accordingly
        if ($campaignStatus === "Ended") {
            echo "<div class='campaign-form'>";
            echo "<div class='disabled-overlay'>";
            echo "<p>The campaign has ended. <br/>Donations are no longer accepted.</p>";
            echo "</div>";
            include "food.php"; // Include education.php file without query parameters
            echo "</div>";
        } else {
            echo "<div class='campaign-form'>";
            include "food.php"; // Include education.php file without query parameters
            echo "</div>";
        }

        echo "</div>";
        echo "</div>";
        echo "<div>";
        include "footer.php";
        echo "</div>";
    } else {
        echo "Campaign not found";
    }

    // Close the database connection
    $conn->close();
?>

</body>
</html>
