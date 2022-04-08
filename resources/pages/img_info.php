<!DOCTYPE html>
<html>
<head>
	<title>Image Info</title>
	<link rel="stylesheet" type="text/css" href="../css/listb.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<?php
		require_once '../php_scripts/connect.php';
		session_start();

		if(!empty($_SESSION['logged_user'])){
			$current_user = $_SESSION['logged_user'];
			//echo "<h2>Hello " . $current_user . "</h2>";
		}
		mysqli_select_db($conn, $dbname);
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
	<div class="main">
		<div class="topnav">
		<?php
			echo "<a href='user_account.php'>Hello " . $current_user . "!</a>";
			echo "<a href='user_account.php'>Account</a>";
			//echo "<a href='logout.php'>Logout</a>";
			echo "<a href='art_gallery.php'>Gallery</a>";
			echo "<a href='home.php'>Home</a> </div>";

			//echo "The image id is " . $_GET['img_id'];

			$sql_img = "SELECT * FROM images ORDER BY img_id DESC;";
			$result_img = $conn->query($sql_img);

			if($result_img->num_rows > 0){
				while($row = $result_img->fetch_assoc()){
					if($row['img_id'] == $_GET['img_id']){
						$user=$row['user_id'];
						$sql_user = "SELECT id, firstname, lastname FROM user WHERE id=$user;";
						$result_usr = $conn->query($sql_user);
						$row_usr = $result_usr->fetch_assoc();

						$first = $row_usr['firstname'];
						$last = $row_usr['lastname'];
						$created = $row['created'];
						$topic = $row['topic'];

						echo "<h1 align='center'>$topic</h1>";

						?>
							<img class="center" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"/>
						<?php

						echo "<div align='center'>Artist : $first $last<br>";
						echo "Created on : $created<br></div>";
						break;
					}
				}
				//$view = $row['views'];
				//echo "<div>Current Views : $view</div>";
				?>
	<!-- 			<form action="" method="post">
					<input type="submit" name="rank_up" value="Vote Up">
				</form> -->
				<?php
					// $new_view = $view+1;
					// $img_id = $_GET['img_id'];

					// $view_update_sql = "UPDATE images SET views=$new_view WHERE img_id=$img_id;";
					// if ($conn->query($view_update_sql) === TRUE) {
					// 	// echo "Record updated successfully";
					// 	// sleep(2);
					// 	// header( 'Location: img_info.php?img_id=$img_id' );

					// } else {
					// 	echo "Error: " . $sql . "<br>" . $conn->error;
					// }
				// if(isset($_POST['rank_up'])){
					// $new_rank = $rank+1;
					// $img_id = $_GET['img_id'];

					// $rank_update_sql = "UPDATE images SET rank=$new_rank WHERE img_id=$img_id;";
					// if ($conn->query($rank_update_sql) === TRUE) {
					// 	echo "Record updated successfully";
					// 	sleep(2);
					// 	header( 'Location: img_info.php?img_id=$img_id' );

					// } else {
					// 	echo "Error: " . $sql . "<br>" . $conn->error;
					// }
				// }

			}else{
				echo "<p class='status error'>Image(s) not found...</p>";
			}
		?>
		<form action="" method="post">
			<div align="center"><a href="payment_portal.php"><button class="buy_button">Buy Now</button></a><!-- <button class="cart_button">Add To Cart</button> --><input class="cart_button" type="submit" name="cart" value="Add To Cart"></div>
		</form>

		<?php
			if(isset($_POST['cart'])){
				echo "<script>alert('added to cart successfully');</script>";
			}
		?>
	</div>
</body>
</html>