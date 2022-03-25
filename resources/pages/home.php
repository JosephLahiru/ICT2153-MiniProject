<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = mysqli_connect($servername, $username, $password);
		session_start();

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		//echo $_SESSION['animal'];
		if(!empty($_SESSION['logged_user'])){
			$current_user = $_SESSION['logged_user'];
			echo "<h2>Hello " . $current_user . "</h2>";
		}
	?>
</head>
<body>
	<h1 align="center">Welcome To Millanium Art Gallery</h1>
	<?php
		if(empty($_SESSION['logged_user'])){
			echo "<div align='right'><a href='signin.php'>Sign in</a>";
			echo "<a href='login.php'>Login</a><br></div>";
		}else{
			echo "<div align='right'><a href='logout.php'>Logout</a><br></div>";
		}

		$sql = "use ICT2153;";

		if ($conn->query($sql) === TRUE) {
		  //echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	?>
</body>
</html>