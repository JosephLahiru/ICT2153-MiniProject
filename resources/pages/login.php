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

		//$phpVariable = "Dog";
		//$_SESSION['animal'] = $phpVariable;
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
						$logged_user_id = $data['id'];
						//$_SESSION['varname'] = $var_value;

						$_SESSION['logged_user'] = $logged_user;
						$_SESSION['user_id'] = $logged_user_id;
						echo "<br>The logged in user is " . $data['firstname'];
						sleep(1);
						if($data['type'] == "admin"){
							header( 'Location: admin.php' );
						}else{
							header( 'Location: home.php' );
						}
						break;
					}
				}
			}
		}
	?>
</body>
</html>