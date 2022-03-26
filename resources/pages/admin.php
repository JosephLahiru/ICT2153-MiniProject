<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = mysqli_connect($servername, $username, $password);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		mysqli_select_db($conn, 'ICT2153');

		session_start();
	?>
</head>
<body>

</body>
</html>