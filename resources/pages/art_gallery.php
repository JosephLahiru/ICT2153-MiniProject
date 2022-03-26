<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/gallery.css">
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
		$sql = "SELECT image, img_id FROM images ORDER BY img_id DESC;";
		$result = $conn->query($sql);

		if($result->num_rows > 0){
			echo "<div class='gallery'>";
			while($row = $result->fetch_assoc()){
				?>
					<a href="img_info.php?img_id=<?php echo($row['img_id']);?>">
						<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"/>
					</a>
				<?php
			}
			echo "</div>";
		}else{
			echo "<p class='status error'>Image(s) not found...</p>";
		}
	?>
</body>
</html>