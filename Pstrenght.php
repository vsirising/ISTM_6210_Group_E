<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GWU Cofit </title>
	
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="img/favicons/manifest.json">
	<link rel="shortcut icon" href="img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/owl.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
	<link rel="stylesheet" type="text/css" href="css/Strength.css">
</head>

<body>
	<div class="preloader">
		<img src="img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
<!-- For fluid mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#"><img src="img/logo.png" data-active-url="img/logo-active.png" alt=""></a>
			</div>
<!-- Nav links & forms -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a  href="index.php">HOME</a></li>
					<li><a  href="about.php">ABOUT US</a></li>
					<li><a href="logout.php" class="btn btn-blue">LOG OUT</a></li>
				</ul>
			</div>
		</div>
		</nav>
<!-- Welcome Display -->
				<header id="intro">
					<div class="container">
						<div class="table">
							<div class="header-text">
								<div class="row">
									<div class="col-md-12 text-center">
										<h1 style="color:white" class="black typed"> What do you call a muscle-bound bee?</h1>
										<span class="typed-cursor">|</span>
									</div>
							
								</div>
							</div>
						</div>
					</div>
				</header>
<!-- Strength Display & Workouts -->						
	<section>
			<div class="container">
				<div class="row text-center title">
					<h2>STRENGTH</h2>
					<h4 class="light muted"> Dare and Endure!</h4>
				</div>
			</div>
	</section>
					
	<section  class="section gray-bg">
			<div class="container">
                       <div class="alb">
                        <?php 
                         include "config.php";
                         $sql = "SELECT * FROM contents WHERE Type = 'strength'";
                         $res = $db->query($sql);
                         $res->execute();


                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) { 

                                $name = $row['Name'];
                                $description = $row['Description'];
                            ?>
                           <div class="row text-center title">
                            <h3><?php echo $description ?></h3>
                           </div>  
                            <video width="100%" controls><source src ="<?php echo 'strength/' .$name;?>"></video>

                        <?php } ?>
                        </div> 
   
                        


            </div>
	</section>					
<!-- /footer -->
	<footer class="text-center">
        <br>
		<div>
				<ul style= "list-style: none">
					<li><a href="index.php">HOME</a></li>
					<li><a href="about.php">ABOUT US</a></li>
				</ul>	
		</div>
		<section>
			<div class=" row bottom-footer text-center-mobile">
			<section>
				<div >
					<p>&copy; 2021 All Rights Reserved. Powered by Team E</p>
				</div>		

		</section>	
            </div>
        </section>
	</footer>
<!-- Mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>

<!-- Scripts -->
	<script src="js/uploadpic.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/typewriter.js"></script>
	<script src="js/jquery.onepagenav.js"></script>
	<script src="js/main.js"></script>

</body>

</html>