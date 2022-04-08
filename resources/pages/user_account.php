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
		echo "<a href='home.php'>Home</a> </div>";

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

		if($user_type=='artist'){
			echo "<div align='center'><a href='list_item.php'><button class='list_button'>List item</button></a></div>";
		}
	?>
</body>
</html>