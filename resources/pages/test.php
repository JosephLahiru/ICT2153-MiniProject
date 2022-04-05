<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
		$servername = "sql308.epizy.com";
		$username = "epiz_31427237";
		$password = "TI5h97l50zyJ";

		$conn = mysqli_connect($servername, $username, $password);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		mysqli_select_db($conn, 'ICT2153');
	?>
</body>
</html>

