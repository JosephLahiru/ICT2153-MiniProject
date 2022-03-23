<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
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
	<h1 align="center">Sign In</h1>

	<div align="center">
		<form action="" method="post">
			First Name <input type="text" name="fname"><br>
			Last Name <input type="text" name="lname"><br>
			Email <input type="text" name="email"><br>
			Adress <textarea name="address" cols="20" rows="5"></textarea><br>
			User Type
			<select name="type">
				<option>user</option>
				<option>artist</option>
			</select><br>
			Password <input type="password" name="pwd"><br>
			<input type="submit" name="submit" value="Submit"><!--<input type="reset" name="reset" value="Reset">-->
		</form>
	</div>

	<?php
	if(isset($_POST['submit'])){
		$sql = "INSERT INTO user (firstname, lastname, gmail, password, address, type) VALUES ('" . $_POST['fname'] . "', '" . $_POST['lname'] . "', '" . $_POST['email'] . "', '" . $_POST['pwd'] . "', '" . $_POST['address'] . "', '" . $_POST['type'] . "');";
		// $sql = "use ICT2153; CREATE TABLE user(id INT AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(20), lastname VARCHAR(20), gmail VARCHAR(40), address VARCHAR(50), type VARCHAR(8));";

		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	?>
</body>
</html>