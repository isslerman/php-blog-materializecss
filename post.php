<?php
session_start();
include_once("db.php");
	if(isset($_POST['post'])){
		$title = strip_tags($_POST['title']);
		$content = strip_tags($_POST['content']);

		$title = mysqli_real_escape_string($db,$title);
		$content = mysqli_real_escape_string($db,$content);

		$date = date('jS \of F Y h:i:s A');
		$sql = "INSERT into posts (title,content,date) VALUES ('$title', '$content', '$date')";
		if($title == "" || $content == ""){
			echo "Please complete your posts!";
		}
		mysqli_query($db,$sql);
		header("Location: index.php");
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
<form action="post.php" method="POST" role="form">
	<div class="form-group">
		<label class="lead">Enter title:</label><input type="text" class="form-control" id="" placeholder="Enter Title" name="title"><br />
		<label class="lead">Enter Content:</label>
		<textarea type="text" class="form-control" id="" placeholder="Enter Content" name="content" rows="10"></textarea><br />
		<input name="post" type="submit" value="Post" class="btn btn-primary">
	</div>
</form>
</div>	
</body>
</html>