<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";
	if(isset($_POST['username'])) {
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$user = $_POST['username'];
		$flag = 0;


		$sql = "SELECT username FROM member_tbl WHERE username = '$user';";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0) {
			$flag = 1;
		}
		mysqli_close($conn);
		echo $flag;
	}
?>