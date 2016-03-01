<?php
session_start();
include_once("db.php");
	if( isset($_GET['edit']) )
	{
		$id = $_GET['edit'];
		$query= "SELECT * FROM posts WHERE id=$id" or die("WAA WAA!").mysql_error();
		$res = mysqli_query($db,$query);
		$row= mysqli_fetch_array($res);
	}
		if( isset($_POST['edit']) )
	{
		$newtitle = $_POST['newtitle'];
		$newcontent = $_POST['newcontent'];
		$id  	 = $_POST['id'];
		$sql     = "UPDATE posts SET name='$newtitle',content='$newcontent' WHERE id='$id'";
		$res 	 = mysqli_query($db,$sql) or die("Could not update".mysql_error());
		#echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<title>Blog Post</title>
</head>
<body>
<div class="container">
<form action="edit.php" method="POST" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Title</label>
		<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
		<input type="text" class="form-control" id="newtitle" name="newtitle" value="<?php echo $row[1];?>"><br />
		<textarea type="text" class="form-control" id="newcontent" placeholder="Content" name="newcontent" rows="20" value="<?php echo $row[2];?>"></textarea>
		<input name="edit" type="submit" value="Update" class="btn btn-primary">
	</div>
</form>
<?php

?>
</div>	
</body>
</html>