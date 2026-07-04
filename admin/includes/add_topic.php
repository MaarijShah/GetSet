<center>
	<h2 style="padding: 5px;">Add New Topic</h2>
<form action="" method="post" id="f" class="ff">
<input type="text" name="title"/><br/>
<input type="submit" name="insert" value="Add New Topic"/>
</form>

</center>

<?php
if(isset($_POST['insert'])){
	
	 $title = $_POST['title'];

	 $insert = "insert into topics (topic_name) values ('$title')";
	 $run = mysqli_query($con,$insert);

	 if($run){
	
	 echo"<script>alert('A new topic has been inserted')</script>";
	  echo"<script>window.open('index.php?view_topics','_Self')</script>";

	}
}




?>