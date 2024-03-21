<!DOCTYPE html>
<html>
<head>
  <title>Saan Donation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Cover.CSS"/>
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">

  <!--fontawesome icon-->
  <script src="https://kit.fontawesome.com/b79911c0d7.js" crossorigin="anonymous"></script>

  <style>



     h2 {
    font-family: Raleway, sans-serif;
    font-size: 33px;
    font-weight: 300;
}


  .card-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: stretch;
  }

  .card {
    flex: 0 0 calc(20% - 1rem);
    margin-bottom: 2rem;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    padding: 0.5rem;
  }
  .card:hover {
  background-color: #ffffcc; 
  transition: background-color 0.3s ease; /* Add transition effect */
}
.card:hover a.btn:focus,
.card:hover a.btn:active {
  outline: none; /* Remove outline on focus and active states */
  box-shadow: none; /* Hide the outline using box-shadow */
  
}

.card:hover a {
  text-decoration: none; /* Remove underline */
  color: black; 
}

.card:hover .card-body {
  background-color: #ffffcc; 
  transition: background-color 0.3s ease; /* Add transition effect */
}

  @media (max-width: 992px) {
    .card {
      flex: 0 0 calc(33.33% - 1rem);
    }
  }

  @media (max-width: 768px) {
    .card {
      flex: 0 0 calc(50% - 1rem);
    }
  }

  @media (max-width: 576px) {
    .card {
      flex: 0 0 calc(100% - 1rem);
    }
  }

  .card {
    display: flex!important;
    flex-direction: column!important;
    align-items: center!important;
    justify-content: center!important;
    text-align: center!important;
    border: 2px solid gold!important;
  
  }
  
  .card-icon {
    display: flex!important;
    align-items: center!important;
    justify-content: center!important;
    width: 100px!important;
    height: 100px!important;
    border-radius: 50%!important;
    background-color:black!important;
    margin: 0 auto!important;
    margin-top: -50px!important;
    margin-bottom: 20px!important;
    border: 2px solid gold !important;
  }
  
  .card-icon i {
    font-size: 3rem;
    color: #ffae00;
   
  }

  .card-text, .card-title{
    color:black;
  }
  .carousel-item::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
}
.carousel-item .carousel-image {
  width: 100%;
  height: 630px;
  background-size: cover;
  background-position: center;
}

.carousel-caption {
  display: flex;
  justify-content: center; /* Horizontal centering */
  align-items: center; /* Vertical centering */
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 20px;
  color: white;
  text-shadow: 1px 1px 2px black;
}

  .donate-button {
    margin-top: 10px;
  }
  .donate-button button {
    background-color: #ffdf00;
    border:3px solid #c49102;
    border-radius:10px;
    color: black;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16;
    font-family: sans-serif!important;
    font-weight:bold;
  }
  .carousel-caption {
  position: absolute;
  top: 60%;
  right: 50%; /* adjust as needed */
  transform: translate(0, -50%);
  text-align: center;
  padding: 0;
  font-family: Raleway, sans-serif;
    font-size: 15px;
    font-weight: normal;
}
h3{
  font-weight:bold!important;
  font-family:'comic sans ms';
}


</style>

  
</head>
<body>
<!-- Navbar -->
<?php include("navbar.php");?>



<!--carousel-->

<div id="demo" class="carousel slide" data-ride="carousel" >
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carousel-image" style="background-image: url('images/school.jpg');"></div>
      <div class="carousel-caption">
        <div>
          <h3>Education Starts with Materials</h3>
          <p>No dream is too far to reach with the help of Education.</p>
          <div class="donate-button">
            <a href="edu-campaign.php">
              <button>Donate Now</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="carousel-item">
      <div class="carousel-image" style="background-image: url('images/old.jpg');"></div>
      <div class="carousel-caption">
        <div>
          <h3>Support our Elderly Residents</h3>
          <p>Help Provide Comfort and Care</p>
          <div class="donate-button">
          <a href="health-campaign.php">
            <button>Donate Now</button>
          </a>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="carousel-image" style="background-image: url('images/toys.jpg');"></div>
      <div class="carousel-caption">
        <div>
          <h3>Toys for Tots!</h3>
          <p>Donate toys to brighten a child's day</p>
          <div class="donate-button">
          <a href="toy-campaign.php">
            <button>Donate Now</button>
          </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>



<!--our programs-->
<section class="my-5" id="program">
  <div class="py-5">
    <h2 class="text-center"><span style="color:#FDB813;">OUR</span><span> PROGRAMS</span></h2>
    <br /><br /><br /><br />
    <div class="container">
      <div class="card-wrapper">
        <div class="card">
          <a href="edu-campaign.php">
            <div class="card-icon">
              <i class="fas fa-book fa-3x" style="color: #ffae00;"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title">Donate for Education</h5>
              <p class="card-text">Provide educational opportunities to those who need it most by supporting local schools and programs.</p><br/>
              <a href="edu-campaign.php" class="btn btn-primary" style="background-color: #ffae00; color: black; border-color: gold;">View More</a>
            </div>
          </a>
        </div>
        <div class="card">
          <a href="food-campaign.php">
            <div class="card-icon">
              <i class="fas fa-utensils fa-3x" style="color: #ffae00;"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title">Donate Food</h5>
              <p class="card-text"><br />Help feed those in need by donating food to local food banks and organizations.</p><br /><br/>
              <a href="food-campaign.php" class="btn btn-primary" style="background-color: #ffae00; color: black; border-color: gold;">View More</a>
            </div>
          </a>
        </div>
        <div class="card">
          <a href="cloth-campaign.php">
            <div class="card-icon">
              <i class="fas fa-shirt fa-3x" style="color: #ffae00;"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title">Donate Clothes</h5>
              <p class="card-text"><br />Give the gift of warmth and comfort by donating gently used clothes to those in need.</p><br /><br/>
              <a href="cloth-campaign.php" class="btn btn-primary" style="background-color: #ffae00; color: black; border-color: gold;">View More</a>
            </div>
          </a>
        </div>
        <div class="card">
          <a href="health-campaign.php">
            <div class="card-icon">
              <i class="fas fa-stethoscope fa-3x" style="color: #ffae00;"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title">Donate Health Care</h5>
              <p class="card-text">Support medical research and provide care to those in need by donating to health organizations.</p><br/>
              <a href="health-campaign.php" class="btn btn-primary" style="background-color: #ffae00; color: black; border-color: gold;">View More</a>
            </div>
          </a>
        </div>
        <div class="card">
          <a href="toy-campaign.php">
            <div class="card-icon">
              <i class="fa-solid fa-gamepad fa-3x" style="color: #ffae00;"></i>
            </div>
<div class="card-body">
<h5 class="card-title">Donate Toys</h5>
<p class="card-text"><br />Bring joy to children in need by donating toys to local charities and organizations.</p><br /><br/>
<a href="toy-campaign.php" class="btn btn-primary" style="background-color: #ffae00; color: black; border-color: gold;">View More</a>
</div>
</a>
</div>
</div>

  </div>
</div>
</section>
<!--about us-->
<section id="about">
      <div class="py-5">
          <h2 class="text-center">ABOUT<span style="color:#FDB813;"> US</SPAN></h2>
      </div>

      <div class="container-fluid">
  <div class="row">
  <div class="col-lg-6 col-md-6 col-12">
  <img src="images/about.jpeg" class="img-fluid aboutimg custom-image" style="max-width: 100%; height: 100%; padding-left:25%;">
</div>


    <div class="col-lg-6 col-md-6 col-12">
      <h3 class="title-line"><span style="color: blue">SA</span><span style="color: red">NN</span></h3>
      <p class="py-4" style="text-align: justify; line-spacing: 1.15cm; margin-right: 20%">
        Sann is a collective of some of Nepal’s Young leaders and change-makers to make a dynamic change in the community. It is a youth-led nonprofit organization that mobilizes community-based projects in Nepal.
        It works towards creating a better Nepal which aims to provide basic health, education, and empowerment to every citizen.
      </p>

      <a href="about.php">Read More..</a>
    </div>
  </div>
</div>

</section>





<!--footer-->
<section class="my-5">
<?php $IPATH=$_SERVER["DOCUMENT_ROOT"]."/1ex/1ex/"; include($IPATH."footer.php"); ?>
</section>




 <!--jquery-->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--custom script-->
<script>
  // Add the "sticky" class to the navbar when scrolling reaches the carousel height
window.addEventListener('scroll', function() {
  var navbar = document.querySelector('.navbar');
  var carouselHeight = document.querySelector('.carousel-inner').offsetHeight;
  if (window.pageYOffset >= carouselHeight) {
    navbar.classList.add('sticky');
  } else {
    navbar.classList.remove('sticky');
  }
});

</script>



</body>
</html>