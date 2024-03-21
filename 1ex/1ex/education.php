<!DOCTYPE html>
<html>
<head>
    <title>Donation Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
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

        input[type="text"],
        input[type="email"],
        textarea,
        select {
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
            color: black;
            font-weight:bold;
            padding: 10px 20px;
            border: 2px #ffdf00;
            border-radius: 5px;
            cursor: pointer;
        }

        .hidden {
            display: none;
        }
    </style>
     <script>
        // JavaScript code to submit the form with campaign ID and title
        $(document).ready(function() {
            $("form").submit(function() {
                $("<input>").attr("type", "hidden").attr("name", "campaignId").attr("value", "<?php echo $campaignId; ?>").appendTo($(this));
                $("<input>").attr("type", "hidden").attr("name", "campaignTitle").attr("value", "<?php echo $campaignTitle; ?>").appendTo($(this));
                $("<input>").attr("type", "hidden").attr("name", "username").attr("value", "<?php echo $_SESSION['username']; ?>").appendTo($(this));
                return true;
            });
        });
    </script>
</head>
<body>
<input type="hidden" name="campaignTitle" value="<?php echo $campaignTitle; ?>">
<input type="hidden" name="campaignId" value="<?php echo $campaignId; ?>">
<input type="hidden" name="username" value="<?php echo $username; ?>"> 

    <div class="form-container">
        <h2>Education Donation</h2>
        <form action="eduprocess_donation.php" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="location">Location</label>
            <input type="text" id="location" name="location" required><br/>

            <label for="material">Stationary Material</label>
            <input type="checkbox" id="material1" name="materials[]" value="Book" onchange="toggleAmount('material1')"> Books<br>
            <input type="checkbox" id="material2" name="materials[]" value="Copy" onchange="toggleAmount('material2')"> Copy<br>
            <input type="checkbox" id="material3" name="materials[]" value="Pencil/Pen" onchange="toggleAmount('material3')"> Pencils, Pens, Pens Refill, Eraser, Sharpener<br>
            <input type="checkbox" id="material4" name="materials[]" value="Bags" onchange="toggleAmount('material4')"> School Bags<br>
            <input type="checkbox" id="material5" name="materials[]" value="Shoes" onchange="toggleAmount('material5')"> School Shoes<br>
            <input type="checkbox" id="material6" name="materials[]" value="Other" onchange="toggleAmount('material6')"> Others<br><br>

            <div id="amountContainer">
                <div id="bookAmount" class="hidden">
                    <label for="book_amount">Amount of Books</label>
                    <select name="book_amount" id="book_amount">
                        <option value="" selected disabled>Select an option</option>
                        <option value="1-5 dozens">1-5 dozens</option>
                        <option value="6-10 dozens">6-10 dozens</option>
                        <option value="11-20 dozens">11-20 dozens</option>
                        <option value="more than 50 dozens">More than 50 dozens</option>
                    </select>
                </div>

                <div id="copyAmount" class="hidden">
                    <label for="copy_amount">Amount of Copies</label>
                    <select name="copy_amount" id="copy_amount">
                        <option value="" selected disabled>Select an option</option>
                        <option value="1-5 dozens">1-5 dozens</option>
                        <option value="6-10 dozens">6-10 dozens</option>
                        <option value="11-20 dozens">11-20 dozens</option>
                        <option value="more than 50 dozens">More than 50 dozens</option>
                    </select>
                </div>

                <div id="penAmount" class="hidden">
                    <label for="pen_amount">Amount of Pens/Pencils</label>
                    <select name="pen_amount" id="pen_amount">
                        <option value="" selected disabled>Select an option</option>
                        <option value="1-5 boxes">1-5 boxes</option>
                        <option value="6-10 boxes">6-10 boxes</option>
                        <option value="11-20 boxes">11-20 boxes</option>
                        <option value="more than 50 boxes">More than 50 boxes</option>
                    </select>
                </div>

                <div id="bagAmount" class="hidden">
                    <label for="bag_amount">Amount of School Bags</label>
                    <select name="bag_amount" id="bag_amount">
                        <option value="" selected disabled>Select an option</option>
                        <option value="1-5 pieces">1-5 pieces</option>
                        <option value="6-10 pieces">6-10 pieces</option>
                        <option value="11-20 pieces">11-20 pieces</option>
                        <option value="more than 50 pieces">More than 50 pieces</option>
                    </select>
                </div>

                <div id="shoesAmount" class="hidden">
                    <label for="shoes_amount">Amount of School Shoes</label>
                    <select name="shoes_amount" id="shoes_amount">
                        <option value="" selected disabled>Select an option</option>
                        <option value="1-5 pairs">1-5 pairs</option>
                        <option value="6-10 pairs">6-10 pairs</option>
                        <option value="11-20 pairs">11-20 pairs</option>
                        <option value="more than 50 pairs">More than 50 pairs</option>
                    </select>
                </div>

                <div id="otherAmount" class="hidden">
                    <label for="other_amount">Amount of Other Material</label>
                    <select name="other_amount" id="other_amount">
                        <option value="" selected disabled>Select an option</option>
                        <option value="1-5 items">1-5 items</option>
                        <option value="6-10 items">6-10 items</option>
                        <option value="11-20 items">11-20 items</option>
                        <option value="more than 50 items">More than 50 items</option>
                    </select>
                </div>
            </div>
          
            <label for="description">Description (Optional)</label>
            <textarea id="description" name="description" style="height:100px;" placeholder="For book donation, please specify types of books such as age group, storybook, course book, and others"></textarea>

            <label for="collection_method">How should we collect your donation?</label>
            <label><input type="radio" id="collection_method1" name="collection_method" value="SELF" required> I'll come to the organization</label>
            <label><input type="radio" id="collection_method2" name="collection_method" value="PICK" required> Pick up from my location</label><br>

            <button type="submit" name="submit">Donate Now</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
    <script>
        function toggleAmount(materialId) {
            var amountContainer = document.getElementById("amountContainer");
            var material = document.getElementById(materialId);

            if (material.checked) {
                switch (materialId) {
                    case "material1": // Books
                        document.getElementById("bookAmount").classList.remove("hidden");
                        break;
                    case "material2": // Copy
                        document.getElementById("copyAmount").classList.remove("hidden");
                        break;
                    case "material3": // Pencils, Pens, Pens Refill, Eraser, Sharpener
                        document.getElementById("penAmount").classList.remove("hidden");
                        break;
                    case "material4": // School Bags
                        document.getElementById("bagAmount").classList.remove("hidden");
                        break;
                    case "material5": // School Shoes
                        document.getElementById("shoesAmount").classList.remove("hidden");
                        break;
                    case "material6": // Others
                        document.getElementById("otherAmount").classList.remove("hidden");
                        break;
                }
            } else {
                switch (materialId) {
                    case "material1": // Books
                        document.getElementById("bookAmount").classList.add("hidden");
                        break;
                    case "material2": // Copy
                        document.getElementById("copyAmount").classList.add("hidden");
                        break;
                    case "material3": // Pencils, Pens, Pens Refill, Eraser, Sharpener
                        document.getElementById("penAmount").classList.add("hidden");
                        break;
                    case "material4": // School Bags
                        document.getElementById("bagAmount").classList.add("hidden");
                        break;
                    case "material5": // School Shoes
                        document.getElementById("shoesAmount").classList.add("hidden");
                        break;
                    case "material6": // Others
                        document.getElementById("otherAmount").classList.add("hidden");
                        break;
                }
            }
        }
    </script>
</body>
</html>
