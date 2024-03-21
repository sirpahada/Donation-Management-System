<!DOCTYPE html>
<html>
<head>
    <title>Edit Clothes Campaign</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <style>
        .content {
            margin: 0 auto;
            width: 80%;
            margin-top: 50px;
        }

        .sirpa {
            float: right;
            width: 80%;
            font-family: Raleway, sans-serif;
            
        }

        .white {
            float: right;
            width: 80%;
            color: #FDB813;
            font-weight: bold;
            font-family: Raleway, sans-serif;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>


<div class="col-md-10 content">
    <h2 class="white">EDIT <span style="color:black;">CLOTHES</span> CAMPAIGN</h2>

    <?php
    $campaignId = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cloth_camp";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $campaignTitle = $_POST["campaignTitle"];
        $campaignDescription = $_POST["campaignDescription"];
        $beneficiaries = $_POST["beneficiaries"];
        $beneficiariesLocation = $_POST["beneficiariesLocation"];
        $beneficiariesPhone = $_POST["beneficiariesPhone"];
        $campaignEndDate = $_POST["campaignEndDate"];
        $campaignStatus = ($campaignEndDate < date("Y-m-d")) ? "Ended" : "Ongoing";
    
        $imageOption = $_POST["imageOption"];
    
        if ($imageOption === "url") {
            $campaignImageURL = $_POST["campaignImageURL"];
        } else if ($imageOption === "file") {
            if (!empty($_FILES["campaignImageFile"]["tmp_name"])) {
                $targetDirectory = "uploads/";
                $targetFile = $targetDirectory . basename($_FILES["campaignImageFile"]["name"]);
                $uploadSuccess = move_uploaded_file($_FILES["campaignImageFile"]["tmp_name"], $targetFile);
                if ($uploadSuccess) {
                    $campaignImageURL = $targetFile;
                } else {
                    echo "Error uploading the file. Error code: " . $_FILES["campaignImageFile"]["error"];
                }
            }
        }
    
        // Save the updated data in the database
        $sql = "UPDATE campaigns SET campaignTitle=?, campaignDescription=?, campaignImageURL=?, beneficiaries=?, beneficiariesLocation=?, beneficiariesPhone=?, campaignEndDate=?, campaignStatus=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $campaignTitle, $campaignDescription, $campaignImageURL, $beneficiaries, $beneficiariesLocation, $beneficiariesPhone, $campaignEndDate, $campaignStatus, $campaignId);
    
        if ($stmt->execute()) {
            // Redirect to the same page with a success parameter
            header("Location: editc_campaign.php?id=$campaignId&success=true");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    
    
    
    // Fetch existing campaign data from the database
    $sql = "SELECT * FROM campaigns WHERE id=$campaignId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $campaignTitle = $row["campaignTitle"];
        $campaignDescription = $row["campaignDescription"];
        $campaignImageURL = $row["campaignImageURL"];
        $beneficiaries = $row["beneficiaries"];
        $beneficiariesLocation = $row["beneficiariesLocation"];
        $beneficiariesPhone = $row["beneficiariesPhone"];
        $campaignEndDate = $row["campaignEndDate"];
        $campaignStatus = ($row["campaignEndDate"] < date("Y-m-d")) ? "Ended" : "Ongoing";

        include('admin-dashboard.php'); 

        echo '<div class="sirpa">';
        echo '<form action="' . $_SERVER['PHP_SELF'] . '?id=' . $campaignId . '" method="post" enctype="multipart/form-data">';
    
        echo '<div class="form-group">';
        echo '<br>';
        echo '<label for="campaignTitle">Campaign Title:</label>';
        echo '<input type="text" class="form-control" name="campaignTitle" value="' . $campaignTitle . '" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="campaignDescription">Campaign Description:</label>';
        echo '<textarea class="form-control" name="campaignDescription" rows="5" required>' . $campaignDescription . '</textarea>';
        echo '</div>';

       echo '<div class="form-group">';
echo '<label for="imageOption">Campaign Image:</label>';
echo '<div class="form-check">';
echo '<input class="form-check-input" type="radio" name="imageOption" id="urlRadio" value="url" checked>';
echo '<label class="form-check-label" for="urlRadio">URL</label>';
echo '</div>';
echo '<div class="form-check">';
echo '<input class="form-check-input" type="radio" name="imageOption" id="fileRadio" value="file">';
echo '<label class="form-check-label" for="fileRadio">File</label>';
echo '</div>';
echo '</div>';

echo '<div class="form-group" id="urlImageContainer">';
echo '<label for="campaignImageURL">Campaign Image URL:</label>';
echo '<input type="text" class="form-control" id="campaignImageURL" name="campaignImageURL" value="' . $campaignImageURL . '">';
echo '</div>';

echo '<div class="form-group" id="fileImageContainer" style="display: none;">';
echo '<label for="campaignImageFile">Campaign Image File:</label>';
echo '<input type="file" class="form-control-file" id="campaignImageFile" name="campaignImageFile">';
echo '</div>';


   
        

        echo '<div class="form-group">';
        echo '<label for="beneficiaries">Beneficiaries:</label>';
        echo '<input type="text" class="form-control" name="beneficiaries" value="' . $beneficiaries . '" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="beneficiariesLocation">Location of Beneficiaries:</label>';
        echo '<input type="text" class="form-control" name="beneficiariesLocation" value="' .  $beneficiariesLocation . '"required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="beneficiariesPhone">Phone Number of Beneficiaries:</label>';
        echo '<input type="text" class="form-control" name="beneficiariesPhone" value="' .  $beneficiariesPhone . '"required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="campaignEndDate">Campaign End Date:</label>';
        echo '<input type="date" class="form-control" name="campaignEndDate" value="' . $campaignEndDate . '" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="campaignStatus">Campaign Status:</label>';
        echo '<input type="text" class="form-control" name="campaignStatus" value="' . $campaignStatus . '" readonly>';
        echo '</div>';
       
echo '<div class="form-group">';
echo '<label for="campaignImage">Campaign Image:</label>';
if (!empty($campaignImageURL)) {
    echo '<img src="' . $campaignImageURL . '" width="200" height="200">';
}
echo '</div>';
        echo '<br/><center><button type="submit" class="btn btn-primary" style="background-color:gold; border:1px solid gold;">Save Changes</button></center>';
        echo '</form>';
        echo '</div>';
    } else {
        echo "<p>No campaign found with the specified ID.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

    <?php
    // Display success message if provided via URL parameter
    if (isset($_GET["success"]) && $_GET["success"] === "true") {
        echo '<div class="alert alert-success">Campaign updated successfully!</div>';
    }
    ?>
    <script>
        // Update campaign status automatically based on the campaign end date
        var campaignEndDate = document.querySelector('input[name="campaignEndDate"]');
        var campaignStatus = document.querySelector('input[name="campaignStatus"]');

        campaignEndDate.addEventListener('change', function() {
            var today = new Date();
            var endDate = new Date(campaignEndDate.value);

            if (endDate < today) {
                campaignStatus.value = 'Ended';
            } else {
                campaignStatus.value = 'Ongoing';
            }
        });

        // Check the image option and show/hide the corresponding input field
var urlRadio = document.getElementById('urlRadio');
var fileRadio = document.getElementById('fileRadio');
var urlImageContainer = document.getElementById('urlImageContainer');
var fileImageContainer = document.getElementById('fileImageContainer');

urlRadio.addEventListener('change', function() {
    urlImageContainer.style.display = 'block';
    fileImageContainer.style.display = 'none';
});

fileRadio.addEventListener('change', function() {
    urlImageContainer.style.display = 'none';
    fileImageContainer.style.display = 'block';
});

    </script>
</div>
</body>
</html>
