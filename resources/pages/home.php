<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	
	<?php
		require_once '../php_scripts/connect.php';
		session_start();
		
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
				echo "<a href='home.php' class='none'><img src='../images/logo.png' class='logo'></a>";

			}else{
				echo "<a href='logout.php'>Logout</a>";
				echo "<a href='user_account.php'>Hello " . $current_user . "!</a>";
				echo "<a href='user_account.php'>Account</a>";
				echo "<a href='art_gallery.php'>Gallery</a>";
				echo "<a class='active' href='home.php'>Home</a>";
				echo "<a href='home.php' class='none'><img src='../images/logo.png' class='logo'></a>";
			}

			$sql = "use $dbname;";

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