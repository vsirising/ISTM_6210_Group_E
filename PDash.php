<?php
    session_start();
    include 'config.php';

    if (!isset($_SESSION['student_login'])) {
        header("location: ../index.php");
    }



function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['StudentID'];
    $posts[1] = $_POST['email'];
    $posts[2] = $_POST['firstname'];
    $posts[3] = $_POST['lastname'];
    $posts[4] = $_POST['phone'];
    $posts[5] = $_POST['address'];
    $posts[6] = $_POST['city'];
    $posts[7] = $_POST['states'];
    $posts[8] = $_POST['zipcode'];
    $posts[9] = $_POST['schoolyear'];
    $posts[10] = $_POST['status'];
    $posts[11] = $_POST['weight'];
    $posts[12] = $_POST['height'];
    
    
    return $posts;
}

//Get StudentID using session
$query = $db->prepare('SELECT StudentID FROM account WHERE GW_UserName = :GW_UserName');
$query->bindParam(':GW_UserName', $_SESSION['student_login'], PDO::PARAM_STR);
$query->execute();


foreach($query as $row){
    $getStudentID = $row["StudentID"];
}


        
//use studentID from session to fetch data         
$searchStmt =$db->prepare('SELECT * FROM account WHERE StudentID = :StudentID');
$searchStmt->bindParam(':StudentID', $getStudentID, PDO::PARAM_STR);
$searchStmt->execute();
            

        
foreach($searchStmt as $row){
    $getStudentID   =  $row["StudentID"];
    $firstname      =  $row["First_Name"];
    $lastname       =  $row["Last_Name"];
    $email          =  $row["Email"];
    $phone          =  $row["Phone_Number"];
    $address        =  $row["Street_Address"];
    $city           =  $row["City"];
    $states         =  $row["State"];
    $zipcode        =  $row["ZipCode"];
    
}


$searchStmt2 =$db->prepare('SELECT * FROM student WHERE StudentID = :StudentID');
$searchStmt2->bindParam(':StudentID', $getStudentID, PDO::PARAM_STR);
$searchStmt2->execute();

foreach($searchStmt2 as $row){
            $schoolyear         =  $row["School_Year"];
            $status             =  $row["Student_Status"];
            $weight             =  $row["Weight"];
            $height             =  $row["Height"];
}

        


//Update Data

if(isset($_POST['update']))
{
    $data = getPosts();
    if(empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3]) || empty($data[4]) || empty($data[5]) || empty($data[6]) || empty($data[7]) || empty($data[8]) || empty($data[9]) || empty($data[10]) || empty($data[11]) || empty($data[12]))
    {
        echo '<script> alert("Enter New Information")</script>';
        
        
    }else{
        
        
        $updateStmt = $db->prepare('UPDATE account SET Email = :email, First_Name = :firstname, Last_Name = :lastname, Phone_Number = :phone, Street_Address = :address, City = :city, State = :states, ZipCode = :zipcode WHERE StudentID = :StudentID');
        $updateStmt->execute(array(
                    'StudentID' => $data[0],
                    'firstname' => $data[2],
                    'lastname' => $data[3],
                    'email' => $data[1],
                    'phone' => $data[4],
                    'address' => $data[5],
                    'city' => $data[6],
                    'states' => $data[7],
                    'zipcode' => $data[8],

        ));
        
         $updateStmt2 = $db->prepare('UPDATE student SET School_Year = :schoolyear, Student_Status = :status, Weight = :weight, Height = :height WHERE StudentID = :StudentID');
         $updateStmt2->execute(array(
                    'StudentID' => $data[0],
                    'schoolyear' => $data[9],
                    'status' => $data[10],
                    'weight' => $data[11],
                    'height' => $data[12],

        ));
         
            header("Location: PDash.php"); /* Redirect browser */
	                exit();
    
    }
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
	<link rel="stylesheet" type="text/css" href="css/Dash.css">
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
					<li><a  href="about.php">ABOUT US</a>
					</li>
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
                            
                             <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">                            
							<h1>
                                <?php
                                    echo $_SESSION['success'];
                                    unset ($_SESSION['success']);
                                ?>
                            </h1>
                            </div>
                            <?php endif ?>
                            
							<h1 style="color:white">
                                    <?php if(isset($_SESSION['student_login'])) { ?>
                                    Welcome to GW COFIT!, <?php echo $_SESSION['student_login']; }?>
                            </h1>
							<h2 class="typed-cursor" style="color:yellow" >Help make a lifestyle healtier</h2>
                            
                            
                            
						</div>
				
					</div>
				</div>
			</div>
		</div>
	</header>
<!-- Dash Display & Workouts -->	
	<section >
			<div class="row text-center title">
				<h2>DASHBOARD</h2>
				<h4 class="light muted"> Set to make a life healthier! </h4>
			</div>
	</section>

	<!-- Dash Display & Workouts 2 -->

	<section  class="section gray-bg">
		<div class="container">
						<div class="row workouts">
							<div class="col-md-6">
								<div class="Workouts" class="cover" style="background:url('img/table-0.jpg'); background-size:cover;">
								    <h1  class="heading">Edit Profile</h1>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                <div>
								    <button data-toggle="modal" data-target="#modal1" class="btn btn-blue-fill">Edit Profile</button>
								</div>
								</div>
							</div>
		
							<div class="col-md-6">
								<div class="Workouts" class="cover" style="background:url('img/table-4.jpg'); background-size:cover;">
									<h1 class="heading">CARDIO CONTENT</h1>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                                                        <br>
                                    <br>
                                    <br>
									<a href="Pcardio.php" back class="btn btn-blue-fill">View Contents</a> 
								</div>

							</div>
							
							<div class="col-md-6">
								<div class="Workouts" class="cover" style="background:url('img/table-5.jpg'); background-size:cover;">
									<h1 class="heading">YOGA CONTENT</h1>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
									<a href="Pyoga.php" class="btn btn-blue-fill">View Contents</a>
								</div>
							</div>
						
							<div class="wpb_column vc_column_container col-md-6">
								<div class="Workouts" class="cover" style="background:url('img/table-6.jpg'); background-size:cover;">
									<h1 class="heading">STRENGTH CONTENT</h1>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
									<a href="Pstrenght.php"  class="btn btn-blue-fill">View Contents</a>
								</div>
							</div>
		</div>	
        </div>
	</section>	
<!-- User Modal Display -->
			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Edit Profile</h3>
                
                
                
				<form action="PDash.php" method = "post" class="popup-form">
                    
                    <input type="text" name = "StudentID" class="form-control form-white" value="<?php echo $getStudentID; ?>" readonly>
					<input type="text" name = "firstname" class="form-control form-white" value="<?php echo $firstname; ?>" placeholder="First Name">
					<input type="text" name = "lastname" class="form-control form-white" value="<?php echo $lastname; ?>" placeholder="Last Name">
                    <input type="text" name = "email" class="form-control form-white" value="<?php echo $email; ?>" placeholder="Email">
					<input type="text" name = "phone" class="form-control form-white" value="<?php echo $phone; ?>" placeholder="Phone Number">
                    <input type="text" name = "address" class="form-control form-white" value="<?php echo $address; ?>" placeholder="Address">
					<input type="text" name = "city" class="form-control form-white" value="<?php echo $city; ?>" placeholder="City">
					<input type="text" name = "states" class="form-control form-white" value="<?php echo $states; ?>" placeholder=""State>
					<input type="text" name = "zipcode" class="form-control form-white" value="<?php echo $zipcode; ?>" placeholder="Zipcode">
                    <input type="text" name = "schoolyear" class="form-control form-white" value="<?php echo $schoolyear; ?>" placeholder="School Year">
                    <input type="text" name = "status" class="form-control form-white" value="<?php echo $status; ?>" placeholder="Status">
					<input type="text" name = "weight" class="form-control form-white" value="<?php echo $weight; ?>" placeholder="Weight">
					<input type="text" name = "height" class="form-control form-white" value="<?php echo $height; ?>" placeholder="Height">

               
                    <input  class="btn btn-blue" class = "btn btn-primary" type="submit" name="update" value="Update">
				</form>


            </div>
			</div>
		</div>

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
	<script src="js/typewriter.js"></script>
	<script src="js/jquery.onepagenav.js"></script>
	<script src="js/main.js"></script>