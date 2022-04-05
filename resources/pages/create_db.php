<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		<input type="submit" name="submit" value="Submit">
	</form>
	<?php
		//$user_table = "CREATE TABLE user(id INT AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(20), lastname VARCHAR(20), gmail VARCHAR(40), address VARCHAR(50), type VARCHAR(8));";
		//$images_table = "CREATE TABLE images(img_id INT, image long)";

	if(isset($_POST['submit'])){
		$sql = "CREATE TABLE image_rank(img_id INT );";

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