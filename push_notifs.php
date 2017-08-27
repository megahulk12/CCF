<?php
	include('session.php');
	header('Content-Type: text/event-stream');
	header('Cache-Control: no-cache');


	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// insert code set notificationStatus = 1 when user clicks notification area
	$query = "SELECT count(notificationID) AS count FROM notifications_tbl WHERE notificationStatus = 0 AND (receivermemberID = ".$_SESSION['userid'].");" ;
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$count = $row['count'];
			// data should always be the attribute
			echo "data: {$count}\n\n";
			flush();
		}
	}
	mysqli_close($conn);
?>