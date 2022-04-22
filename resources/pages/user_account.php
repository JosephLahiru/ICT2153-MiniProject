<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/listb.css">
	<?php
		require_once '../php_scripts/connect.php';

		mysqli_select_db($conn, $dbname);

		session_start();

		if(!empty($_SESSION['logged_user'])){
			$current_user = $_SESSION['logged_user'];
			//echo "<h1 align='center'>Hello " . $current_user . "</h1>";
		}
	?>
</head>
<body>
	<div class="topnav">
	<?php
		echo "<a href='user_account.php'>Hello " . $current_user . "!</a>";
		echo "<a class='active' href='user_account.php'>Account</a>";
		//echo "<a href='logout.php'>Logout</a>";
		echo "<a href='art_gallery.php'>Gallery</a>";
		echo "<a href='home.php'>Home</a>";
		echo "<a href='home.php' class='none'><img src='../images/logo.png' class='logo'></a>";
		echo "</div>";

		$sql = "SELECT * FROM `user`";
		$result = mysqli_query($conn, $sql);
		$check = mysqli_num_rows($result);
		$logged_user_id = $_SESSION['user_id'];
		if($check > 0){
			while($data= mysqli_fetch_assoc($result)){
				if($data["id"] == $logged_user_id){
					$logged_user = $data['firstname'];
					$user_type = $data['type'];				

					echo "<h2> Current user type " . $user_type . "</h2>";

					break;
				}
			}
		}

		//user details area
		$sql = "SELECT firstname, lastname, gmail, address FROM user";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);

		$firstname = $data['firstname'];
		$lastname = $data['lastname'];
		$gmail = $data['gmail'];
		$address = $data['address'];

		echo "<h2 class='topic'>User Data</h2>";
		echo "<table border='1' id='user'>";
		echo "<tr><td>First Name</td><td>$firstname</td></tr>";
		echo "<tr><td>Last Name</td><td>$lastname</td></tr>";
		echo "<tr><td>Gmail</td><td>$gmail</td></tr>";
		echo "<tr><td>Address</td><td>$address</td></tr>";
		echo "</table>";

		//owned pictures area -> for sale : checkbox
		$sql = "SELECT img_id, created, topic, owned FROM images WHERE owned=$logged_user_id";
		$result = mysqli_query($conn, $sql);

		if(!empty($result)){
			$count = mysqli_num_rows($result);
			$data = mysqli_fetch_assoc($result);

			// foreach ($data as $key => $value) {
			// 	echo "$key -> $value <br>";
			// }

			print_r($data);
		}

		//added pictures area : artist only

		if($user_type=='artist'){
			echo "<br><div align='center'><a href='list_item.php'><button class='list_button'>List item</button></a></div>";
		}
	?>
</body>
</html>