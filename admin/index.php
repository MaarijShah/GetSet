	<?php
session_start();
include("../functions/functions.php");

?>
<!DOCTYPE html>
<html>

<head>
<title>welcome to Admin Panel</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="admin/admin_style.css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: absolute;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   <div class="navbar-header">
<img src="waqas.png"  alt="" width='40' height='40'/>
</div>
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#FF8000; font-style: italic; font-family:sans-serif; font-size:20px;">GetSet</a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      <li><a href="admin_logout.php"><span class="glyphicon glyphicon-user"></span> Admin Logout</a></li>
    
      
    </ul>
  </div>
</nav>

</head>

<body>


	
<div class="container">

<div class="sidenav">
 <li><a href="index.php?view_users">View users</a></li>
<li><a href="index.php?view_posts">View posts</a></li>
<li><a href="index.php?view_comments">View comments</a></li>
<li><a href="index.php?view_topics">View topics</a></li>
<li><a href="index.php?add_topic">Add new topic</a></li>

</div>


<div id="content">

<?php
if(isset($_GET['view_users'])){
include("includes/view_users.php");
}
if(isset($_GET['view_posts'])){
include("includes/view_posts.php");
}
if(isset($_GET['view_comments'])){
include("includes/view_comments.php");
}
if(isset($_GET['view_topics'])){
include("includes/view_topics.php");
}
if(isset($_GET['add_topic'])){
include("includes/add_topic.php");
}


?>
</div>

</div>
</body>
</html>
