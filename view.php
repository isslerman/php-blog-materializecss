<?php
session_start();
include_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
 <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css" media="screen,projection">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
	<title>My Blog</title>
</head>
<body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
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
		echo "<div class=\"row\">
		        <div class=\"col s12 m6\">
		          <div class=\"card blue-grey darken-1\">
		            <div class=\"card-content white-text\">
		              <span class=\"card-title\">".$title."</span>
		              <p>".$row["content"]."</p>
		              <p>".$row["date"]."</p>
		            </div>
				     <div class=\"card-action\">
		              <a href=\"delete.php?del=$id\" class=\"waves-effect waves-light btn\">Delete this Post</a>
		              <a href=\"edit.php?edit=$id\" class=\"waves-effect waves-light btn\">Edit this Post</a>
		            </div>
		          </div>
		        </div>
		      </div>";
      	//echo "<p class='lead'><strong>Title:</strong> " . $title. "</p><br />";
        //echo "Content: " . . "<br />";
        //echo "Date:".$row["date"]."<br /><br />";
        //echo "<a href='delete.php?del=$id' class='btn btn-danger'>Delete Post</a>&nbsp;<a href='edit.php?edit=$id' class='btn btn-success'>Edit Post</a><br /><br /><hr />";
        #$e = print('Title: ' . $title. '<br /> Content: ' . $content. '<br /> Date:'.$date.'<br /><br />');
        
        #$posts .= "<div><h2><a href='view_post.php?pid=$id'>$title</a></h2><h3>$date</h3><p>$e</p>";
	}
}
$db->close();
?>


<h3> Create a Post</h3>
<br />
<a href="post.php" target="_blank" class="waves-effect waves-light btn blue">Create a New Post</a>
</div>
</body>
</html>