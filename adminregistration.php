<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Registration | PHP</title>
	<link rel="stylesheet" type="text/css">
</head>
<body>

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
                $joindate             = $_POST['joindate'];
                
	            
	            
	            $sql = "INSERT INTO admin (date) VALUES(?)";
				$stmtinsert = $db->prepare($sql);
				$result = $stmtinsert->execute([$joindate]);
	            $AdminID = $db->lastInsertId();

				$sql = "INSERT INTO account (AdminID, GW_UserName, Password, Email, First_Name, Last_Name, Phone_Number, Street_Address, City, State, ZipCode, Role) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
	            
				$stmtinsert = $db->prepare($sql);
				$result = $stmtinsert->execute([$AdminID, $GW_UserName, $password, $Email, $First_Name, $Last_Name, $Phone_Number, $Street_Address, $City, $State, $ZipCode, $Role]);
				if($result){
	                header("Location: index.php"); /* Redirect browser */
	                exit();
				}else{
					echo 'There were errors while saving the data.';
				}
			}
		?>

</div>	

<div>
	<form action = "adminregistration.php" method = "post">
		<div class="container">

		<div class = "row">
			<div class = "col-sm-3">
                <h1>Admin Account Registration</h1>
				<p>Fill up the form with correct values.</p>
				<hr class = "mb-3">
                
                <label for ="gwusername"><b>GW Username</b></label>
				<input class ="form-control" type="text" name="gwusername" required> 

				<label for ="password"><b>Password</b></label>
				<input class ="form-control" type="text" name="password" required> 

				<label for ="email"><b>Email</b></label>
				<input class ="form-control" type="text" name="email" required> 
                
				<label for ="firstname"><b>First Name</b></label>
				<input class ="form-control" type="text" name="firstname" required> 

				<label for ="lastname"><b>Last Name</b></label>
				<input class ="form-control" type="text" name="lastname" required> 

				<label for ="phone"><b>Phone</b></label>
				<input class ="form-control" type="text" name="phone" required> 

				<label for ="address"><b>Address</b></label>
				<input class ="form-control" type="text" name="address" required> 

				<label for ="city"><b>City</b></label>
				<input class ="form-control" type="text" name="city" required> 

				<label for ="states"><b>State</b></label>
				<input class ="form-control" type="text" name="states" required> 

				<label for ="zipcode"><b>Zipcode</b></label>
				<input class ="form-control" type="text" name="zipcode" required>
                
                <label for ="role"><a>Account Type</a></label>
				<input class ="form-control" type="text" name="role" value = "Admin" readonly>


                
                    <?php 

                    $month = date('m');
                    $day = date('d');
                    $year = date('Y');

                    $today = $year . '-' . $month . '-' . $day;
                    ?>

				<label for ="joindate"><b>Today Date</b></label>
				<input class ="form-control" type="date" name="joindate" value="<?php echo $today; ?>" readonly> 
                
                 

                <hr class = "mb-3">
                <input  class = "btn btn-primary" type="submit" name="create" value="Sign Up">
			</div>
            </div>      
        </div>
	</form>
</div>
</body>
</html>

