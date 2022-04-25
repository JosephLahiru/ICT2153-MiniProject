<!DOCTYPE html>
<html>
<head>
	<title>Logging Out...</title>
	<!--<meta http-equiv="refresh" content="2; URL=home.php">-->
	<?php
		session_start();
		$session_data = array_keys($_SESSION);
		foreach ($session_data as $key){
			unset($_SESSION[$key]);
		}

		sleep(1);
		header( 'Location: home.php' );
	?>
</head>
<body>
	<h1>Logged out successfully</h1>
</body>
</html>