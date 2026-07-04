<!DOCTYPE html>
<?php
session_start();
include("connection.php");
include("functions/functions.php");

?>
<?php
if(!isset($_SESSION['user_email'])){
header("location:index.php");
}
else {  ?>

<html lang="en">
<style>
body {
  font-family: 'Lato', sans-serif;
  * {box-sizing: border-box;}
}

.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}
span{
color: white;	
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<head>
  <title>GetSet</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/home_style.css" media="all"/>
  <link rel="icon" type="image/png" href="images/icons/waqas.png"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <nav class="navbar navbar-inverse" style="position: fixed; width:100%; margin-top: 0em; margin-bottom: 4em;">
  

  <div class="container-fluid" style="height: 60px; border-bottom:5px solid #FF8000;">
    <div class="navbar-header">
<img src="images/waqas.png"  alt="" width='40' height='40'/>
</div>
    <div class="navbar-header">
      <a style="color:#FF8000" class="navbar-brand" href="#">GetSet</a>
      
      
      
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
    <li class="active"><a href="members.php">Members</a></li></ul>
      <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>-->

      
      <div class="navbar-header">
        <center>
<form method="get" action="results.php" id="form1">
      <input type="text" name="user_query" placeholder="Search a topic" size="85"/>
      
      <button type="submit" name="search" value="Search"><i class="fa fa-search"></i></button>

      </form>
    </div>
  </center>


    <div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="edit_profile.php">Edit Account</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>
</div>
<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      

      <div class="navbar-header">
    <ul>
    <?php
       $user=$_SESSION['user_email'];
       $get_user= "select * from users where user_email='$user'";
       $run_user=mysqli_query($con,$get_user);
       $row=mysqli_fetch_array($run_user);
       
        
       
       $user_id = $row['user_id'];
       $user_name = $row['user_name'];
       $user_email = $row['user_email'];
       $user_pass = $row['user_pass'];
       $user_image = $row['user_image'];
       $register_date = $row['user_reg_date'];
       $last_login = $row['user_last_login'];
       
       $user_posts = "select * from posts where user_id='$user_id'";
       $run_posts = mysqli_query($con,$user_posts);
       $posts=mysqli_num_rows($run_posts);
       
       //geting the number of unread messages
       $sel_msg="select * from messages where receiver='$user_id' AND status ='unread' ORDER by 1 DESC";
       $run_msg= mysqli_query($con,$sel_msg);
       $count_msg= mysqli_num_rows($run_msg);
       
       
       echo "
       <img src='users/$user_image' width='40' height='40' border-radius:'50%'/>";
       ?>
     </ul>
        
    </div>
    
    <li><a href="logout.php">
     Sign Out</a></li>
    </ul>


    

  </div>

</nav>
</br>
</head>
<body>



 

 <!--container starts-->
 <div class ="container" >
 <div class="sidenav">
  <br/>
  <br/>
   <br/>
  
  <div id="user_details">
			 <?php
			 $user=$_SESSION['user_email'];
			 $get_user= "select * from users where user_email='$user'";
			 $run_user=mysqli_query($con,$get_user);
			 $row=mysqli_fetch_array($run_user);
			 
			  
			 
			 $user_id = $row['user_id'];
			 $user_name = $row['user_name'];
			 $user_email = $row['user_email'];
			 $user_pass = $row['user_pass'];
			 $user_image = $row['user_image'];
			 $register_date = $row['user_reg_date'];
			 $last_login = $row['user_last_login'];
			 
			 $user_posts = "select * from posts where user_id='$user_id'";
			 $run_posts = mysqli_query($con,$user_posts);
			 $posts=mysqli_num_rows($run_posts);
			 
			 //geting the number of unread messages
			 $sel_msg="select * from messages where receiver='$user_id' AND status ='unread' ORDER by 1 DESC";
			 $run_msg= mysqli_query($con,$sel_msg);
			 $count_msg= mysqli_num_rows($run_msg);
			 
			 
			 echo "
			 <center>
			 <img src='users/$user_image' width='150' height='150'/>
			 </center>
			 <div id='user_mention'>
			 <p><strong>Name:</strong> $user_name</p>
			 <p><strong>Last Login:</strong> $last_login</p>
			 <p><strong>Member Since:</strong> $register_date</p>
			 
			 
			 <p><a href='my_messages.php?inbox&u_id=$user_id'>Inbox($count_msg)</a></p>
			 <p><a href='my_messages.php?sent'>Sent Items</a></li></p>
			 <p><a href='my_posts.php?u_id=$user_id'>My Posts($posts)</a></p>
			 <p><a href='edit_profile.php?u_id=$user_id'>Edit My Account</a></p>


			
			 </div>
			 ";
			 
			 ?>
			 </div>
</div>

 

  
<!--content area starts-->
<br/>
			<div class="content">
			<div class="main"> 
<ul id="menu">


			</ul>
			 </div>
			
			
			
			 <!--Content timeline starts-->
			 
			 <center><div>
			 <?php
			 if(isset($_GET['post_id'])){
		$get_id= $_GET['post_id'];
		$get_post="select * from posts where post_id='$get_id'";
	    $run_post= mysqli_query($con,$get_post);
		$row=mysqli_fetch_array($run_post);
		
		$post_title=$row['post_title'];
		$post_con=$row['post_content'];
		}
			 ?>
			 
			
			 <form action="" method="post" id="f">
			 <br/>
			 
<br/>
<br/>
<br/>
<br/>
<br/>
			 
			 <h2 style="color:Black"> <b>Edit Your Post:</b></h2>
			 <br/>

<br/>
<br/>
<br/>
<br/>
			 <input type="text" name="title" value="<?php echo $post_title;?>" size="82" required="required"/><br/>
			 <textarea  cols="83" rows="4" name="content"><?php echo $post_con;?> </textarea><br/><br/>
			 <select name="topic">
			 <option>Select Topic</option>
			 <?php getTopics();?>
			 </select>
			 <input type="submit" name="update" value= "Update Post"/>
			 </form>
			 
			<?php 
        if(isset($_POST['update'])){
	        $title=$_POST['title'];
		    $content=$_POST['content'];  
	        $topic=$_POST['topic'];
			$update_post="update posts set post_title='$title', post_content='$content',  topic_id='$topic' where post_id='$get_id'";
	    $run_update= mysqli_query($con,$update_post);
		
		if($run_update){
			echo"<script>alert('Post has been updated!')</script>";
			echo"<script>window.open('home.php','_self')</script>";
		}


}
?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
			 </div>
			 </center>
			 	 
			 	

 <div class="sidenav1">
  <a href="#about">Are you bore? Do you want to play some games?</a><br/>
  <div id="game">
  <a href="https://king.com/game/candycrush">
  <img src="images/saga.png" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>
  <a href="https://www.crazygames.com/game/street-race-fury">
  <img src="images/street.jpg" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>
  <a href="https://king.com/game/candycrushsoda">
  <img src="images/soda.jpg" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>

<a href="http://www.angrybirdsgames.com/games/angry-birds-space">
  <img src="images/angry.jpg" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>




</div>
<div id="game">
  <a href="https://www.dota2.com/play/">
  <img src="images/dota.jpg" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>
<a href="https://www.easports.com/fifa">
  <img src="images/fifa.jpg" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>
<a href="http://www.gamessumo.com/action-games/counter-strike-online">
  <img src="images/count.png" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>
<a href="https://playoverwatch.com/en-us/">
  <img src="images/over.jpg" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>

</div>
<div id="game">
  <a href="http://www.arcadespot.com/game/call-of-duty-online/">
  <img src="images/call.png" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>
<a href="http://m.plonga.com/teaser/Subway-Surfers-Online-Game">
  <img src="images/sub.jpg" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>
<a href="https://www.crazygames.com/game/knife-hit">
  <img src="images/hit.jpg" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>
<a href="http://www.greatdaygames.com/games/spin-2-win/spin-2-win.aspx">
  <img src="images/spin2.jpg" alt="HTML tutorial" style="width:50px;height:50px;border-radius:25px;">
</a>

</div>
<pre>  Quizzes</pre>
  <a href="https://everydayscience.blog/">Science Quiz</a>
   <a href="https://quiz.jagranjosh.com/general-knowledge/">GK quiz</a>
  <a href="https://kidshealth.org/">Health Quiz</a>
   <a href="https://www.magiquiz.com/quiz/can-you-name-the-meal-based-on-its-ingredients/">Food&Recipe Quiz</a>
    <a href="https://www.sporcle.com/games/hcd199/50-song-music-clip-quiz-20">Music Quiz</a>
	<a href="https://www.magiquiz.com/quiz/shop-for-new-clothes-and-well-pick-one-word-that-describes-your-style/">Fashion&Style Quiz</a>
	
</div>


		 </div>
			
			 
</body>
</html>
<?php  } ?>