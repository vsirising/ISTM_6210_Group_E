<?php
require 'config.php';
$sql = 'SELECT * FROM account WHERE InstructorID IS NOT NULL';
$statement = $db->prepare($sql);
$statement->execute();
$account = $statement->fetchAll(PDO::FETCH_OBJ);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>GW Account Registration | PHP</title>
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
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
	<link rel="stylesheet" type="text/css" href="css/Cofit.css">
</head>
</head>

<body>
	<div class="preloader">
		<img src="img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a  href="#"><img src="img/logo.png" data-active-url="img/logo-active.png" alt=""></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a  href="index.php">HOME</a></li>
					<li><a  href="about.php">ABOUT US</a></li>
                    <li><a href="logout.php" class="btn btn-blue">LOG OUT</a></li>
				</ul>
			</div>
			<div class="login-container">
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
							<h3 style="color:black">WELCOME TO GWU COFIT!</h3>
							<h1 style="color:white"class="black typed">Thank you for joining us</h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
<!-- Registration -->

<section >
			<div class="row text-center title">
				<h2>Instructors</h2>
			</div>
</section>

<!-- Form Registration --> 

<section  class="section gray-bg">
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All Instructor</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>AccountID</th>
          <th>GW_UserName</th>
          <th>Email</th>
          <th>First_Name</th>
          <th>Last_Name</th>
          <th>Phone_Number</th>
          <th>Street_Address</th>
          <th>City</th>
          <th>State</th>
          <th>ZipCode</th>
          <th>Role</th>
          <th>InstructorID</th>
        </tr>
        <?php foreach($account as $instructoraccount): ?>
          <tr>
            <td><?= $instructoraccount->AccountID; ?></td>
            <td><?= $instructoraccount->GW_UserName; ?></td>
            <td><?= $instructoraccount->Email; ?></td>
            <td><?= $instructoraccount->First_Name; ?></td>
            <td><?= $instructoraccount->Last_Name; ?></td>
            <td><?= $instructoraccount->Phone_Number; ?></td>
            <td><?= $instructoraccount->Street_Address; ?></td>
            <td><?= $instructoraccount->City; ?></td>
            <td><?= $instructoraccount->State; ?></td>
            <td><?= $instructoraccount->ZipCode; ?></td>
            <td><?= $instructoraccount->Role; ?></td>
            <td><?= $instructoraccount->InstructorID; ?></td>
            <td>
              <a href="editpersoninstructor.php?id=<?= $instructoraccount->AccountID ?>" class="btn btn-blue">Edit</a>   
            </td>
            <td>
             <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteinstructor.php?id=<?= $instructoraccount->AccountID ?>" class='btn btn-blue'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
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




