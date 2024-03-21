<!DOCTYPE html>
<html>
<head>
	<title>Donation Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@900&display=swap" rel="stylesheet">
	<style type="text/css">
		form {
			width: 800px;
			margin: 20px auto;
			padding: 20px;
			border: 1px solid #ddd;
			background: linear-gradient(to top,#f8f9fa,#ffffcc );
		}

		label {
			display: block;
			margin-top: 10px;
			margin-bottom: 10px;
			font-family:sans-serif;
			font-weight: bold;
		}

		input[type="text"],
		textarea {
			width: 100%;
			padding: 8px;
			border: 1px solid #ddd;
		}
		textarea{
			height:100px;
		}

		input[type="submit"] {
			margin-top: 10px;
			padding: 10px 20px;
			background-color: gold;
			color: black;
			border: none;
			cursor: pointer;
		}
		.content{
			padding-left:20%!important;
		}
	</style>
</head>
<body><div id="sidebar">
<?php include 'admin-dashboard.php'; ?></div>
<div class="content">
	
	<?php
	// Assuming your database credentials
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'cloth';

	$id = $_GET["id"];
	$beneficiaries = isset($_GET['beneficiaries']) ? $_GET['beneficiaries'] : '';
$beneficiaries_location = isset($_GET['beneficiaries_location']) ? $_GET['beneficiaries_location'] : '';
$beneficiaries_phone = isset($_GET['beneficiaries_phone']) ? $_GET['beneficiaries_phone'] : '';
$campaign_end_date = isset($_GET['campaign_end_date']) ? $_GET['campaign_end_date'] : '';

	// Create a database connection
	$conn = mysqli_connect($hostname, $username, $password, $database);

	// Check if the connection was successful
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

		// Check if the form was submitted
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			// Get the ID from the form
			$id = $_POST["id"];
	
			// Get the updated status from the form
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
		
// Check if the values are retrieved and not empty
if (!empty($beneficiaries) || !empty($beneficiaries_location) || !empty($beneficiaries_phone) || !empty($campaign_end_date)) {
	// Sanitize the values to prevent SQL injection

	$beneficiaries = mysqli_real_escape_string($conn, $beneficiaries);
	$beneficiaries_location = mysqli_real_escape_string($conn, $beneficiaries_location);
	$beneficiaries_phone = mysqli_real_escape_string($conn, $beneficiaries_phone);
	$campaign_end_date = mysqli_real_escape_string($conn, $campaign_end_date);

	// Perform the database update
	$sql = "UPDATE donations SET beneficiaries='$beneficiaries', beneficiaries_location='$beneficiaries_location', beneficiaries_phone='$beneficiaries_phone', campaign_end_date='$campaign_end_date' WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
}

	if (isset($_GET["id"])) {
		// Get the ID and status from the URL
		$id = $_GET["id"];
		
		// Retrieve the donation information based on the ID
		$sql = "SELECT * FROM donations WHERE id='$id'";
		$result = mysqli_query($conn, $sql);

		// Display the donation information in a form format
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
	?>
	<h2 style="padding-left:33%; font-family: 'Raleway', sans-serif; ">DONATION<span style="color: #FDB813;"> DETAILS</span></H2>
			<form method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				
				<?php if (!empty($row["name"])) { ?>
					<label>Name:</label>
					<input type="text" value="<?php echo $row["name"]; ?>" readonly>
				<?php } ?>

				<?php if (!empty($row["email"])) { ?>
					<label>Email:</label>
					<input type="text" value="<?php echo $row["email"]; ?>" readonly>
				<?php } ?>

				<?php if (!empty($row["location"])) { ?>
					<label>Location:</label>
					<input type="text" value="<?php echo $row["location"]; ?>" readonly>
				<?php } ?>

				<?php if (!empty($row["campaignTitle"])) { ?>
					<label>Campaign Title:</label>
					<input type="text" value="<?php echo $row["campaignTitle"]; ?>" readonly>
				<?php } ?>

				<?php if (!empty($row["beneficiaries"])) { ?>
    <label>Beneficiaries:</label>
    <input type="text" value="<?php echo $row["beneficiaries"]; ?>" readonly>
<?php } ?>

<?php if (!empty($row["beneficiaries_location"])) { ?>
    <label>Beneficiaries Location:</label>
    <input type="text" value="<?php echo $row["beneficiaries_location"];?>" readonly>
<?php } ?>

<?php if (!empty($row["beneficiaries_phone"])) { ?>
    <label>Beneficiaries Phone:</label>
    <input type="text" value="<?php echo $row["beneficiaries_phone"]; ?>" readonly>
<?php } ?>

<?php if (!empty($row["campaign_end_date"])) { ?>
    <label>Campaign End Date:</label>
    <input type="text" value="<?php echo $row["campaign_end_date"];?>" readonly>
<?php } ?>

				<?php if (!empty($row["clothes"])) { ?>
					<label>Type of Clothes:</label>
					<input type="text" value="<?php echo $row["clothes"]; ?>" readonly>
				<?php } ?>

				<?php if (!empty($row["amount"])) { ?>
					<label>Amount of Clothes:</label>
					<input type="text" value="<?php echo $row["amount"]; ?>" readonly>
				<?php } ?>


				<?php if (!empty($row["description"])) { ?>
					<label>Description:</label>
					<textarea readonly><?php echo $row["description"]; ?></textarea>
				<?php } ?>

				<?php if (!empty($row["collectionMethod"])) { ?>
					<label>Collection Method:</label>
					<input type="text" value="<?php echo $row["collectionMethod"]; ?>" readonly>
				<?php } ?>
				
				<?php if (!empty($row["donationDate"])) { ?>
					<label>Donation Date/ Time: </label>
					<input type="text" value="<?php echo $row["donationDate"]; ?>" readonly>
				<?php } ?>
				
				<br/><br/>
				<div style="background-color:#ffffcc; padding:8px;">
				<center><label>Collection Status:</label>
				<select name="status">
					<option value="Not Collected" <?php if ($row["status"] === "Not Collected") echo "selected"; ?>>Not Collected</option>
					<option value="Collected" <?php if ($row["status"] === "Collected") echo "selected"; ?>>Collected</option>
					
				</select>

				<input type="submit" value="UPDATE"></center>
				</div>
			</form>
	<?php
		} else {
			echo "No donation found with the provided ID.";
		}
	} else {
		echo "No ID provided.";
	}
  
	// Close the database connection
	mysqli_close($conn);
	?>
	</div>
</body>
</html>


