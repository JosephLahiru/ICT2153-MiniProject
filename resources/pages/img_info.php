<!DOCTYPE html>
<html>
<head>
	<title>Image Info</title>
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
		// if(!empty($_SESSION['logged_user'])){
		// 	$current_user = $_SESSION['logged_user'];
		// 	echo "<h2>Hello " . $current_user . "</h2>";
		// }
		mysqli_select_db($conn, 'ICT2153');
	?>
	<style type="text/css">
		.center {
				display: block;
				margin-left: auto;
				margin-right: auto;
				width: 50%;
			}
	</style>
</head>
<body>
	<?php
		//echo "The image id is " . $_GET['img_id'];

		$sql_img = "SELECT * FROM images ORDER BY img_id DESC;";
		$result_img = $conn->query($sql_img);

		if($result_img->num_rows > 0){
			while($row = $result_img->fetch_assoc()){
				if($row['img_id'] == $_GET['img_id']){
					$user=$row['user_id'];
					$sql_user = "SELECT id, firstname, lastname FROM user WHERE id=$user;";
					$result_usr = $conn->query($sql_user);
					$row_usr = $result_usr->fetch_assoc()
					?>
						<img class="center" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"/>
					<?php
					$first = $row_usr['firstname'];
					$last = $row_usr['lastname'];
					$created = $row['created'];
					$topic = $row['topic'];

					echo "<div align='center'>$topic<br>";
					echo "Artist : $first $last<br>";
					echo "Created on : $created</div>";
					break;
				}
			}
		}else{
			echo "<p class='status error'>Image(s) not found...</p>";
		}
	?>
</body>
</html>