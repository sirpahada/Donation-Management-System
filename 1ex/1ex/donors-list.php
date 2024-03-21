<!DOCTYPE html>
<html>
<head>
    <title>Donor List</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <style>
        body {
            display: flex;
        }

        .content {
            width: 100%;
            padding: 20px;
            padding-left:200px!important;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
		  margin-bottom: 20px;
		  border: 2px solid gold;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: gold;
            color: black;
            font-family:sans-serif;
        }
        h2{
            
            font-family: Raleway, sans-serif;
            font-weight:bold!important;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include("admin-dashboard.php"); ?>
    </div>

    <div class="content">
        <center><h2>DONOR'S<span style="color: #FDB813;"> LIST</span></h2></center>

        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "donor";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve data from donor_table
        $selectQuery = "SELECT * FROM donor_table";
        $result = $conn->query($selectQuery);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Full Name</th><th>Location</th><th>Username</th><th>Email</th><th>Phone Number</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["fullname"] . '</td>';
                echo '<td>' . $row["location"] . '</td>';
                echo '<td>' . $row["donor_id"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '<td>' . $row["phone_number"] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'No data found.';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
