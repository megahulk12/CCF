<?php
	// insert code for setting 
	include('session.php');
	include('globalfunctions.php');
	if(isset($_POST['join'])) {
		$id = $_POST['eventID'];
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_event_participation = "INSERT INTO eventparticipation_tbl(eventID, memberID) VALUES($id, ".$_SESSION['userid'].")";
		mysqli_query($conn, $sql_event_participation);
		$fullname = $_SESSION['lastName']." ".$_SESSION['firstName'];
		$notificationdesc = $fullname." wishes to join ".getEventName($id);
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, eventID, notificationDesc, notificationType, request) VALUES(".$_SESSION['userid'].", ".getEventHeadID($id).", $id, '$notificationdesc', 1, 1)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
?>