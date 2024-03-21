<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="Cover.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
	<style>
		
		.horizontal-line {
		margin-top: 20px;
		margin-bottom: 20px;
		width: 40%;
		height: 2px;
		position: relative;
		border: none;
	}

	.horizontal-line::before {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		width: 75%;
		height: 2px;
		background: gold;
		border-radius:2px 1px 0px 0px;
	}

	.horizontal-line::after {
		content: "";
		position: absolute;
		top: 0;
		right: 0;
		width: 25%;
		height:1px;
		background: grey;
	}

		.center-content {
			display: flex;
			flex-direction: column;
			align-items: center;
			text-align: center;
		}

		h1 {
			font-family: Raleway, sans-serif;
			font-size: 25px;
			font-weight: 300;
		}

		h2 {
			font-family: Raleway, sans-serif;
			font-size: 33px;
		}

		p {
			display:block;
			text-align: justify;
			margin-bottom:5px;
			margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
		}
	</style>
</head>
<body>

	<!-- Navbar -->
	<?php include("navbar.php");?>

	<div class="container my-10" style="margin-top:65px;">
		<div class="row">
			<div class="col-md-12">
				<div class="center-content">
					<img src="images/group.jpg" class="img-fluid" alt="About Us" style="width: 1200px; height: 350px; object-fit: cover;">
					<br/>
					<h1 class="text-center mb-5">ABOUT <span style="color:#FDB813;">US</span></h1>
					<p>
						Sann is a collective of some of Nepal’s young leaders and change-makers to make a dynamic change in the community. It is a youth-led nonprofit organization that mobilizes community-based projects in Nepal. It works towards creating a better Nepal which aims to provide basic health, education, and empowerment to every citizen.
					</p>
					<br/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h2>VISION</h2>
				<hr class="horizontal-line">
				<p>
					To work towards creating a better Nepal which aims to provide basic health, education, and empowerment to every citizen.
				</p>
				<br/>
			</div>
			<div class="col-md-6">
				<img src="images/vission.jpg" class="img-fluid" alt="Vision" style="width: 280px; height: 310px; margin-left: 15%; border-radius: 5px;">
			</div>
		</div>
	</br></br>
		<div class="row">
		<div class="col-md-6">
				<img src="images/mission.jpg" class="img-fluid" alt="Mission" style="margin-top:10%; margin-left:10%;width: 400px; height: 390px; border-radius: 5px;">
			</div>
			<div class="col-md-6">
				<h2>MISSION</h2>
				<hr class="horizontal-line">
				<p>
					We work for the social development and integration of underprivileged individuals, groups, and communities under 7 principles:
				</p>
				<ul style="line-height: 1.15cm;">
					<li>Child and Women Welfare</li>
					<li>Quality Education</li>
					<li>Good Health and Wellbeing</li>
					<li>Environment Sustainability</li>
					<li>Civic Engagement and Youth Leadership</li>
					<li>Disaster Management and Risk Control</li>
					<li>Cultural Heritage Conservation</li>
				</ul>
			</div>
			
		</div>
	</div>

	<section class="my-5">
		<?php $IPATH=$_SERVER["DOCUMENT_ROOT"]."/1ex/1ex/"; include($IPATH."footer.php"); ?>
	</section>

</body>
</html>
