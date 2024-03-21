<!DOCTYPE html>
<html>
<head>
    <title>Donor Profile</title>
    <!--fontawesome icon-->
  <script src="https://kit.fontawesome.com/b79911c0d7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
   
      
 <!--jquery-->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
          h2 {
            font-family: Raleway, sans-serif;
            font-weight:bold!important;
}

        body {
            background-color: #fff;
           
            margin: 0;
            padding: 20px;
        }

        .profile-container {
            margin-top:10px;
            margin: none;
            padding: 50px;
            border: none;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-label {
            display: block;
            width: 200px;
            margin-bottom: 2px;
            color: #EE9A40;
            font-weight: bold;
        }

        .form-input {
            width: 500px;
            padding: 5px;
            border: 1px solid #f5f5d1;
            outline: none;
            font-size: 16px;
            color: #c49102;
            margin-top:2px;
            margin-bottom:8px;
        }

        .submit-button {
            background-color: #ffc107;
            color: black;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 200px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 1100px;
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
            text-align: center!important;
            background-color: gold;
            color: black;
            border-right: 1px solid #ddd!important;
          
        }
       

        .rightbox {
        position: flex;
        float: left;
        width: 580px;
        height: 440px;
        padding: 50px;
        box-sizing: border-box;
        box-shadow: 0 0 0 1px black, 0 0 0 2px white, 0 0 0 5px gold;
        border-radius:2px;
        background: rgba(255, 255, 0, 0.05);
        
      }

        .leftbox {
        
        position:flex;
        float: right;
        width: 580px;
        padding: 50px;
        height:440px;
        box-sizing: border-box;
        box-shadow: 0 0 0 1px black, 0 0 0 2px white, 0 0 0 5px gold;
        border-radius:2px;
        background: rgba(255, 255, 0, 0.05);
        
     }
        .history{
        max-width:1210px;
        margin-top:450px;
        margin-left: 50px;
        box-sizing: border-box;
        box-shadow: 0 0 0 1px black, 0 0 0 2px white, 0 0 0 5px gold;
        padding:50px;
        border-radius:2px;
        height: auto;
         background: rgba(255, 255, 0, 0.05);
         
        }
    .history details{
        padding-bottom:5px;
        
    }
    .history summary {
            font-size: 18px; /* Adjust the font size as needed */
            font-weight: bold;
            color: #EE9A40;
            padding:15px;
            width: 1200px;
            font-family: Raleway, sans-serif;

        }

 
      
    </style>
</head>
<body>
<?php
$IPATH = $_SERVER["DOCUMENT_ROOT"] . "/1ex/1ex/";
include($IPATH . "navbar.php");


// Check if user is not logged in
if (!isset($_SESSION['donor_id'])) {
    // Redirect to login page or display error message
    header("Location: donor-login.php");
    exit;
}
 
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donor";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve profile information
$donorID = $_SESSION['donor_id'];
$selectQuery = "SELECT * FROM donor_table WHERE donor_id = ?";
$selectStatement = $conn->prepare($selectQuery);
$selectStatement->bind_param("s", $donorID);
$selectStatement->execute();
$result = $selectStatement->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fullname = $row['fullname'];
    $location = $row['location'];
    $email = $row['email'];
    $phone = $row['phone_number'];
    $donorID = $row['donor_id'];

    // Initialize target file variable
    $targetFile = $row['profile_picture'];

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
        $newFullname = $_POST["fullname"];
        $newLocation = $_POST["location"];
        $newEmail = $_POST["email"];
        $newPhone = $_POST["mobile"];
        $currentPassword = $_POST["current_pw"];
        $newPassword = $_POST["new_pw"];
        $confirmPassword = $_POST["confirm_pw"];
        $newDonorID = $_POST["username"];
        // Retrieve current profile picture path from the database
        $selectPictureQuery = "SELECT profile_picture FROM donor_table WHERE donor_id = ?";
        $selectPictureStatement = $conn->prepare($selectPictureQuery);
        $selectPictureStatement->bind_param("s", $donorID);
        $selectPictureStatement->execute();
        $pictureResult = $selectPictureStatement->get_result();
        $row = $pictureResult->fetch_assoc();
        $currentPicture = $row['profile_picture'];

        // Handle profile picture upload
        if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
            // Check if the uploaded file is an image
            $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
            if ($check !== false) {
                // Allow only certain file formats (e.g., JPEG, PNG)
                if ($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png") {
                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
                        // File uploaded successfully
                        // Update the database with the new profile picture path
                        $updateQuery = "UPDATE donor_table SET profile_picture = ? WHERE donor_id = ?";
                        $updateStatement = $conn->prepare($updateQuery);
                        $updateStatement->bind_param("ss", $targetFile, $donorID);
    
                        if ($updateStatement->execute()) {
                            echo '<script>alert("Profile picture uploaded successfully!");</script>';
                        } else {
                            echo '<script>alert("Error updating profile picture!");</script>';
                        }
    
                        $updateStatement->close();
                    } else {
                        echo '<script>alert("Error uploading profile picture!");</script>';
                    }
                } else {
                    echo '<script>alert("Only JPG, JPEG, and PNG files are allowed!");</script>';
                }
            } else {
                echo '<script>alert("Invalid image file!");</script>';
            }
        } else {
            $targetFile = $currentPicture; // Use the current picture path if no new picture is uploaded
        }

        // Verify current password
        $selectQuery = "SELECT donor_password FROM donor_table WHERE donor_id = ?";
        $selectStatement = $conn->prepare($selectQuery);
        $selectStatement->bind_param("s", $donorID);
        $selectStatement->execute();
        $result = $selectStatement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['donor_password'];
            if (password_verify($currentPassword, $hashedPassword)) {
                // Current password is correct

                // Check if new donor ID is already taken
                $checkQuery = "SELECT * FROM donor_table WHERE donor_id = ? AND donor_id <> ?";
                $checkStatement = $conn->prepare($checkQuery);
                $checkStatement->bind_param("ss", $newDonorID, $donorID);
                $checkStatement->execute();
                $checkResult = $checkStatement->get_result();

                if ($checkResult->num_rows > 0) {
                    echo '<script>alert("Donor ID already taken. Please choose a different one.");</script>';
                } else {
                    // Update profile information
                    $updateQuery = "UPDATE donor_table SET fullname = ?, location = ?, email = ?, phone_number = ?, donor_id = ?, profile_picture = ?";
                    $updateParams = array($newFullname, $newLocation, $newEmail, $newPhone, $newDonorID, $targetFile);

                    // Update password if new password is provided and confirmed
                    if (!empty($newPassword) && !empty($confirmPassword) && $newPassword === $confirmPassword) {
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        $updateQuery .= ", donor_password = ?";
                        $updateParams[] = $hashedPassword;
                    }

                    $updateQuery .= " WHERE donor_id = ?";
                    $updateParams[] = $donorID;

                    $updateStatement = $conn->prepare($updateQuery);
                    $updateStatement->bind_param(str_repeat("s", count($updateParams)), ...$updateParams);

                    if ($updateStatement->execute()) {
                        // Update session variable if donor ID was changed
                        if ($donorID !== $newDonorID) {
                            $_SESSION['donor_id'] = $newDonorID;
                        }
                        echo '<script>alert("Profile updated successfully! Please REFRESH the Page");</script>';
                    } else {
                        echo '<script>alert("Error updating profile!");</script>';
                    }

                    $updateStatement->close();
                }
            } else {
                echo '<script>alert("Current password is incorrect. Please try again.");</script>';
            }
        } else {
            echo '<script>alert("Error retrieving password!");</script>';
        }
        $selectStatement->close();
    }

    // Display profile form
    echo '
    <div class="profile-container">
     <div class="profile-picture" style="text-align: center; position: relative;">
        <form method="POST" enctype="multipart/form-data">
            <div style="display: inline-block;">
                <img src="'.$targetFile.'" alt="Profile Picture" style="width: 150px; border-radius: 50%; height: 150px; border:3px solid #EE9A40;">
                <label for="profile_picture" class="camera-icon-label" style="position: absolute; bottom: 10px; right: 510px; cursor: pointer; background-color: #c49102; color: #ffffff; padding: 8px; border-radius: 50%;">
                    <i class="fas fa-camera"></i>
                </label>
                <input type="file" id="profile_picture" name="profile_picture" style="display: none;">
            </div>
    
            </div>
            <br/>
            <h2 style="text-transform: uppercase; color: #ffc107; margin-top: 0px; text-align: center;">'.$fullname .'</h2><br/><br/>
            <div class="rightbox">
               
                    <label class="form-label">Full Name:</label>
                    <input type="text" name="fullname" class="form-input" value="'. $fullname .'"><br>

                    <label class="form-label">Location:</label>
                    <input type="text" name="location" class="form-input" value="'. $location .'"><br>

                    <label class="form-label">Username:</label>
                    <input type="text" name="username" class="form-input" value="'. $donorID .'"><br>

                    <label class="form-label">Phone Number:</label>
                    <input type="text" name="mobile" class="form-input" value="'. $phone .'"><br>

                    <label class="form-label">Email:</label>
                    <input type="text" name="email" class="form-input" value="'. $email .'"><br>
                
            </div>
            <div class="leftbox">
                <br/>
                <label class="form-label">Current Password:</label>
                <input type="password" name="current_pw" class="form-input" required><br>

                <label class="form-label">New Password:</label>
                <input type="password" name="new_pw" class="form-input"><br>

                <label class="form-label">Confirm Password:</label>
                <input type="password" name="confirm_pw" class="form-input"><br><br><br>

                <input type="submit" value="UPDATE" class="submit-button">
                <br>
            </div>
            </form>
        </div>';

} else {
    echo '<script>alert("Error retrieving profile!");</script>';
}

$conn->close();
?>





<div class="history">
    <h2 style="color:gold;"><center> DONATION <span style="color:black;">HISTORY</span></center></h2>
    <p style="color: #c49102; text-align: center; font-style: italic; "><span style="font-weight: bold;">Notice:</span> The Donation Status will be updated as <span style="font-weight: bold; font-style:none;">'DONATED'</span> after the donation is made.</p>

<details>
    <summary>Education Donation History</summary>
    <div>
        <?php
        
        // Establish a database connection
        $conn = new mysqli("localhost", "root", "", "education");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the donation history for the logged-in user
        $username = $_SESSION['username'];
        $stmt = $conn->prepare("SELECT * FROM donations WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display the donation history in a table
        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Campaign Title</th><th>Donor Email</th><th>Collection Method</th><th>Donation Date/ Time</th><th>View Details</th> <th>Collection Status</th><th>Donation Status</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['campaignTitle'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' .$row["collectionMethod"]. '</td>';
                echo "<td>";
                    if (isset($row["donationDate"])) {
                        echo $row["donationDate"];
                    }
                    echo "</td>";
                echo "<td><a href='dondetail.php?id=" . $row["id"] . "'><center><i class='fa-solid fa-eye' style='color: #51491f;padding:8px;'></center></a></td>";
                echo '<td>' . (isset($row['status']) && !empty($row['status']) ? strtoupper($row['status']) : 'NOT COLLECTED') . '</td>';
                echo '<td>' . (isset($row['donationStatus']) && !empty($row['donationStatus']) ? strtoupper($row['donationStatus']) : 'NOT DONATED') . '</td>';
                echo '</tr>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'No donation history found.';
        }

        // Close the statement and release the result set
        $stmt->close();
        $result->close();

        // Close the database connection
        $conn->close();
        ?>
        
    </div>
</details>

<details>
  <summary>Health Donation History</summary>
  <div>
  <?php
        
        // Establish a database connection
        $conn = new mysqli("localhost", "root", "", "health");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the donation history for the logged-in user
        
        $stmt = $conn->prepare("SELECT * FROM donations WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display the donation history in a table
        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Campaign Title</th><th>Donor Email</th><th>Collection Method</th><th>Donation Date/ Time</th><th>View Details</th> <th>Collection Status</th><th>Donation Status</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['campaignTitle'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' .$row["collectionMethod"]. '</td>';
                echo "<td>";
                    if (isset($row["donationDate"])) {
                        echo $row["donationDate"];
                    }
                    echo "</td>";
                echo "<td><a href='healthdondetail.php?id=" . $row["id"] . "'><center><i class='fa-solid fa-eye' style='color: #51491f;padding:8px;'></center></a></td>";
                echo '<td>' . (isset($row['status']) && !empty($row['status']) ? strtoupper($row['status']) : 'NOT COLLECTED') . '</td>';
                echo '<td>' . (isset($row['donationStatus']) && !empty($row['donationStatus']) ? strtoupper($row['donationStatus']) : 'NOT DONATED') . '</td>';
                echo '</tr>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'No donation history found.';
        }

        // Close the statement and release the result set
        $stmt->close();
        $result->close();

        // Close the database connection
        $conn->close();
        ?>
  </div>
</details>

<details>
  <summary>Toys Donation History</summary>
  <div>
    <?php
    // Establish a database connection
    $conn = new mysqli("localhost", "root", "", "toy");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the donation history for the logged-in user
    
    $stmt = $conn->prepare("SELECT * FROM donations WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display the donation history in a table
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Campaign Title</th><th>Donor Email</th><th>Collection Method</th><th>Donation Date/ Time</th><th>View Details</th> <th>Collection Status</th><th>Donation Status</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['campaignTitle'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' .$row["collectionMethod"]. '</td>';
            echo "<td>";
                if (isset($row["donationDate"])) {
                    echo $row["donationDate"];
                }
                echo "</td>";
            echo "<td><a href='toydondetail.php?id=" . $row["id"] . "'><center><i class='fa-solid fa-eye' style='color: #51491f;padding:8px;'></center></a></td>";
            echo '<td>' . (isset($row['status']) && !empty($row['status']) ? strtoupper($row['status']) : 'NOT COLLECTED') . '</td>';
            echo '<td>' . (isset($row['donationStatus']) && !empty($row['donationStatus']) ? strtoupper($row['donationStatus']) : 'NOT DONATED') . '</td>';
            echo '</tr>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No donation history found.';
    }

    // Close the statement and release the result set
    $stmt->close();
    $result->close();

    // Close the database connection
    $conn->close();
    ?>
  </div>
</details>

<details>
  <summary>Clothes Donation History</summary>
  <div>
    <?php
     // Establish a database connection
     $conn = new mysqli("localhost", "root", "", "cloth");

     // Check the connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     // Fetch the donation history for the logged-in user
     
     $stmt = $conn->prepare("SELECT * FROM donations WHERE username = ?");
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $result = $stmt->get_result();

     // Display the donation history in a table
     if ($result->num_rows > 0) {
         echo '<table>';
         echo '<tr><th>Campaign Title</th><th>Donor Email</th><th>Collection Method</th><th>Donation Date/ Time</th><th>View Details</th> <th>Collection Status</th><th>Donation Status</th></tr>';

         while ($row = $result->fetch_assoc()) {
             echo '<tr>';
             echo '<td>' . $row['campaignTitle'] . '</td>';
             echo '<td>' . $row['email'] . '</td>';
             echo '<td>' .$row["collectionMethod"]. '</td>';
             echo "<td>";
                 if (isset($row["donationDate"])) {
                     echo $row["donationDate"];
                 }
                 echo "</td>";
             echo "<td><a href='clothdondetail.php?id=" . $row["id"] . "'><center><i class='fa-solid fa-eye' style='color: #51491f;padding:8px;'></center></a></td>";
             echo '<td>' . (isset($row['status']) && !empty($row['status']) ? strtoupper($row['status']) : 'NOT COLLECTED') . '</td>';
             echo '<td>' . (isset($row['donationStatus']) && !empty($row['donationStatus']) ? strtoupper($row['donationStatus']) : 'NOT DONATED') . '</td>';
             echo '</tr>';
             echo '</tr>';
         }

         echo '</table>';
     } else {
         echo 'No donation history found.';
     }

     // Close the statement and release the result set
     $stmt->close();
     $result->close();

     // Close the database connection
     $conn->close();
    ?>
  </div>
</details>

<details>
  <summary>Food Donation History</summary>
  <div>
    <?php
     // Establish a database connection
     $conn = new mysqli("localhost", "root", "", "food");

     // Check the connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     // Fetch the donation history for the logged-in user
     
     $stmt = $conn->prepare("SELECT * FROM donations WHERE username = ?");
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $result = $stmt->get_result();

     // Display the donation history in a table
     if ($result->num_rows > 0) {
         echo '<table>';
         echo '<tr><th>Campaign Title</th><th>Donor Email</th><th>Collection Method</th><th>Donation Date/ Time</th><th>View Details</th> <th>Collection Status</th><th>Donation Status</th></tr>';

         while ($row = $result->fetch_assoc()) {
             echo '<tr>';
             echo '<td>' . $row['campaignTitle'] . '</td>';
             echo '<td>' . $row['email'] . '</td>';
             echo '<td>' .$row["collectionMethod"]. '</td>';
             echo "<td>";
                 if (isset($row["donationDate"])) {
                     echo $row["donationDate"];
                 }
                 echo "</td>";
             echo "<td><a href='fooddondetail.php?id=" . $row["id"] . "'><center><i class='fa-solid fa-eye' style='color: #51491f;padding:8px;'></center></a></td>";
             echo '<td>' . (isset($row['status']) && !empty($row['status']) ? strtoupper($row['status']) : 'NOT COLLECTED') . '</td>';
             echo '<td>' . (isset($row['donationStatus']) && !empty($row['donationStatus']) ? strtoupper($row['donationStatus']) : 'NOT DONATED') . '</td>';
             echo '</tr>';
             echo '</tr>';
         }

         echo '</table>';
     } else {
         echo 'No donation history found.';
     }

     // Close the statement and release the result set
     $stmt->close();
     $result->close();

     // Close the database connection
     $conn->close();
    ?>
  </div>
</details>
    </div>
 
</body>
</html>
