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
			<br>

			<div class="login-div">
				<h2>Sign In</h2>
				<form>
					Username<br> <input type="text" name="user" required>
					<br>
					<br>
					Password<br> <input type="text" name="pass" required>
					<br>
					<br>
					<input type="submit" value="Sign In">
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
if (isset($_GET['user']) && isset($_GET['pass'])) {
	$username = "'" . $_GET['user'] . "'";
	$password = "'" . $_GET['pass'] . "'";
	$sql = "SELECT * FROM user WHERE name = $username AND pass = $password";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
		echo "it worked ";
		header('Location:content.php');
	} else {
		echo "<br>";
		echo "<span class='login-error'>Account not found</span>";
	}


	

	//header('Location:index.php');
}




?>