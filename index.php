<?php 

    session_start();

    if (isset($_SESSION['student_login'])) {
        header("location: PDash.php");
    }

    if (isset($_SESSION['instructor_login'])) {
        header("location: IDash.php");
    }

    if (isset($_SESSION['admin_login'])) {
        header("location: ADash.php");
    }

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gw_cofit";
    $message1 = "";
    try{
        $connection = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST["login"]))
        {
            if(empty($_POST["GW_UserName"]) || empty($_POST["Password"]))
            {
            echo '<script> alert("All field is required")</script>';
            }
            else
            {
                $query = "SELECT * FROM account WHERE GW_UserName = :GW_UserName AND Password = :Password AND Role =:Role "  ;
                $statement = $connection->prepare($query);
                $statement->execute(

                            array(

                            'GW_UserName' => $_POST['GW_UserName'],
                            'Password' => $_POST["Password"],
                            'Role' => $_POST["Role"]


                            )
                );

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $dbusername = $row['GW_UserName'];
                    $dbpassword = $row['Password'];
                    $dbrole = $row['Role'];
                }
                
                $count = $statement->rowCount();
                if($count>0){
                    switch($dbrole){
                            case'Student':
                                $_SESSION["student_login"] = $_POST["GW_UserName"];
                                $_SESSION['success'] = "Student Login Successfully";
                                header("location: PDash.php");
                            break;
                            case'Instructor':
                                $_SESSION["instructor_login"] = $_POST["GW_UserName"];
                                $_SESSION['success'] = "Instructor Login Successfully";
                                header("location: IDash.php");
                            break;
                            case'Admin':
                                $_SESSION["admin_login"] = $_POST["GW_UserName"];
                                $_SESSION['success'] = "Admin Login Successfully";
                                header("location: ADash.php");
                            break;
         
                    }
                }
                else
                {
                   echo '<script> alert("username or password is wrong")</script>';
                    

                }
        }
    }
}
    catch(PDOException $error)
    {
        $message = $error->getMessage();
    }
?>


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
	<link rel="stylesheet" type="text/css" href="css/Cofit.css">
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
				<a  href="#"><img src="img/logo.png" data-active-url="img/logo-active.png" alt="" ></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a  href="index.php">HOME</a></li>
					<li><a  href="about.php">ABOUT US</a></li>
			      	<li>
                    <form action="index.php" method="post">
			      		<input type="text" placeholder="username" name="GW_UserName" />
				      	<input type="password" placeholder="Password" name="Password" />
                        <select name="Role" id="Role">
                            <option value ="" selected="selected">User Type</option>
                            <option value="student">Student</option>
                            <option value="instructor">Instructor</option>
                            <option value="admin">Admin</option>
                        </select>
				        <button class="blue" name="login" type="submit">LOG IN</button>
                        </form>
                    </li>   
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
							<h3 class="light white">WELCOME TO GWU COFIT!</h3>
							<h1 class="black typed">Join us for better health today</h1>
							<span class="typed-cursor">|</span>
							
							<br/>
                            <a href="registration.php" class="btn btn-blue">Student Sign Up</a>
							<a href="instructorregistration.php"  class="btn btn-blue">Instructor Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
<!-- workouts -->
	<section id="workouts" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Workouts</h2>
				<h4 class="light muted"> Mold your body and mind with our wide variety of training options! </h4>
			</div>
		<div class="row workouts">
				<div class="col-md-4">
						<div class="Workouts">
							<div class="icon-holder">
								<img src="img/icons/heart-blue.png" alt="" class="icon">
							</div>
							<h4 class="heading">CARDIO</h4>
							<p class="description">30 minutes of moderate cardio activity at least five days each week can save a life. Mix up intensities and activities to keep it interesting and fun.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="Workouts">
							<div class="icon-holder">
								<img src="img/icons/guru-blue.png" alt="" class="icon">
							</div>
							<h4 class="heading">YOGA</h4>
							<p class="description">An energizing flow that will kick start your morning and inspire you to move through the rest of your day with intention and ease.</p>
						</div>
					</div>
				<div class="col-md-4">
					<div class="Workouts">
						<div class="icon-holder">
							<img src="img/icons/weight-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">STRENGTH</h4>
						<p class="description">Strength training can help you get stronger and look and feel better with just a few short sessions each week. You can do strength training with free weights or with no equipment.</p>
					</div>
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