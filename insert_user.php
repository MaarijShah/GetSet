<?php
include("connection.php");
if (isset($_POST['submit'])){
	
	$name=mysqli_real_escape_string($con,$_POST['u_name']);
	$email=mysqli_real_escape_string($con,$_POST['u_email']);
	$pass=mysqli_real_escape_string($con,$_POST['u_pass']);
	//$re_password=$_POST['re_password'];
	//$agree-term=$_POST['agree-term'];
	$status="unverified";
	$posts="no";
	$ver_code=mt_rand();
	
	if (strlen($pass)<8){
		
		echo"<script>alert('Password should be minimum 8 characters!')</script>";
	exit();
	}
	
		$check_email="select * from users where user_email=	'$email'";
	$run_email=mysqli_query($con,$check_email);
	
	$check= mysqli_num_rows($run_email);
	if ($check==1){
		echo"<script>alert('Email already exist,Please try another!')</script>";
	exit();
	}
	
	$insert="insert into users (user_name,user_email,user_pass,user_image,user_reg_date,status,ver_code,posts) values('$name','$email','$pass','default.jpg',NOW(),'$status','$ver_code','$posts')";
	
	$query= mysqli_query($con,$insert);
	if($query){
		echo "<script>alert('Thankyou for signing here you go!')</script>";
	echo "<script>window.open('index.php?view_users','_self')</script>";
	}
	
	else {
	echo "Registration failed, try again!";
    }
	
	
	
	
}




?>