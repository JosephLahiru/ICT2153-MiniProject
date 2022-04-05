<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
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
			//echo "<h2>Hello " . $current_user . "</h2>";
		}
	?>
</head>
<body>
	<div class="main">
		<div class="topnav">
		<?php
			if(empty($_SESSION['logged_user'])){	
				echo "<a href='signin.php'>Sign in</a>";
				echo "<a href='login.php'>Login</a>";
				echo "<a href='art_gallery.php'>Gallery</a>";
				echo "<a class='active' href='home.php'>Home</a>";

			}else{
				echo "<a href='logout.php'>Logout</a>";
				echo "<a href='user_account.php'>Hello " . $current_user . "!</a>";
				echo "<a href='user_account.php'>Account</a>";
				echo "<a href='art_gallery.php'>Gallery</a>";
				echo "<a class='active' href='home.php'>Home</a>";
			}

			$sql = "use ICT2153;";

			if ($conn->query($sql) === TRUE) {
			  //echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		?>
		</div>

		<h1 align="center">Welcome To Millanium Art Gallery</h1>
	</div>
</body>
</html>