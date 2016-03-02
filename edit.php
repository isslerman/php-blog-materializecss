<?php
session_start();
include("db.php");
	$id = $_GET['edit'];
	
	$query = "SELECT * FROM posts WHERE id = $id";
	$result = mysqli_query($db,$query);
	//returning data
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<title></title>
</head>
<body>
<div class="container">
<form method="post" action="update.php">
<input type="hidden" class="form-control" name="id" value="<?php echo $row['id'];?>"><br />
<label class="lead">Enter new title:</label> <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>"><br />
<label class="lead">Enter new content:</label> <textarea type="text" class="form-control" name="content" rows="10" value="<?php echo $row['content'];?>"></textarea><hr />

<input type="submit" name="submit" value="Save" class="btn-lg btn btn-info"/>
</form>
</div>
</body>
</html>
<?php
mysqli_close($db);
?>