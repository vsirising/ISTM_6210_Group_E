<?php

session_start();
include 'config.php';

    if (!isset($_SESSION['instructor_login'])) {
        header("location: ../index.php");
    }

//Get StudentID using session
$query = $db->prepare('SELECT InstructorID FROM account WHERE GW_UserName = :GW_UserName');
$query->bindParam(':GW_UserName', $_SESSION['instructor_login'], PDO::PARAM_STR);
$query->execute();


foreach($query as $row){
    $getInstructorID = $row["InstructorID"];
}


//upload video

require_once('config.php');
if(isset($_POST['upload'])){
    $type                   = $_POST['type'];
    $description            = $_POST['description'];
    $video_name             = $_FILES['videos']['name'];
    $video_type             = $_FILES['videos']['type'];
    $temp_name              = $_FILES['videos']['tmp_name'];
    $video_size             = $_FILES['videos']['size'];
    $file_destination       = "cardio/".$video_name;

    if(move_uploaded_file($temp_name, $file_destination)){

        $sql = "INSERT INTO contents (Name, Type, Description, InstructorID) VALUES('$video_name','$type','$description','$getInstructorID')";
        $stmtinsert = $db->prepare($sql);
        if($stmtinsert->execute()){

            $success = "video uploaded.";
    }else{
            $failed = "Something went wrong??";
    }
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
	<link rel="stylesheet" type="text/css" href="css/Cardio.css">
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
										<h1 style="color:white">Today's Cardio Day!</h1>
										<h1 class="typed-cursor" style="color:yellow" class="black typed"> All progress takes place outside the comfort zone</h1>
									</div>
							
								</div>
							</div>
						</div>
					</div>
				</header>
<!-- Cardio Display & Workouts -->					
			<section>
					<div class="container">
						<div class="row text-center title">
							<h2>CARDIO</h2>
							<h4 class="light muted"> Start slow, then taper off!</h4>
							<div class ="row center"class="col-md-4"> <button data-toggle="modal" data-target="#modal1" class="btn btn-blue-fill">Upload Content</button>
						</div>
					</div>
					</div>
                <br>
                <br>
			</section>
							
			<section  class="section gray-bg">
                
                <div class="container">
                <div class="row text-center title">
                <h3>Existing Cardio contents</h3>
                </div>    
                


                       <div class="alb">
                        <?php 
                         include "config.php";
                         $sql = "SELECT * FROM contents WHERE Type = 'cardio'";
                         $res = $db->query($sql);
                         $res->execute();


                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) { 

                                $name = $row['Name'];
                                $description = $row['Description'];
                            ?>
                           <div class="row text-center title">
                            <h3><?php echo $description ?></h3>
                           </div>  
                            <video width="100%" controls><source src ="<?php echo 'cardio/' .$name;?>"></video>

                        <?php } ?>
                        </div> 
   
                        


            </div>
			</section>
<!-- User Modal Display -->
			<section>
			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Upload Video</h3>
                <h3 class="white">Maximum file size 500MB</h3>
                <form class="popup-form" method="post" action = Icardio.php enctype="multipart/form-data">

                    <div class = "form-group">
                        <input type = "file" accept = "video/*" runat="server" name = "videos" id = "videos" class = "form-control">
                    </div>

                    <div class = "form-group">
                        <input type = "text" name = "type" class = "form-control" id = "type" placeholder="Enter Type" value = "cardio" readonly>
                    </div>
                    <div class = "form-group">
                        <input type = "text" name = "description" class = "form-control" id = "type" placeholder="Enter Description">
                    </div>
                    <input type = "submit" name ="upload" value = "Upload" class="btn btn-submit">

                </form>
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
	<script src="js/typewriter.js"></script>
	<script src="js/jquery.onepagenav.js"></script>
	<script src="js/main.js"></script>