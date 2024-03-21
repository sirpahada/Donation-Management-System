<?php
  session_start();
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
  .sa {
    color: blue;
    font-size: 35px;
    font-weight: bolder;
    font-family: 'Poppins', sans-serif;
  }

  .nn {
    color: red;
    font-size: 35px;
    font-weight: bolder;
    font-family: 'Poppins', sans-serif;
  }
  .navbar {
  padding: 0rem  !important;
 background-color:gold;
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="Cover.CSS">
<script src="https://kit.fontawesome.com/b79911c0d7.js" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: gold;">
  <a class="navbar-brand" href="index.php"><span class="sa">SA</span><span class="nn">NN</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCombined" aria-controls="navbarCombined" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCombined">
    
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php" style="color:black; font-family: 'Poppins', sans-serif;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php" style="color:black; font-family: 'Poppins', sans-serif;">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#program" style="color:black; font-family: 'Poppins', sans-serif;">Our Programs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact" style="color:black; font-family: 'Poppins', sans-serif;">Contact us</a>
      </li>
    </ul>
   <?php

    // Check if the user is logged in
if (isset($_SESSION['username']) && isset($_SESSION['fullname'])) {
  $fullName = $_SESSION['fullname'];
  
  echo '
  <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="color:black;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user"></i>  ' . $fullName . '
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="';
        
  if ($_SESSION['user_type'] == 'donor') {
      echo 'donor-profile.php';
  
  
  echo '">My Profile</a>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
  ';
  }
  else {
    echo 'admin-profile.php';
    echo '" target="_blank">My Profile</a>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
  ';
}
} else {
  echo '
  <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="color:black;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user"></i>  Login | Register
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="admin-login.php">Admin</a>
        <a class="dropdown-item" href="donor-login.php">Donor</a>
      </div>
    </li>
  </ul>
  ';
}
?>
    
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>