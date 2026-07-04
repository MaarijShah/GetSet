<?php
session_start();
include("includes/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Talk&Talk (Admin)</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSS/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSS/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSS/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSS/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="loginCSS/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSS/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSS/css/util.css">
	<link rel="stylesheet" type="text/css" href="loginCSS/css/m.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="limiter">
	 
		<div class="container-login100" style="background-image: url('4.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form action="admin_login.php" method="post" class="login100-form validate-form">
					<div class="login100-form-avatar">
						<img src="waqas.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Admin Panel
					</span>

					
					
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="email" name="email" placeholder="Admin Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Admin Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
                    
	
					
					<div class="container-login100-form-btn p-t-10">
						<input class="input100" type="submit" name="admin_login" value="Login"/>
						
					</div>

				</form>
				
				
			</div>
			<?php


if(isset($_POST['admin_login'])){
	$email= mysqli_real_escape_string($con,$_POST['email']);
	$pass= mysqli_real_escape_string($con,$_POST['pass']);
	$get_admin = "select * from admin where admin_email='$email' AND admin_pass='$pass'";
	
	$run_admin = mysqli_query($con,$get_admin);

$check_admin = mysqli_num_rows($run_admin);

	if($check_admin==0){
		echo"<script>alert('incorrect details,try again!')</script>";
}
else{
	$_SESSION['admin_email']=$email;
		echo"<script>window.open('index.php?welcome=Welcome $email','_self')</script>";
}
	
}





?>

		</div>
		
	</div>
	
	
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>