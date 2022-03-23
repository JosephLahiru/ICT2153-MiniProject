<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = mysqli_connect($servername, $username, $password);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$current_user = "";
	?>
</head>
<body>
	<h1 align="center">Welcome To Millanium Art Gallery</h1>
	<a href="signin.php">Sign in</a><br>
	<a href="login.php">Login</a><br>
	<?php
		$sql = "use ICT2153;";

		if ($conn->query($sql) === TRUE) {
		  //echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}

		if(!empty($current_user)){
			echo "<h2>Hello " . $current_user . "</h2>";
		}
	?>
</body>
</html>