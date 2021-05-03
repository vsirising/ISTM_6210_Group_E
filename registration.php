<?php
require_once('config.php');
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

<div>
	<?php
		if(isset($_POST['create'])){
            $GW_UserName    = $_POST['gwusername'];
            $password 		    = $_POST['password'];
            $Email 		       = $_POST['email'];
			$First_Name 		= $_POST['firstname'];
			$Last_Name 		    = $_POST['lastname'];
			$Phone_Number 		    = $_POST['phone'];
			$Street_Address 		= $_POST['address'];
			$City 		         = $_POST['city'];
			$State 		         = $_POST['states'];
			$ZipCode 		      = $_POST['zipcode'];
            $Role                 = $_POST['role'];
            $schoolyear 		   = $_POST['schoolyear'];
            $student_status 	   = $_POST['studentstatus'];
			$dob 		           = $_POST['dob'];
			$weight 		       = $_POST['weight'];
			$height 		       = $_POST['height'];
			$gender 		       = $_POST['gender'];
			$membership 		   = $_POST['membership'];

            
            $sql = "INSERT INTO student ( School_Year, Student_Status, DOB, Weight, Height, Gender, Membership_StartDate) VALUES(?,?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
			$result = $stmtinsert->execute([ $schoolyear, $student_status, $dob, $weight, $height, $gender, $membership]);
            $StudentID = $db->lastInsertId();
            
                
            $sql = "INSERT INTO account (StudentID, GW_UserName, Password, Email, First_Name, Last_Name, Phone_Number, Street_Address, City, State, ZipCode, Role) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
                
			$stmtinsert = $db->prepare($sql);
			$result = $stmtinsert->execute([$StudentID, $GW_UserName, $password, $Email, $First_Name, $Last_Name, $Phone_Number, $Street_Address, $City, $State, $ZipCode, $Role]);
			if($result){
                header("Location: index.php"); /* Redirect browser */
                exit();
			}else{
				echo 'There were errors while saving the data.';
			}      
			}
	?>

</div>	

<section >
			<div class="row text-center title">
				<h2>Registration</h2>
				<h4 class="light muted"> Fill up the form with correct values! </h4>
			</div>
</section>

<!-- Form Registration --> 

<section  class="section gray-bg">
	<div class="container">
		<div class="row workouts">
	<form action = "registration.php" method = "post">
		<div class="container">

		<div class="row text-center">
                <label for ="gwusername"><a>GW Username</a></label>
				<input class ="form-control" type="text" name="gwusername" required> 

				<label for ="password"><a>Password</a></label>
				<input class ="form-control" type="text" name="password" required>
            
                <label for ="role"><a>Account Type</a></label>
				<input class ="form-control" type="text" name="role" value = "Student" readonly>

				<label for ="email"><a>Email</a></label>
				<input class ="form-control" type="text" name="email" required> 
                
				<label for ="firstname"><a>First Name</a></label>
				<input class ="form-control" type="text" name="firstname" required> 

				<label for ="lastname"><a>Last Name</a></label>
				<input class ="form-control" type="text" name="lastname" required> 

				<label for ="phone"><a>Phone</a></label>
				<input class ="form-control" type="text" name="phone" required> 

				<label for ="address"><a>Address</a></label>
				<input class ="form-control" type="text" name="address" required> 

				<label for ="city"><a>City</a></label>
				<input class ="form-control" type="text" name="city" required> 

				<label for ="states"><a>State</a></label>
				<input class ="form-control" type="text" name="states" required> 

				<label for ="zipcode"><a>Zipcode</a></label>
				<input class ="form-control" type="text" name="zipcode" required>
                
                <label for ="schoolyear"><a>School Year</a></label>
				<input class ="form-control" type="text" name="schoolyear" required> 

				<label for ="studentstatus"><a>Student Status</a></label>
				<input class ="form-control" type="text" name="studentstatus" required> 
                
				<label for ="dob"><a>Date of Birth</a></label>
				<input class ="form-control" type="date" name="dob" required> 

				<label for ="weight"><a>Weight</a></label>
				<input class ="form-control" type="text" name="weight" required> 

				<label for ="height"><a>Height</a></label>
				<input class ="form-control" type="text" name="height" required> 

				<label for ="gender"><a>Gender</a></label>
				<input class ="form-control" type="text" name="gender" required> 
            
                    <?php 

                    $month = date('m');
                    $day = date('d');
                    $year = date('Y');

                    $today = $year . '-' . $month . '-' . $day;
                    ?>
            
            
				<label for ="membership"><a>Today Date</a></label>
				<input class ="form-control" type="date" name="membership" value="<?php echo $today; ?>" readonly> 
 
                <hr class="row text-center title">
                <input  class="btn btn-blue" class = "btn btn-primary" type="submit" name="create" value="Sign Up">
			</div>
		</div>
        </form>
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



