<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" type="text/css" href="../css/payport.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<?php
		require_once '../php_scripts/connect.php';

		mysqli_select_db($conn, $dbname);

		session_start();

		if(!empty($_SESSION['logged_user'])){
			$current_user = $_SESSION['logged_user'];
		}
		mysqli_select_db($conn, $dbname);

		echo "<div class='topnav'>";

		// echo "<a href='user_account.php'>Hello " . $current_user . "!</a>";
		// echo "<a href='user_account.php'>Account</a>";
		//echo "<a href='logout.php'>Logout</a>";
		echo "<a href='art_gallery.php'>Gallery</a>";
		echo "<a href='home.php'>Home</a> </div>";

		echo "</div>";
	?>
</head>
<body>
	<div class="main">
<!-- 		<div align="center">
			<form action="" method="post">
				Admin Login <input type="checkbox" name="admin" value="checked"><br>
				Email : <input type="text" name="email"><br>
				Password : <input type="password" name="pwd"><br>
				<input type="submit" name="submit" value="Submit"><br>
			</form>
		</div> -->

		<div class="main-container">
		    <div class="form-container">

		        <div class="form-body">

		            <h2 class="title">Log in with</h2>

		            <div class="social-login">
		                <ul>
		                    <li class="google"><a href="#">Google</a></li>
		                    <li class="fb"><a href="#">Facebook</a></li>
		                </ul>
		            </div>

		            <div class="_or">or</div>

		            <form action="" class="the-form" method="post">

		                <label for="email">Email</label>
		                <input type="email" name="email" id="email" placeholder="Enter your email">

		                <label for="password">Password</label>
		                <input type="password" name="pwd" id="password" placeholder="Enter your password"> <br>

						Admin Login
		               	<input type="checkbox" id="checkbox-1-1" class="custom-checkbox" name="admin" value="checked" /> 

		                <input type="submit" value="Log In" name="submit">

		            </form>

		        </div>

		        <div class="form-footer">
		            <div>
		                <span>Don't have an account?</span> <a href="signin.php">Sign Up</a>
		            </div>
		        </div>

		    </div>
		</div>

		<?php
			if(isset($_POST['submit'])){
				if($_POST['admin']=="checked"){
					$sql = "SELECT * FROM `admin`";
				}else{
					$sql = "SELECT * FROM `user`";
				}
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
	</div>
</body>
</html>