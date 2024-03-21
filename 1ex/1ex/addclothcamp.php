<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Clothes Campaign</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS styles */
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

        .status-box {
            padding: 10px;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            width: 120px;
            margin-top: 10px;
        }

        .status-ongoing {
            background-color: #28a745;
            color: white;
        }

        .status-ended {
            background-color: #dc3545;
            color: white;
        }

    </style>
</head>
<body>
<div class="col-md-10 content">
    <h2 class="white">CLOTH <span style="color:black;">CAMPAIGN</span></h2>

    <?php
    $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/1ex/1ex/";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

        $imageOption = $_POST["imageOption"];
        $campaignImageURL = "";
        $campaignImageFile = "";

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

        $campaignTitle = $_POST["campaignTitle"];
        $beneficiaries = $_POST["beneficiaries"];
        $beneficiariesLocation = $_POST["beneficiariesLocation"];
        $beneficiariesPhone = $_POST["beneficiariesPhone"];
        $campaignEndDate = $_POST["campaignEndDate"];
        $campaignStatus = ($_POST["campaignEndDate"] < date("Y-m-d")) ? "Ended" : "Ongoing";
        $campaignDescription = $_POST["campaignDescription"];

        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO campaigns (campaignImageURL, campaignTitle, beneficiaries, beneficiariesLocation, beneficiariesPhone, campaignEndDate, campaignStatus, campaignDescription)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters to the prepared statement
        $stmt->bind_param("ssssssss", $campaignImageURL, $campaignTitle, $beneficiaries, $beneficiariesLocation, $beneficiariesPhone, $campaignEndDate, $campaignStatus, $campaignDescription);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Store campaign ID and title in session variables
            $_SESSION["campaignId"] = $stmt->insert_id;
            $_SESSION["campaignTitle"] = $campaignTitle;
            // Store values in session variables
            $_SESSION["beneficiaries"] = $beneficiaries;
            $_SESSION["beneficiariesLocation"] = $beneficiariesLocation;
            $_SESSION["beneficiariesPhone"] = $beneficiariesPhone;
            $_SESSION["campaignEndDate"] = $campaignEndDate;

            // Close the prepared statement
            $stmt->close();

            // Close the database connection
            $conn->close();

            // Redirect to the same page with a success parameter in the URL
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=true");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the prepared statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
    ?>

    <?php include('admin-dashboard.php'); ?>

    <div class="sirpa">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <br/>
                <label for="campaignTitle">Campaign Title:</label>
                <input type="text" class="form-control" id="campaignTitle" name="campaignTitle" required>
            </div>

            <div class="form-group">
                <label for="imageOption">Campaign Image:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="imageOption" id="urlRadio" value="url" checked>
                    <label class="form-check-label" for="urlRadio">URL</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="imageOption" id="fileRadio" value="file">
                    <label class="form-check-label" for="fileRadio">File</label>
                </div>
            </div>

            <div class="form-group" id="urlImageContainer">
                <label for="campaignImageURL">Campaign Image URL:</label>
                <input type="text" class="form-control" id="campaignImageURL" name="campaignImageURL">
            </div>

            <div class="form-group" id="fileImageContainer" style="display: none;">
                <label for="campaignImageFile">Campaign Image File:</label>
                <input type="file" class="form-control-file" id="campaignImageFile" name="campaignImageFile">
            </div>

            <div class="form-group">
                <label for="beneficiaries">Beneficiaries:</label>
                <input type="text" class="form-control" id="beneficiaries" name="beneficiaries" required>
            </div>

            <div class="form-group">
                <label for="beneficiariesLocation">Location of Beneficiaries:</label>
                <input type="text" class="form-control" id="beneficiariesLocation" name="beneficiariesLocation" required>
            </div>

            <div class="form-group">
                <label for="beneficiariesPhone">Phone Number of Beneficiaries:</label>
                <input type="text" class="form-control" id="beneficiariesPhone" name="beneficiariesPhone" >
            </div>


            <div class="form-group">
                <label for="campaignEndDate">Campaign End Date:</label>
                <input type="date" class="form-control" id="campaignEndDate" name="campaignEndDate" style="width:30%;" required>
            </div>

            <div class="form-group">
                <label for="campaignStatus">Campaign Status:</label>
                <div id="campaignStatus" class="status-box status-ongoing">Ongoing</div>
            </div>


            <div class="form-group">
                <label for="campaignDescription">Campaign Description:</label>
                <textarea class="form-control" id="campaignDescription" name="campaignDescription" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color:gold; color:black; border-color:yellow;">Submit</button>
        </form>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
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

    // Show success message if redirected with a success parameter
    var urlParams = new URLSearchParams(window.location.search);
    var success = urlParams.get('success');

    if (success === 'true') {
        alert('Campaign added successfully!');
    }

    // Update campaign status automatically based on the campaign end date
    var campaignEndDate = document.getElementById('campaignEndDate');
    var campaignStatus = document.getElementById('campaignStatus');

    campaignEndDate.addEventListener('change', function() {
        var today = new Date();
        var endDate = new Date(campaignEndDate.value);

        if (endDate < today) {
            campaignStatus.className = 'status-box status-ended';
            campaignStatus.textContent = 'Ended';
        } else {
            campaignStatus.className = 'status-box status-ongoing';
            campaignStatus.textContent = 'Ongoing';
        }
    });
</script>
</body>
</html>
