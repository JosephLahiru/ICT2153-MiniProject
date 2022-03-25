<!DOCTYPE html>
<html>
<head>
	<title></title>
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

		mysqli_select_db($conn, 'ICT2153');
	?>
</head>
<body>
	<?php
		$sql = "SELECT image FROM images ORDER BY img_id DESC;";
		$result = $conn->query($sql);

		if($result->num_rows > 0){
			echo "<div class='gallery'>";
			while($row = $result->fetch_assoc()){
				?>
					<img style='width: 20%; height: 20%;' src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"/>
				<?php
			}
			echo "</div>";
		}else{
			echo "<p class='status error'>Image(s) not found...</p>";
		}
	?>
</body>
</html>