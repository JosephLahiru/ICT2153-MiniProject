<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<?php
		require_once '../php_scripts/connect.php';

		mysqli_select_db($conn, $dbname);

		session_start();

		$data = [];
	?>
</head>
<body>
	<?php
		$sql_user = "SELECT * FROM user;";
		$result_usr = $conn->query($sql_user);

		while($row_usr = $result_usr->fetch_assoc()){
			array_push($data, $row_usr);
		}
		echo "<table border='1'>";
		echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th><th>Address</th><th>User Type</th></tr>";
		foreach ($data as $key => $val) {
			echo "<tr>";
			foreach ($val as $key2 => $value) {
				echo "<td>" . $value . "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

	?>
</body>
</html>