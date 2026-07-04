

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
  <title>Talk&Talk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/home_style.css" media="all"/>
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
</head>
<body>

<nav class="navbar navbar-inverse" style="position: fixed; width:100%; margin-top: 0em; margin-bottom: 4em;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Talk&Talk</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
	  <li class="active"><a href="members.php">Members</a></li>
      <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>-->
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
      <li><a href="#" onclick="openNav()"><span class="glyphicon glyphicon-log-in" ></span> Setting</a></li>
	  
	  <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
    </ul>
  </div>
</nav>
</br>

 

 <!--container starts-->
 <div class ="container">
 <div class="sidenav">
  <a href="#about">About</a>
  
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
<strong style="color:red">Topics:</strong>
			<?php
			$get_topics="select * from topics";
			$run_topics= mysqli_query($con,$get_topics);
			while($row=mysqli_fetch_array($run_topics)){
			$topic_id= $row['topic_id'];
			$topic_name=$row['topic_name'];
			echo "<li><a href='topic.php?topic=$topic_id'>$topic_name</a></li>";
			
			}
			?>
			</ul>
			 </div>
			
			<form method="get" action="results.php" id="form1">
			<input type="text" name="user_query" placeholder="Search a topic"/>
			<input type="submit" name="search" value="Search"/>
			</form>
			
			 <!--Content timeline starts-->
			 <div id="msg">
			 <p align="center">
			 <a href="my_messages.php?inbox">Inbox</a></li> ||
			 <a href="my_messages.php?sent">Sent Items</a></li>
			 </p>
			 <?php
			 if(isset ($_GET['sent'])){
		     include("sent.php");
			 }
			 ?>
			 <?php
			 if(isset ($_GET['inbox'])){?>
		     
			 <table class="table table-hover">
    <thead>
      <tr>
        <th>Sender:</th>
        <th>Subject</th>
        <th>Date</th>
		<th>Reply</th>
      </tr>
    </thead>
         
		 <?php
		 $sel_msg="select * from messages where receiver='$user_id' ORDER by 1 DESC";
		 $run_msg= mysqli_query($con,$sel_msg);
			 $count_msg= mysqli_num_rows($run_msg);
			 
			 while($row_msg=mysqli_fetch_array($run_msg)){
			$msg_id= $row_msg['msg_id'];
			$msg_receiver= $row_msg['receiver'];
			$msg_sender= $row_msg['sender'];
			$msg_sub= $row_msg['msg_sub'];
			$msg_topic= $row_msg['msg_topic'];
			$msg_date= $row_msg['msg_date'];
			
			$get_sender="select * from users where user_id='$msg_sender'";
			$run_sender= mysqli_query($con,$get_sender);
			$row=mysqli_fetch_array($run_sender);
			$sender_name=$row['user_name'];
		 ?>
		 <tbody>
		 <tr align="center">
        <td>
		<a href="user_profile.php?u_id=<?php echo $msg_sender;?>" target="blank"><?php echo $sender_name;?>
		</a>
		</td>
        
		<td>
		<a href="my_messages.php?inbox&msg_id=<?php echo $msg_id;?>">
		<?php echo $msg_sub;?>
		</a>
		</td>
		
		<td><?php echo $msg_date;?></td>
		
		<td>
		<a href="my_messages.php?inbox&msg_id=<?php echo $msg_id;?>">Reply</a>
		</td>
      </tr>
			 <?php } ?>
    </tbody>	 
  </table>
  
   <?php
			 if(isset ($_GET['msg_id'])){
		$get_id= $_GET['msg_id'];
		$sel_message="select * from messages where msg_id='$get_id' ";
		$run_message= mysqli_query($con,$sel_message);
		$row_message=mysqli_fetch_array($run_message);
		
		$msg_subject= $row_message['msg_sub'];
		$msg_topic= $row_message['msg_topic'];
		$reply_content= $row_message['reply'];
		
		//updating the unread msg to read
		$update_unread="update messages set status='read' where msg_id='$get_id'";
		$run_unread= mysqli_query($con,$update_unread);
		
		echo" <center><br/><hr>
		<h2>$msg_subject</h2>
		<p><b>Message:</b>$msg_topic</p>
		<p><b>My Reply:</b>$reply_content</p>
		
		<form action='' method='post'>
			 <textarea  cols='30' rows='5' name='reply'></textarea><br/>
			 <input type='submit' name='msg_reply' value= 'Reply to this'/>
			 </form>
		</center>
		";
			 }
			 if(isset($_POST['msg_reply'])){
		$user_reply= $_POST['reply'];
		
		if($reply_content!='no reply'){
			echo "<h2 align='center'>This message was already replied!</h2>";
			exit();
		}
			else{
			$update_msg="update messages set reply='$user_reply' where msg_id='$get_id' AND reply='no_reply'";
				$run_update=mysqli_query($con,$update_msg);
				echo "<h2 align='center'>replied!</h2>";
			}
			 }
			 }
		?>
			 
			 </div>
			 
			 
			 
			 <button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
			 
			 
			 </div>
		
</body>
</html>
<?php  } ?>
