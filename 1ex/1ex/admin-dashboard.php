<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--fontawesome icon-->
    <script src="https://kit.fontawesome.com/b79911c0d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
           
            
        }
        
        .sidebar {
            
            position: fixed;
            font-family: Raleway, sans-serif;
            top: 0;
            left: 0;
            width: 280px;
            height: 100vh;
            color: black;
            padding-top: 80px;
            background-color: #ffffcc;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            scrollbar-width: thin;
    scrollbar-color: gold transparent;
}
        
        .sidebar-header {
            margin-bottom: 20px;
            padding: 0 20px;
        }
        
        .sidebar ul li a,
        .nav-link {
            color: black;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        
        .nav-link:hover {
            background-color:gold;
            color: black;
            border-radius: 10px;
        }
        
        p {
            padding: 6px;
            border: none!important;
            border-radius: 10px;
        }
        
        p:hover {
            background-color:gold;
            color:black;
            max-height: 60px;
        }
        
        .submenu {
            display: none;
            padding-left: 35px;
            margin-top: auto;
        }
        
        .show {
            display: block;
        }
        
        .content {
            margin-left: 150px!important;
            padding: 30px;
        }
        

.sidebar::-webkit-scrollbar {
    width: 3px;
    padding:20px;
  
}

.sidebar::-webkit-scrollbar-track {
    background-color: transparent;
}

.sidebar::-webkit-scrollbar-thumb {
    background-color: gold;
    border-radius: 15px;
    
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background-color: #c49102;
    width: 8px;
}
    </style>

    <script>
        $(document).ready(function() {
            $('.dropdown-title').click(function() {
                $(this).next('.submenu').slideToggle();
            });
        });
    </script>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2> <a href="admin-profile.php" ><i class="fas fa-user" style="color:orange;text-decoration:none; font-size:60px;margin-left:60px;"></i></a> </h2>
            <h2>
                <a href="admin-profile.php" style="color:black;text-decoration:none;">MY PROFILE</a></h2>
        </div>
        <br/><br/>
        <p class="dropdown-title" style="color: black; margin-left:0px;"><i class="fas fa-box"></i> Donations<i class="fa-solid fa-caret-down" style="color: black; margin-left:110px;"></i></p>
        <ul class="nav flex-column submenu">
            <li class="nav-item">
                <a class="nav-link active" href="aedu.php">Education Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ahealth.php">Health Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="atoy.php">Toys Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afood.php">Food Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="acloth.php">Clothes Donation</a>
            </li>
        </ul>

        <p class="dropdown-title"><i class="fa-solid fa-person-chalkboard"></i>    Campaigns<i class="fa-solid fa-caret-down" style="color: black; padding-left:95px;"></i></p>
        <ul class="nav flex-column submenu">
            <li class="nav-item">
                <a class="nav-link" href="educamplist.php">Education Campaigns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="healthcamplist.php">Health Campaigns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="toycamplist.php">Toys Campaigns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="foodcamplist.php">Food Campaigns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="clothcamplist.php">Clothes Campaigns</a>
            </li>
        </ul>

        <p class="dropdown-title"><a href="donors-list.php" style="color:black; text-decoration:none; margin-right:115px;"><i class="fa-solid fa-table-list"></i> Donor's list</a></p>
        
        <p class="dropdown-title"><a href="message.php" style="color:black; text-decoration:none;margin-right:120px;"><i class="fa-solid fa-message"></i> Messages</a></p>
    <a class="dropdown-item" href="logout.php" Style="margin-top:100px; height:200px;background-color:gold; TEXT-DECORATION:NONE; color:black;"><center><b>LOG-OUT</b></center></a>
    </div>
</body>
</html>
