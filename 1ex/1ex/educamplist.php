<!DOCTYPE html>
<html>
<head>
    <title>Education Campaigns</title>
    <link rel="stylesheet" href="Cover.CSS"/>
    <!--fontawesome icon-->
    <script src="https://kit.fontawesome.com/b79911c0d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <style>
        body {
            
            margin: 0;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            font-family: Raleway, sans-serif;
            font-weight:bold!important;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #f2f2f2;
            padding: 10px;
        }

        .content {
            flex-grow: 1;
            margin-left: 20px;
        }

        table {
            width: 1050px;
            border-collapse: collapse;
          
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: gold;
            border:2px solid black;
            font-family:sans-serif;
        }

        .edit-link, .delete-link{
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
        .view-donations-link{
            text-decoration: none;
            cursor: pointer;
            background-color:#FFF44F;
            padding:6px;
            color:black;
            border-radius:5px;
        }
        .view-donations-link:hover{
            color:black;
        }
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-input {
            height: 40px;
            width: 300px;
            padding: 5px;
            background-color: lightyellow;
        }

        .add-button {
            height: 40px;
            padding: 5px 10px;
            background-color: gold;
            color: black;
            border: none;
            cursor: pointer;
            border:2px solid black;
            border-radius:5px;
        }

        .donationStatus.not-donated {
        background-color: #FF6666; 
    }

    .donationStatus.donated {
        background-color: #66CC99; 
    }
 
.campaign-count-container {
  display: flex;
  justify-content: flex-end;
  margin-bottom: 20px;
}

.campaign-count-box {
  width: 150px;
  padding: 10px;
  text-align: center;
}

#ongoing-campaign-count-box {
  background-color: gold;
  color: black;
  margin-right: 0px;
  border:1px solid gold;
}

#ended-campaign-count-box {
  background-color: black;
  color: white;
  border:1px solid black;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <!-- Adding sidebar content here -->
            <?php include('admin-dashboard.php'); ?>
        </div>
        <div class="content">
            <h2><center>EDUCATION <span style="color:orange;">CAMPAIGNS</center></h2>
            
            <div class="search-container">
                <button class="add-button" onclick="addCampaign()" style="background-color:orange;"><b>Add New Campaign</b></button>
                <input type="text" id="search-input" class="search-input" placeholder="Search Campaign Title" onkeyup="searchCampaigns()">
            </div>
            
            <div class="campaign-count-container">
                <div id="ongoing-campaign-count-box" class="campaign-count-box"></div>
                <div id="ended-campaign-count-box" class="campaign-count-box"></div>
            </div>

            <table id="campaign-table">
                <tr>
                    <th>Campaign Title</th>
                    <th>Beneficiaries</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Donation Status</th>
                </tr>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "edu_camp";

                    // Create a connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["campaignId"]) && isset($_POST["donationStatus"])) {
                        $campaignId = $_POST["campaignId"];
                        $donationStatus = $_POST["donationStatus"];

                        // Update the donation status in the database
                        $sql = "UPDATE campaigns SET donationStatus = '$donationStatus' WHERE id = $campaignId";
                        $conn->query($sql);
                    }
                    

                    // Fetch existing campaign data from the database
                    $sql = "SELECT * FROM campaigns ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $campaignId = $row["id"];
                            $donationStatusClass = $row["donationStatus"] == 'Not Donated' ? 'not-donated' : 'donated';

                            echo "<tr>";
                            echo "<td>" . $row["campaignTitle"] . "</td>";
                            echo "<td>" . $row["beneficiaries"] . "</td>";
                            echo "<td>" . $row["campaignStatus"] . "</td>";
                            echo "<td>";
                            echo "<span class='edit-link' onclick='editCampaign($campaignId)'>EDIT</span>  |     ";
                            echo "<span class='delete-link' onclick='deleteCampaign($campaignId)'><i class='fa-sharp fa-solid fa-trash' style='color: #f00000;'></i></span>   |    ";
                            echo "<a class='view-donations-link' href='edudon-bycampaign.php?campaign_id=$campaignId&campaign_title=" . urlencode($row["campaignTitle"]) . "&beneficiaries=" . urlencode($row["beneficiaries"]) . "&beneficiaries_location=" . urlencode($row["beneficiariesLocation"]) . "&beneficiaries_phone=" . urlencode($row["beneficiariesPhone"]) . "&campaign_end_date=" . urlencode($row["campaignEndDate"]) . "&donation_status=" . urlencode($row["donationStatus"]) . "&updated_donation_status=true'>View Donations</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<form method='POST' action=''>";
                            echo "<input type='hidden' name='campaignId' value='$campaignId'>";
                            echo "<select name='donationStatus' class='donationStatus $donationStatusClass' onchange='this.form.submit()'>";
                            echo "<option value='Not Donated' " . ($row["donationStatus"] == 'Not Donated' ? 'selected' : '') . "><b>NOT DONATED</b></option>";
                            echo "<option value='Donated' " . ($row["donationStatus"] == 'Donated' ? 'selected' : '') . "><b>DONATED</b></option>";
                            echo "</select>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No campaigns available</td></tr>";
                    }

                    // Close the database connection
                    $conn->close();
                ?>
            </table>
        </div>
    </div>

    <script>
        function editCampaign(campaignId) {
            // Redirect to the edit campaign page with the campaignId as a parameter
            window.location.href = "edit_campaign.php?id=" + campaignId;
        }

        function deleteCampaign(campaignId) {
            // Prompt the user for confirmation before deleting the campaign
            if (confirm("Are you sure you want to delete this campaign?")) {
                // Redirect to the delete campaign page with the campaignId as a parameter
                window.location.href = "delete_campaign.php?id=" + campaignId;
            }
        }

        function searchCampaigns() {
            var input = document.getElementById("search-input").value.toLowerCase();
            var table = document.getElementById("campaign-table");
            var rows = table.getElementsByTagName("tr");

            for (var i = 1; i < rows.length; i++) {
                var title = rows[i].getElementsByTagName("td")[0].innerText.toLowerCase();
                if (title.indexOf(input) > -1) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        function addCampaign() {
            // Redirect to the add campaign page
            window.location.href = "addeducamp.php";
        }
         function updateCampaignCount() {
            var ongoingCount = 0;
            var endedCount = 0;
            var table = document.getElementById("campaign-table");
            var rows = table.getElementsByTagName("tr");

            for (var i = 1; i < rows.length; i++) {
                var status = rows[i].getElementsByTagName("td")[2].innerText.toLowerCase();
                if (status === "ongoing") {
                    ongoingCount++;
                } else if (status === "ended") {
                    endedCount++;
                }
            }

            document.getElementById("ongoing-campaign-count-box").innerHTML = "<b>Ongoing Campaigns:</b> " + ongoingCount;
            document.getElementById("ended-campaign-count-box").innerHTML = "<b>Ended Campaigns:</b> " + endedCount;
        }

        // Call the function to initially update the campaign counts
        updateCampaignCount();
    </script>
</body>
</html>
