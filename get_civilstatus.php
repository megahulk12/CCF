<?php
	include("session.php");
	include("globalfunctions.php");

	if(isset($_SESSION["userid"])) {
		$id = $_SESSION["userid"];

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT civilStatus FROM member_tbl WHERE memberID = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$civilstatus = $row["civilStatus"];
				echo $civilstatus;
			}
		}
		mysqli_close($conn);
	}

?>