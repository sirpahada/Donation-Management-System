<!DOCTYPE html>
<html>
<head>
    <title>Health Campaigns</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
  
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 5px;
        }

        h2 {
            font-family: Raleway, sans-serif;
    font-size: 33px;
    font-weight: bold!important;
            margin-top: 100px!important;
            margin-bottom: 40px!important;
        }

        #campaignsContainer {
            text-align: center;
        }

        .campaign-card {
            display: inline-block;
            width: 300px;
            height: 350px;
            border: 1px solid yellow;
            border-radius: 5px;
            padding: 10px;
            margin: 5px!important;
            margin-bottom: 15px!important;
            cursor: pointer;
        }

        .campaign-image {
            width: 100%;
            height: 200px;
            margin-bottom: 10px;
            margin-top: 0px;
        }

        .campaign-title {
            font-family: Raleway, sans-serif;
            font-weight: bold;
            margin-bottom: 5px;
            color: black;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .campaign-status {
            font-family: Raleway, sans-serif;
            font-weight: bold;
            margin-bottom: 8px;
            text-align: left;
        }

        .campaign-status-ongoing {
            color: green;
        }

        .campaign-status-ended {
            color: red;
        }

        .campaign-progress-bar {
            background-color: #f1f1f1;
            height: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .campaign-progress {
            background-color: #ffffcc;
            height: 10px;
            border-radius: 5px;
            transition: width 0.3s ease-in-out;
        }

        .donate-button {
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            margin-left:76%;
            
        }
        .search-input {
            height: 40px;
            width: 300px;
            padding: 5px;
            background-color: lightyellow;
            color:black;
            border-radius:10px;
        }
    </style>
</head>
<body>
<?php $IPATH=$_SERVER["DOCUMENT_ROOT"]."/1ex/1ex/"; include($IPATH."navbar.php"); ?>
    <h2 class="text-center">HEALTH<span style="color:#FDB813;"> CAMPAIGNS</span></h2>
    <div class="search-container">
              
                <input type="text" id="search-input" class="search-input" placeholder="Search Campaign Title" onkeyup="searchCampaigns()">
            </div>
    <div class="container">
        <div class="row justify-content-center" id="campaignsContainer">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "health_camp";

                // Create a connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch existing campaign data from the database
                $sql = "SELECT * FROM campaigns ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $campaignId = $row["id"];
                        echo "<div class='col-md-4'>";
                        echo "<a href='camp-health.php?campaignId=$campaignId'>";
                        echo "<div class='campaign-card' style='background-color:#ffffcc;'>";
                        echo "<img src='" . $row["campaignImageURL"] . "' class='campaign-image'><br/>";

                        // Check the length of the title
                        $campaignTitle = $row["campaignTitle"];
                        if (strlen($campaignTitle) > 25) {
                            // Apply ellipsis to long titles
                            echo "<h3 class='campaign-title'>" . substr($campaignTitle, 0, 25) . "...</h3>";
                        } else {
                            // Display the full title for short titles
                            echo "<h3 class='campaign-title'>" . $campaignTitle . "</h3>";
                        }

                        // Display the campaign status with appropriate color
                        $campaignStatus = $row["campaignStatus"];
                        $campaignStatusClass = $campaignStatus === "Ongoing" ? "campaign-status-ongoing" : "campaign-status-ended";
                    echo "<p class='campaign-status $campaignStatusClass'><span style='text-decoration:none; font-weight: normal;color:black;'>Status:</span> " . $campaignStatus . "</p>";

                        echo "<div class='donate-button' style='background-color: #ffae00; color:black;'>Donate Now</div>";
                        echo "</div>";
                        echo "</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='col text-center'>No campaigns available</div>";
                }

                // Close the database connection
                $conn->close();
            ?>
        </div>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
         function searchCampaigns() {
            var input = document.getElementById('search-input').value.toLowerCase();
            var campaigns = document.getElementById('campaignsContainer').getElementsByClassName('campaign-card');
            
            for (var i = 0; i < campaigns.length; i++) {
                var title = campaigns[i].getElementsByClassName('campaign-title')[0].textContent.toLowerCase();
                
                if (title.indexOf(input) > -1) {
                    campaigns[i].style.display = '';
                } else {
                    campaigns[i].style.display = 'none';
                }
            }
        }
</script>
</body>
</html>
