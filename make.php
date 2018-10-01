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
				<h2>Join Free</h2>
				<form>
					Username<br> <input type="text" name="user" required>
					<br>
					<br>
					Password<br> <input type="text" name="pass" required>
					<br>
					<br>
					Confirm password<br> <input type="text" name="passConfirm" required>
					<br>
					<br>
					<input type="submit" value="Join">
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

if (isset($_GET['user']) && isset($_GET['pass']) && isset($_GET['passConfirm'])) {

	if ($_GET['pass'] == $_GET['passConfirm']) {

		$username = "'" . $_GET['user'] . "'";
		$sql = "SELECT * FROM user WHERE name = $username";
		$result = $mysqli->query($sql);

			if ($result->num_rows > 0 != true) {

				$username = "'" . $_GET['user'] . "'";
				$password = "'" . $_GET['pass'] . "'";
				$sql = "INSERT INTO user (name, pass)
				VALUES($username, $password)";

				if ($mysqli->query($sql) === TRUE) {
					//echo "it worked";
				} else {
					//echo "it didn't work";
				}

				header('Location:acc-success.php');
			} else {
				echo "<br>";
				echo "<span class='login-error'>Username already exists</span>";
			}
		
	} else {
		echo "<br>";
		echo "<span class='login-error'>Passwords must match</span>";
	}
}




?>