<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once '../php_scripts/connect.php'?>
</head>
<body>
	<form action="" method="post">
		<input type="submit" name="submit_setup" value="SETUP DATABASE">
		<input type="submit" name="submit_drop" value="DROP DATABASE">
		<input type="submit" name="submit_create" value="CREATE DATABASE">
	</form>
	<?php
		$user_table = "CREATE TABLE user(id INT AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(20), lastname VARCHAR(20), gmail VARCHAR(40), password VARCHAR(30), address VARCHAR(50), type VARCHAR(8))  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

		$images_table = "CREATE TABLE `images` (`img_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `image` longblob NOT NULL, `created` datetime NOT NULL DEFAULT current_timestamp(), `rank` INT, `views` INT, `topic` VARCHAR(150), user_id INT, owned INT, FOREIGN KEY(`user_id`) REFERENCES user(`id`))  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

		$admin_table = "CREATE TABLE admin(id INT AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(20), lastname VARCHAR(20), gmail VARCHAR(40), password VARCHAR(30), address VARCHAR(50), type VARCHAR(8))  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

		$transaction_table = "CREATE TABLE transaction(transaction_id INT AUTO_INCREMENT PRIMARY KEY, transaction_time datetime NOT NULL DEFAULT current_timestamp(), img_id INT, artist_id INT, user_id INT, amount DECIMAL(15, 2))  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

		$image_price_table = "CREATE TABLE image_price(img_id INT PRIMARY KEY AUTO_INCREMENT, amount DECIMAL(15, 2))  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

		if(isset($_POST['submit_drop'])){
			$drop_db = "DROP DATABASE ICT2153;";

			if ($conn->query($drop_db) === TRUE) {
			  echo "DB dropped successfully<br>";
			} else {
			  echo "Error: " . $drop_db . "<br>" . $conn->error;
			}
		}

		if(isset($_POST['submit_create'])){
			$create_db = "CREATE DATABASE ICT2153;";

			if ($conn->query($create_db) === TRUE) {
			  echo "DB created successfully<br>";
			} else {
			  echo "Error: " . $create_db . "<br>" . $conn->error;
			}
		}

		if(isset($_POST['submit_setup'])){

			mysqli_select_db($conn, $dbname);

			if ($conn->query($user_table) === TRUE) {
			  echo "<br>User table created successfully<br>";
			} else {
			  echo "Error: " . $user_table . "<br>" . $conn->error;
			}

			if ($conn->query($images_table) === TRUE) {
			  echo "<br>Images table created successfully<br>";
			} else {
			  echo "Error: " . $images_table . "<br>" . $conn->error;
			}

			if ($conn->query($admin_table) === TRUE) {
			  echo "<br>Admin table created successfully<br>";
			} else {
			  echo "Error: " . $admin_table . "<br>" . $conn->error;
			}

			if ($conn->query($transaction_table) === TRUE) {
			  echo "<br>Transaction table created successfully<br>";
			} else {
			  echo "Error: " . $transaction_table . "<br>" . $conn->error;
			}

			if ($conn->query($image_price_table) === TRUE) {
			  echo "<br>Image price table created successfully<br>";
			} else {
			  echo "Error: " . $image_price_table . "<br>" . $conn->error;
			}

		}
	?>
</body>
</html>