<!DOCTYPE html>
<html>
<head>
	<title>Donation Form</title>
	<style>
		.form-container {
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
			background-color: #f2f2f2;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}

		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}

		input[type="text"], input[type="email"], input[type="number"], textarea,select{
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: none;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			margin-bottom: 20px;
		}

		button[type="submit"] {
			background-color: #ffdf00;
			color: #fff;
			padding: 10px 20px;
			border: 2px #ffdf00;
			border-radius: 5px;
			cursor: pointer;
            display:center;
		}
	</style>
</head>
<body>

	<div class="form-container">
		<h2>Clothes Donation</h2>
		<form action="clothprocess_donation.php" method="POST">
		<input type="hidden" name="campaignTitle" value="<?php echo $campaignTitle; ?>">
<input type="hidden" name="campaignId" value="<?php echo $campaignId; ?>">
<input type="hidden" name="username" value="<?php echo $username; ?>"> 

			<label for="name">Name</label>
			<input type="text" id="name" name="name" required>

			<label for="email">Email</label>
			<input type="email" id="email" name="email" required>

			<label for="location">Location</label>
			<input type="text" id="location" name="location" required>

			<label for="clothes">Type of Cloth</label>
				<label ><input type="radio" id="summer" name="clothes" value="SUMMER" required>  Summer Clothes</label>
				<label ><input type="radio" id="winter" name="clothes" value="WINTER" required>  Winter Clothes</label>
				<label ><input type="radio" id="both" name="clothes" value="BOTH" required> Both</label>

            <label for="amount">Quantity of Clothes</label>
				<select name="amount" id="amount" required>
				<option value="" selected disabled>Select an option</option>
    				<option value="20 people">For 20 people</option>
					<option value="50 people">For 50 people</option>
					<option value="80 people">For 80 people</option>
					<option value="100 people">For 100 people</option>
					<option value=" more than 100 people">For more than 100 people</option>
				</select>

			<label for="description">Description (Optional)</label>
			<textarea id="description" name="description" style="height:100px;"></textarea>

			<label for="collection_method">How should we collect your donation?</label>
				<label ><input type="radio" id="self" name="collection_method" value="SELF" required>  I'll come to the organization</label>
				<label ><input type="radio" id="pick" name="collection_method" value="PICK" required>  Pick up from my location</label>

			<button type="submit"  name="submit">Donate Now</button>
		</form>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>
</html>

