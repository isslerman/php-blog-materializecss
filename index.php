<?php
session_start();
include_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<title>My Blog</title>
</head>
<body>
<div class="container">
<?php
	$sql = "SELECT * FROM posts ORDER BY id DESC";
	$result = $db->query($sql);
	#$posts = "";
	#$id = $row['id'];
	#$admin = "<div><a href='del_post.php?pid=$id'>Delete</a></div>";

/*if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       // echo "Post ID: " . $row["id"] . "<br /><br /><br />";
        echo "Title: " . $row["title"]. "<br />";
        echo "Content: " . $row["content"]. "<br />";
        echo "Date:".$row["date"]."<br /><br />";

    }
} else {
    echo "No  results";
}*/
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['id'];
		$title = $row['title'];
		$content = $row['content'];
		$date = $row['date'];
		#$admin = "<div><a href='del_post.php?pid=$id>Delete&nbsp;</a><a href='edit.php?pid=$id>Edit&nbsp;</a>";
		echo "<p class='lead'><strong>Title:</strong> " . $title. "</p><br />";
        echo "Content: " . $row["content"]. "<br />";
        echo "Date:".$row["date"]."<br /><br />";
        echo "<a href='delete.php?del=$id' class='btn btn-danger'>Delete Post</a>&nbsp;<a href='edit.php?edit=$id' class='btn btn-success'>Edit Post</a><br /><br /><hr />";
        #$e = print('Title: ' . $title. '<br /> Content: ' . $content. '<br /> Date:'.$date.'<br /><br />');
        
        #$posts .= "<div><h2><a href='view_post.php?pid=$id'>$title</a></h2><h3>$date</h3><p>$e</p>";
	}
}
$db->close();
?>


<h3> Create a Post</h3>
<br />
<a href="post.php" target="_blank" class="btn btn-primary">Create a New Post</a>
</div>
</body>
</html>