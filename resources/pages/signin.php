<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<?php
		require_once '../php_scripts/connect.php';

		mysqli_select_db($conn, $dbname);
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

		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		  sleep(2);
		  header( 'Location: login.php' );
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	?>
</body>
</html>