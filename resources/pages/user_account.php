<!DOCTYPE html>
<html>
<head>
	<title></title>
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

		if(!empty($_SESSION['logged_user'])){
			$current_user = $_SESSION['logged_user'];
			echo "<h1 align='center'>Hello " . $current_user . "</h1>";
		}
	?>
</head>
<body>
	<?php
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
			echo "<div align='right'><a href='list_item.php'>List item</a></div>";
		}
	?>
</body>
</html>