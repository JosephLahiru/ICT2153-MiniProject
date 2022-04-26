<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="../../css/main.css">
		<link rel="stylesheet" type="text/css" href="../../css/listb.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php
			require_once '../../php_scripts/connect.php';

			mysqli_select_db($conn, $dbname);
			session_start();

		?>

	</head>
	<body>
		<div class="main" align="center">
			<hr><h1>Welcome Admin</h1><hr><br>
			<button class="upload_button" onclick="window.location.href='show_tables.php';" style="width:160px">Show Tables</button>
			<button class="upload_button" onclick="window.location.href='manage_users.php';" style="width:160px">Manage Users</button>
		</div>

		<?php require_once "admin_footer.php"; ?>
	</body>
</html>