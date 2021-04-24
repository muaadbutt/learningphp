<?php
	include("connection.php");
	include("functions.php");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo !empty(get_username()) ? get_username() : ""; ?>
</body>
</html>
