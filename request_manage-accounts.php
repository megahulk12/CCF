<?php
	include("session.php");
	include("globalfunctions.php");
	if(isset($_POST["add"])) {
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$username = $_POST["username"];
		$password = $_POST["password"];
		$query = "INSERT INTO member_tbl(username, password, memberType) VALUES('$username', '$password', 5)";
		mysqli_query($conn, $query);
		mysqli_close($conn);
	}
?>