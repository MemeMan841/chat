<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
			<div class="title">
				<a href="index.php"><h1>CHAT</h1></a>
			</div>
			<!-- <a href="index.php">main</a>
			<a href="login.php">login</a>
			<a href="make.php">make</a>
			<br>
			Content -->
			<div class="login-div">
				<form>
					<h2>Chat</h2>
					Comment<br> <input type="text" name="comment" required>
					<br>
					<br>
					<input type="submit" value="comment">
				</form>
			</div>
	</body>
</html>

<?php
DEFINE('DB_USERNAME', 'memewktk_root');
DEFINE('DB_PASSWORD', 'roooter');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'memewktk_test');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_error()) {
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
//SELECT * FROM user WHERE name = $username AND pass = $password

$sql = "SELECT * FROM msgs ORDER BY id DESC";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
    //echo "<ul>";
    echo "<div class='content'>";
    while($row = $result->fetch_assoc()) {
    	//echo "<li>";
        echo " " . $row["comment"];
        echo "<br>";
        //echo "</li>";
    }
    //echo "<ul>";
    echo "</div>";
} else {
    //echo "0 results";
}


if (isset($_GET['comment'])) {

	$newComment = htmlspecialchars($_GET["comment"]);

	if (strlen($newComment) > 40) {
		$newComment = substr($newComment, 0, 40);
	}

	$buffer = "'" . $newComment . "'";

	$sql = "INSERT INTO msgs (comment) 
	VALUES($buffer)";

	if ($mysqli->query($sql) === TRUE) {
		echo "it worked";
	} else {
		echo "it didn't work";
	}

	header('Location:content.php');
}







?>