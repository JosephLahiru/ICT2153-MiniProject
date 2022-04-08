<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once '../php_scripts/connect.php'?>
</head>
<body>
	<form action="" method="post">
		<input type="submit" name="submit" value="SETUP DATABASE">
	</form>
	<?php
		$user_table = "CREATE TABLE user(id INT AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(20), lastname VARCHAR(20), gmail VARCHAR(40), password VARCHAR(30), address VARCHAR(50), type VARCHAR(8))  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
		$images_table = "CREATE TABLE `images` (`img_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `image` longblob NOT NULL, `created` datetime NOT NULL DEFAULT current_timestamp(), `rank` INT, `views` INT, `topic` VARCHAR(150), user_id INT, FOREIGN KEY(`user_id`) REFERENCES user(`id`))  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
		//$images_table = "CREATE TABLE `images` (`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `image` longblob NOT NULL, `created` datetime NOT NULL DEFAULT current_timestamp(), `rank` INT, `views` INT, `topic` VARCHAR(150), user_id INT, FOREIGN KEY(`user_id`) REFERENCES user(`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


		if(isset($_POST['submit'])){

			// $create_db = "CREATE DATABASE ICT2153;";

			// if ($conn->query($create_db) === TRUE) {
			//   echo "ICT2153 DB created successfully<br>";
			// } else {
			//   echo "Error: " . $user_table . "<br>" . $conn->error;
			// }

			mysqli_select_db($conn, $dbname);

			if ($conn->query($user_table) === TRUE) {
			  echo "User table created successfully<br>";
			} else {
			  echo "Error: " . $user_table . "<br>" . $conn->error;
			}

			if ($conn->query($images_table) === TRUE) {
			  echo "Images table created successfully<br>";
			} else {
			  echo "Error: " . $images_table . "<br>" . $conn->error;
			}
		}
	?>
</body>
</html>