<!DOCTYPE html>
<html>
<head>
	<title>List Item</title>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = mysqli_connect($servername, $username, $password);
		session_start();

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		mysqli_select_db($conn, 'ICT2153');

		if(!empty($_SESSION['logged_user'])){
			$current_user = $_SESSION['logged_user'];
			$user_id = $_SESSION['user_id'];
			echo "<h2>Hello " . $current_user . "</h2>";
		}
	?>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		Enter the image topic<br><input type="text" name="topic"><br><br>
		<label>Select Image File:</label>
		<input type="file" name="image"><br><br>
		<input type="submit" name="submit" value="Upload">
	</form>

	<?php 
		$status = $statusMsg = '';
		if(isset($_POST["submit"])){
			$status = 'error';
			if(!empty($_FILES["image"]["name"])) {
				$fileName = basename($_FILES["image"]["name"]);
				$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

				$allowTypes = array('jpg','png','jpeg','gif');
				if(in_array($fileType, $allowTypes)){
					$image = $_FILES['image']['tmp_name'];
					$imgContent = addslashes(file_get_contents($image));
					$topic = $_POST['topic'];

					$sql = "INSERT into images (image, created, rank, topic, user_id) VALUES ('$imgContent', NOW(), 0, '$topic', '$user_id')";
					//$sql = "SELECT * FROM user;";
					$insert = $conn->query($sql); 

					if($insert){ 
						$status = 'success';
						$statusMsg = "File uploaded successfully.";
					}else{
						$statusMsg = "File upload failed, please try again.";
					}
				}
				else{
					$statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
				}
			}else{
				$statusMsg = 'Please select an image file to upload.';
			}
		}
		echo $statusMsg;
	?>
</body>
</html>