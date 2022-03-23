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
	?>
</head>
<body>
	<h1 align="center">Log In</h1>

	<div align="center">
		<form action="" method="post">
			Email : <input type="text" name="email"><br>
			Password : <input type="password" name="pwd"><br>
			<input type="submit" name="submit" value="Submit"><br>
		</form>
	</div>

	<?php
		if(isset($_POST['submit'])){
			$sql = "SELECT * FROM `user`";
			$result = mysqli_query($conn, $sql);
			$check = mysqli_num_rows($result);
			if($check > 0){
				while($data= mysqli_fetch_assoc($result)){
					if($data["gmail"] == $_POST['email'] && $data["password"] == $_POST['pwd']){
						$logged_user = $data['firstname'];
						//$_SESSION['varname'] = $var_value;
						echo "<br>The logged in user is " . $data['firstname'];
						break;
					}
				}
			}
		}
	?>
</body>
</html>