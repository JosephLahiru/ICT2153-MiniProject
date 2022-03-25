<!DOCTYPE html>
<html>
<head>
	<title>Logging Out...</title>
	<!--<meta http-equiv="refresh" content="2; URL=home.php">-->
	<?php
		session_start();
		$_SESSION['logged_user'] = "";

		sleep(2);
		header( 'Location: home.php' );
	?>
</head>
<body>
	<h1>Logged out successfully</h1>
</body>
</html>