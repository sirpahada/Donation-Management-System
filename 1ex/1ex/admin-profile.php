<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <style>
        body {
            background-color: grey;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 5px;
            border: none;
        }

        .form-label {
            display: inline-block;
            width: 200px;
            margin-bottom: 5px;
            margin-left: 18px;
            color: #EE9A40;
            font-weight: bold;
        }

        .form-input {
            width: 500px;
            padding: 8px;
            border: 1px solid #f5f5d1;
            margin-bottom: 30px;
            margin-left: 18px;
            outline: none;
            font-size: 16px;
            color: #c49102;
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
            margin-left: 340px;
            margin-top: 20px;
        }
        .upperbox{
            box-sizing: border-box;
            width:800px;
        box-shadow: 0 0 0 3px gold, 0 0 0 2px white, 0 0 0 5px #ddd;
        margin-top:25px;
        border-radius:2px;
            padding:20px;
            position:relative;
            left:150px;
            overflow: hidden;
        }
        .lowerbox{
            box-sizing: border-box;
            width:800px;
        box-shadow: 0 0 0 3px gold, 0 0 0 2px white, 0 0 0 5px #ddd;
        margin-top:25px;
        border-radius:2px;
            padding:20px;
            position:relative;
            left:150px;
            overflow: hidden;
        }
        .first {
  background-image: url('images/yellow.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  margin-left:60px;
  width:980px;
  border-radius:70px 5px 70px 0px;
  padding: 20px;
  text-align: center;
  height:208px;
  margin-top:0px!important;
}
    </style>
</head>
<body>
    <div class="profile-container">
        <?php
        session_start();
        // Check if user is not logged in
        if (!isset($_SESSION['username'])) {
            // Redirect to login page or display error message
            header("Location: admin-logout.php");
            exit;
        }
        include("admin-dashboard.php");

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "admin";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve profile information
        $adminID = $_SESSION['username'];
        $selectQuery = "SELECT *, admin_password FROM admin_table WHERE admin_id = ?";

        $selectStatement = $conn->prepare($selectQuery);
        $selectStatement->bind_param("s", $adminID);
        $selectStatement->execute();
        $result = $selectStatement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $address = $row['address'];
            $email = $row['email'];
            $phoneNumber = $row['phone_number'];
            $fullname = $row['fullname'];
            $position = $row['position'];

            // Initialize target file variable
            $targetFile = $row['profile_picture'];

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve profile information again after updating
                $selectStatement->execute();
                $result = $selectStatement->get_result();
                $row = $result->fetch_assoc();

                // Password change
                $currentPassword = $_POST["current_pw"];
                $newPassword = $_POST["new_pw"];
                $confirmPassword = $_POST["confirm_pw"];

                // Verify if the entered current password matches the stored hashed password
                if (password_verify($currentPassword, $row['admin_password'])) {
                    // Update profile information
                    $updateQuery = "UPDATE admin_table SET address = ?, email = ?, phone_number = ?, fullname = ?, position = ? WHERE admin_id = ?";
                    $updateStatement = $conn->prepare($updateQuery);
                    $updateStatement->bind_param("ssssss", $_POST["address"], $_POST["email"], $_POST["mobile"], $_POST["fullname"], $_POST["position"], $adminID);

                    if ($updateStatement->execute()) {
                        // Check if a new password is provided and update it
                        if (!empty($newPassword) && $newPassword == $confirmPassword) {
                            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                            $updatePasswordQuery = "UPDATE admin_table SET admin_password = ? WHERE admin_id = ?";
                            $updatePasswordStatement = $conn->prepare($updatePasswordQuery);
                            $updatePasswordStatement->bind_param("ss", $hashedNewPassword, $adminID);

                            if ($updatePasswordStatement->execute()) {
                                echo '<script>alert("Changes saved successfully!");</script>';
                            } else {
                                echo '<script>alert("Error updating password!");</script>';
                            }

                            $updatePasswordStatement->close();
                        } else {
                            echo '<script>alert("Changes saved successfully!");</script>';
                        }
                    } else {
                        echo '<script>alert("Error updating profile information!");</script>';
                    }

                    $updateStatement->close();
                } else {
                    echo '<script>alert("Invalid current password. Please try again.");</script>';
                }
            }

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
                            $updateQuery = "UPDATE admin_table SET profile_picture = ? WHERE admin_id = ?";
                            $updateStatement = $conn->prepare($updateQuery);
                            $updateStatement->bind_param("ss", $targetFile, $adminID);

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
                $targetFile = $row['profile_picture']; // Use the current picture path if no new picture is uploaded
            }

            // Display profile form
            echo '
            <div class="first">
            <div class="profile-picture" style="text-align: center; position: relative; top-margin:3px;">
            <form method="POST" enctype="multipart/form-data">
                <div style="display: inline-block;">
                    <img src="'.$targetFile.'" alt="Profile Picture" style="width: 130px; border-radius: 50%; height: 130px; border:3px solid #EE9A40;">
                    <label for="profile_picture" class="camera-icon-label" style="position: absolute; bottom: 10px; right: 390px; cursor: pointer; background-color: #c49102; color: #ffffff; padding: 8px; border-radius: 25%;">
                        <i class="fas fa-camera"></i>
                    </label>
                    <input type="file" id="profile_picture" name="profile_picture" style="display: none;"><br/>
                </div>
        
                </div>
                <br/>
                <h2 style="text-transform: uppercase; color: brown; font-weight:bold;
                    margin-bottom: 20px;
                    text-align: center;
                    margin-left:20px;
                    font-family: Raleway, sans-serif;">'. $fullname .'</h2><br/><br/></div>
                    <div class="upperbox">
                
                
                    <label class="form-label">Full Name:</label>
                    <input type="text" name="fullname" class="form-input" value="' . $fullname . '" required><br>
                    
                    <label class="form-label">Address:</label>
                    <input type="text" name="address" class="form-input" value="' . $address . '" required><br>

                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-input" value="' . $email . '" required><br>

                    <label class="form-label">Phone Number:</label>
                    <input type="text" name="mobile" class="form-input" value="' . $phoneNumber . '" required><br>

                    <label class="form-label">Position:</label>
                    <input type="text" name="position" class="form-input" value="' . $position . '" required><br>
                    </div>
                    
                    
                    <div class="lowerbox">
                    <label class="form-label">Current Password:</label>
                    <input type="password" name="current_pw" class="form-input" required><br>

                    <label class="form-label">New Password:</label>
                    <input type="password" name="new_pw" class="form-input"><br>

                    <label class="form-label">Confirm Password:</label>
                    <input type="password" name="confirm_pw" class="form-input"><br>

                    <input type="submit" name="submit" value="Save Changes" class="submit-button">
                    </div>
                </form>
            ';
        } else {
            echo "Error: Unable to retrieve profile information.";
        }

        $selectStatement->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
